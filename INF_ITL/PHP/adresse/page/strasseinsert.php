<?php
// Ausgabe einer Überschrift auf der Webseite
echo '<h2>Neue Straße erfassen</h2>';

// Prüfung, ob das Formular abgeschickt wurde
if (isset($_POST['save'])) {
    // Wenn das Formular abgeschickt wurde, speichern wir die Daten

    // Die POST-Daten aus dem Formular werden in den Variablen gespeichert
    $orplid = $_POST['orplid'];
    $strasse = $_POST['strasse'];

    // SQL-Statements zum Einfügen der Daten in die Datenbank
    $insertStmt1 = 'insert into strasse (str_name) values(?)';
    $insertStmt2 = 'insert into strasse_ort_plz values(?, ?)';

    try {
        // 1. Speichern des Straßennamens
        // Vorbereitung und Ausführung des ersten SQL-Statements
        $array1 = array($strasse);
        $stmt = makeStatement($insertStmt1, $array1);

        // Abfrage der ID des zuletzt eingefügten Datensatzes
        $strid = $con->lastInsertId();

        // 2. Verknüpfung der Straße mit Ort und PLZ
        // Vorbereitung und Ausführung des zweiten SQL-Statements
        $array2 = array($strid, $orplid);
        $stmt = makeStatement($insertStmt2, $array2);

        // Ausgabe einer Bestätigung, dass die Straße erfasst wurde
        echo '<h3>Straße wurde erfasst!</h3>';
    }
    catch (Exception $e) {
        // Behandlung von Fehlern bei der Ausführung der SQL-Statements
        switch($e->getCode()) {
            case 23000:
                // Fehlercode 23000 bedeutet, dass der Straßenname bereits existiert
                echo '<h4>Der Straßenname existiert bereits!</h4>';
                break;
            default:
                // Ausgabe des Fehlercodes und der Fehlermeldung
                echo 'Error - Strasse: '.$e->getCode().': '.$e->getMessage().'<br>';
        }
    }
} else {
    // Wenn das Formular noch nicht abgeschickt wurde, zeigen wir es an

    // HTML-Formular zum Erfassen einer neuen Straße
    ?>
    <form method="post">
        <label for="strasse">Straßenname: </label>
        <input type="text" id="strasse" name="strasse" placeholder="z.B. Wiener Straße">
        <!-- Ort und PLZ werden aus einer Datenbanktabelle abgerufen -->
        <?php
        // SQL-Query zum Abrufen der Orte und PLZs
        $query = 'select orpl_id, plz_nr as "PLZ", ort_name as "Ort"
                  from ort_plz natural join (ort, plz)
                  order by Ort';

        // Vorbereitung und Ausführung der SQL-Query
        $stmt = $con->prepare($query);
        $stmt->execute();

        // Beginn des select-Elements für die Orte und PLZs
        echo '<br><select name="orplid">';

        // Ausgabe der Orte und PLZs als Optionen im select-Element
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2];
        }

        // Ende des select-Elements
        echo '</select><br>';
        ?>
        <!-- "Speichern"-Button zum Abschicken des Formulars -->
        <input type="submit" name="save" value="speichern">
    </form>
    <?php
}
?>
