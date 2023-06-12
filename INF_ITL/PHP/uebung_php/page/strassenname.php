<?php
echo '<h2>Straßenname ändern</h2>';

if (isset($_POST['save'])) {

    //Daten speichern
    $strasseId = $_POST['strasseId'];
    $strasse = $_POST['strasseneu'];
    $updateStmt1 = 'update strasse set str_name = ? where str_id = ?';


    try {

        $array1 = array($strasse, $strasseId);
        $stmt = makeStatement($updateStmt1, $array1);
        echo '<h3>Strasse wurde umbenannt</h3>';


    } catch (Exception $e) {

        switch ($e->getCode()) {
            case 23000:
                echo '<h4>Der Straßenname existiert bereits!</h4>';
                break;
            default:

                echo 'Error - Strasse: ' . $e->getCode() . ': ' . $e->getMessage() . '<br>';

        }

    }

} else {

    //Formular anzeigen
    ?>
    <form method="post">
        <label for="strassealt">Straßenname auswählen:</label>

        <?php

        $query = 'select str_id, str_name from strasse';
        $stmt = $con->prepare($query);
        $stmt->execute();

        echo '<select name="strasseId">';
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            echo '<option value = "' . $row[0] . '">' . $row[1];
        }


        ?>

        </select>
        <label for="strasseneu">Neuen Straßennamen eingaben::</label>
        <input type="text" id="strasseneu" name="strasseneu" placeholder="z.B. Linzer Straße"><br>
        <input type="submit" name="save" value="speichern"><br>
    </form>

    <?php

}