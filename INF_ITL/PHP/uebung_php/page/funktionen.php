<!DOCTYPE html>
<html>
<head>
    <style>
        tr.highlighted {
            background-color: #ffff00; /* Gelbe Hintergrundfarbe */
        }
    </style>
</head>
<body>
<?php
function makeTable($query) {
    global $con;
    try {
        $stmt = $con->prepare($query);
        $stmt->execute();
        /* Tabelle mit "dynamischer" Spaltenbezeichnung mittels meta-Daten */
        $meta = array();
        echo '<table class="table">
              <tr>';
        $colCount = $stmt->columnCount();
        for ($i = 0; $i < $colCount; $i++) {
            $meta[] = $stmt->getColumnMeta($i);
            echo '<th>'.$meta[$i]['name'].'</th>';
        }
        echo '</tr>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            foreach ($row as $r) {
                echo '<td>'.$r.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    catch (Exception $e) {
        echo 'Error - Tabelle Adressen: '.$e->getCode().': '.$e->getMessage().'<br>';
    }
}
function makeTable2($query, $lastInsertedId = null) {
    global $con;
    try {
        $stmt = $con->prepare($query);
        $stmt->execute();
        /* Tabelle mit "dynamischer" Spaltenbezeichnung mittels meta-Daten */
        $meta = array();
        echo '<table class="table">
              <tr>';
        $colCount = $stmt->columnCount();
        for ($i = 0; $i < $colCount; $i++) {
            $meta[] = $stmt->getColumnMeta($i);
            echo '<th>'.$meta[$i]['name'].'</th>';
        }
        echo '</tr>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Prüfen, ob die ID der aktuellen Zeile der ID des zuletzt eingefügten Ortes entspricht
            $isLastInserted = $lastInsertedId !== null && $row['ID'] == $lastInsertedId;
            // Die CSS Klasse 'highlighted' hinzufügen, wenn es sich um den zuletzt eingefügten Ort handelt
            echo '<tr' . ($isLastInserted ? ' class="highlighted"' : '') . '>';
            foreach ($row as $r) {
                echo '<td>'.$r.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    catch (Exception $e) {
        echo 'Error - Tabelle Adressen: '.$e->getCode().': '.$e->getMessage().'<br>';
    }
}
function makeStatement($query, $executeArray = NULL) {
    global $con;
    $stmt = $con->prepare($query);
    $stmt->execute($executeArray);
    return $stmt;
}
?>
</body>
</html>