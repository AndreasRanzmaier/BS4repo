<?php
function makeTable($query, $value = NULL) {
//$con = include_once 'conf.php';
    global $con;
    try {
        $stmt = $con->prepare($query);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
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
                
                $row = array_values($row);
                echo '<tr>';
                foreach ($row as $r) {
                    echo '<td>'.$r.'</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        else {
            echo 'Es sind keine Daten vorhanden!';
        }
    }
    catch (Exception $e) {
        echo 'Error - '.$e->getCode().': '.$e->getMessage().'<br>';
    }
}

function makeStatement($query, $executeArray = NULL) {
    global $con;
    // $con = include_once 'conf.php';
    $stmt = $con->prepare($query);
    $stmt->execute($executeArray);
    return $stmt;
}