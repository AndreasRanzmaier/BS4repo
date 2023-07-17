<?php
echo '<h2>Neuen Ort/Strasse einfügen</h2>';

if (isset($_POST['save'])) {
    // Bestätigungsabfrage
    $ort = $_POST['ort'];
    echo '<h3>Ort: ' . $ort . '</h3>';
    echo '<p>Möchten Sie den Ort speichern?</p>';
    echo '<form method="post">';
    echo '<input type="hidden" name="ort" value="' . $ort . '">';
    echo '<input type="submit" name="confirm" value="Ja">';
    echo '<input type="submit" name="cancel" value="Nein">';
    echo '</form>';
} elseif (isset($_POST['confirm'])) {
    // Daten speichern
    $ort = $_POST['ort'];
    $insertStmt1 = 'insert into ort (ort_name) values(?)';
    $insertStmt2 = 'insert into  values(?, ?, ?)';

    // Überprüfen, ob der Wert bereits vorhanden ist
    $checkQuery = 'SELECT COUNT(*) FROM ort WHERE ort_name = ?';
    $checkStmt = makeStatement($checkQuery, array($ort));
    $count = $checkStmt->fetchColumn();

    $checkStmt = makeStatement($insertStmt2, array(4, 5, 4));
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        echo '<h4>Der Ort' . $ort . 'existiert bereits.</h4>';
        echo '<a href="">Zurück zum Formular</a>';
        $query12 = 'SELECT p.plz_nr as "PLZ",o.ort_name as "ORT" FROM adresse.ort o
        JOIN adresse.ort_plz op ON o.ort_id = op.ort_id
        JOIN adresse.plz p ON op.plz_id = p.plz_id';
        makeTable($query12, $ort);
    } else {
        try {
            $array1 = array($ort);
            $stmt = makeStatement($insertStmt1, $array1);
            $strid = $con->lastInsertId();

            echo '<h3>Ort wurde erfasst!</h3>';
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
} else {
?>
    <form method="post">
        <label for="ort">Neuen Ort/Stadtname: </label>
        <input type="text" id="ort" name="ort" placeholder="z.B. Linz">

        <?php
        global $con;
        $query = 'select plz_nr, plz_id from plz;';
        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<br><select name="plz_id" id="plz_id">';
        foreach ($result as $row) {
            echo '<option value="' . $row['plz_id'] . '">' . $row['plz_nr'];
        }

        echo '</select><br>';
        ?>
        <input type="submit" name="save" value="speichern">
    </form>
<?php
}
echo '<h2>Alle vorhandenen Orte</h2>';
?>










<?php
try {
    $query = 'select plz_nr as "PLZ",
    ort_name as "Ort",
    str_name as "Strasse"
    from strasse_ort_plz 
    natural join ort_plz 
    natural join strasse 
    natural join ort 
    natural join plz';
    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Abfragefehler' . $e->getMessage());
}
?>


<?php
function makeTable($query, $value = NULL)
{
    //$con = include_once 'conf.php';
    global $con;
    try {
        $stmt = $con->prepare($query);
        $stmt->execute();
        /* Tabelle mit "dynamischer" Spaltenbezeichnung mittels meta-Daten */
        $meta = array();
        echo '<table class="table"><tr>';
        $colCount = $stmt->columnCount();
        for ($i = 0; $i < $colCount; $i++) {
            $meta[] = $stmt->getColumnMeta($i);
            echo '<th>' . $meta[$i]['name'] . '</th>';
        }
        echo '</tr>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $row = array_values($row);
            if ($row[0] == $value) {
                echo '<tr style="background-color:red">';
            } else {
                echo '<tr>';
            }
            foreach ($row as $r) {
                echo '<td>' . $r . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } catch (Exception $e) {
        echo 'Error - Tabelle Adressen: ' . $e->getCode() . ': ' . $e->getMessage() . '<br>';
    }
}
