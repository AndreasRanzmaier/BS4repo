<?php
echo '<h2>Neuen Ort erfassen</h2>';
if (isset($_POST['save'])) {
    // Daten speichern
    $ort = $_POST['ort'];
    try {
        echo '<h3>Wollen Sie den Ort "'.$ort.'" wirklich in die DB einfügen?</h3>';
        ?>
        <form method="post">
            <input type="submit" name="make" value="Ja">
            <input type="submit" name="nothing" value="Nein">
        <?php
            echo '<input type="hidden" name="ortname" value="'.$ort.'">';
        ?>
        </form>
        <?php
    }
    catch (Exception $e) {
        switch($e->getCode()) {
            case 23000:
                echo '<h4>Der Ort existiert bereits!</h4>';
                break;
            default: 
                echo 'Error - Strasse: '.$e->getCode().': '.$e->getMessage().'<br>';
        }
    }
}
else if (isset($_POST['make'])) {
    global $con;

    $ort = $_POST['ortname'];
    $insertStmt = 'insert into ort (ort_name) values(?)';
    $existingStmt = 'select * from ort where ort_name = ?';
    try {
        $array = array($ort);
        $stmt = makeStatement($existingStmt, $array);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row == null) {
            $stmt = makeStatement($insertStmt, $array);
            echo '<h3>Der Ort "'.$ort.'" wurde erfolgreich gespeichert!</h3>';
            $query = 'select * from ort';
            makeTable($query, $ort);
        }
        else {
            echo 'Der Ort <b>'.$ort.'</b> ist bereits vorhanden!';
            $query = 'select * from ort';
            makeTable($query);
        }
    }
    catch (Exception $e) {
        echo 'Error - Ort: '.$e->getCode().': '.$e->getMessage().'<br>';
    }
}
else {
    global $con;
    // Formular anzeigen
    ?>
    <form method="post">
        <label for="strasse">Ortsnamen eingeben: </label>
        <input type="text" id="ort" name="ort" placeholder="z.B. Linz">
        <input type="submit" name="save" value="speichern">
    </form>
        <!-- to do: select-option -->
    <?php
    $query = 'select * from ort';
    makeTable($query);
}