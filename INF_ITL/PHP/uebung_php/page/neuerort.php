
<?php
echo '<h2>Neuen Ort erfassen</h2>';

if (isset($_POST['save'])) {
    // Bestätigungsabfrage
    $ort = $_POST['ort'];
    echo '<h3>Ort: '.$ort.'</h3>';
    echo '<p>Möchten Sie den Ort speichern?</p>';
    echo '<form method="post">';
    echo '<input type="hidden" name="ort" value="'.$ort.'">';
    echo '<input type="submit" name="confirm" value="Ja">';
    echo '<input type="submit" name="cancel" value="Nein">';
    echo '</form>';
} elseif (isset($_POST['confirm'])) {
    // Daten speichern
    $ort = $_POST['ort'];
    $insertStmt1 = 'insert into ort (ort_name) values(?)';

    // Überprüfen, ob der Wert bereits vorhanden ist
    $checkQuery = 'SELECT COUNT(*) FROM ort WHERE ort_name = ?';
    $checkStmt = makeStatement($checkQuery, array($ort));
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        echo '<h4>Der Ort existiert bereits.</h4>';
        echo '<a href="">Zurück zum Formular</a>';
    } else {
        try {
            $array1 = array($ort);
            $stmt = makeStatement($insertStmt1, $array1);
            $strid = $con->lastInsertId();

            echo '<h3>Ort wurde erfasst!</h3>';
        } catch (Exception $e) {
            switch($e->getCode()) {
                case 23000:
                    echo '<h4>Der Ort existiert bereits!</h4>';
                    break;
                default:
                    echo 'Error - Ort: '.$e->getCode().': '.$e->getMessage().'<br>';
            }
        }
    }
} else {
    ?>
    <form method="post">
        <label for="ort">Neuen Ort eingeben: </label>
        <input type="text" id="ort" name="ort" placeholder="z.B. Wien">
        <input type="submit" name="save" value="speichern">
    </form>
    <?php
}
echo '<h2>Alle vorhandenen Orte</h2>';
$query = 'SELECT ort_id AS "ID", ort_name AS "Ort" FROM ort';
makeTable2($query);
?>

