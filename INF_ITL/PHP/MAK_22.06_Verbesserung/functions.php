<?php
$con;

// @$db the database from which to operate
// @$selectString the sql string (not just select though)
function select($db, $selectString)
{
    $select = $db->prepare($selectString);
    $select->execute();
    return $select->fetchAll(PDO::FETCH_ASSOC);
}

function makeStatement($query, $executeArray = NULL)
{
    global $con;
    $stmt = $con->prepare($query);
    $stmt->execute($executeArray);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function dbConnect()
{
    // database connection
    $server = 'localhost';
    $user = 'root';
    $pwd = '4724';
    $db = 'adresse';

    try {
        $GLOBALS["con"] = new PDO(
            'mysql:host=' . $server . ';dbname=' . $db . ';charset=utf8',
            $user,
            $pwd
        );
        // Exception-Handling for pdo has to be enabled:
        $GLOBALS["con"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo 'Error - Verbindung: ' . $e->getCode() . ': ' . $e->getMessage() . '<br>';
    }
}

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
