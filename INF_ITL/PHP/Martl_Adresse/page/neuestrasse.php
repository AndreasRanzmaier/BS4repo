<?php
echo '<h2>Neue Straße erfassen</h2>';
//Formular anzeigen
?>
<form method="post">
    <label for="strasse">Straßenname:</label>
    <input type="text" id="strasse" name="strasse" placeholder="z.B. Wiener Straße"><br>
    <!-- to do: select otion -->

    <br>
    <?php
    $query = 'select orpl_id, plz_nr as "PLZ", ort_name as "Ort"
                from ort_plz natural join (ort, plz) order by Ort';
    $stmt = $con->prepare($query);
    $stmt->execute();

    echo '<br><select name="orplid">';
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        echo '<option value = "' . $row[0] . '">' . $row[1] . ' ' . $row[2];
    }

    echo '</select>';
    echo '<br><br>';
    ?>
    <input type="submit" name="save" value="speichern"><br>
</form>
<?php
if (isset($_POST['save'])) {
    //Daten speichernk
    $orplid = $_POST['orplid'];
    $strasse = $_POST['strasse'];
    $insertStmt1 = 'insert into strasse (str_name) values(?)';
    $insertStmt2 = 'insert into strasse_ort_plz values(?, ?)';

    try {
        //1.Strasse speichern
        /*
        $stmt = $con->prepare($insertStmt1);
        $stmt->execute([$strasse]);
        $strid = $con->lastInsertId();*/

        $array1 = array($strasse);
        $stmt = makeStatement($insertStmt1, $array1);
        $strid = $con->lastInsertId();  //liefert Wert, wegen AUto-increment

        $array2 = array($strid, $orplid);
        $stmt = makeStatement($insertStmt2, $array2);
        echo '<h3>Strasse wurde erfasst</h3>';
    } catch (Exception $e) {

        switch ($e->getCode()) {
            case 23000:
                echo '<h4>Der Straßenname existiert bereits!</h4>';
                break;

            default:
                echo 'Error - Strasse: ' . $e->getCode() . ': ' . $e->getMessage() . '<br>';
        }
    }
}
