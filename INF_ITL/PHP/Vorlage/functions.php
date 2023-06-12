<?php
$con;

function makeTable($query)
{
    global $con;
    try {
        $stmt = $con->prepare($query);
        $stmt->execute();
        $meta = array();
        echo '<table class="table">
            <tr>';
        $colCount = $stmt->columnCount();
        for ($i = 0; $i < $colCount; $i++) {
            $meta[] = $stmt->getColumnMeta($i);
            echo '<th>' . $meta[$i]['name'] . '</th>';
        }
        echo '</tr>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
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
    return $stmt;
}

function dbConnect()
{
    /* Verbindung zur Datenbank */
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
        // Exception-Handling für PDO muss explizit eingeschaltet werden:
        $GLOBALS["con"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo 'Error - Verbindung: ' . $e->getCode() . ': ' . $e->getMessage() . '<br>';
    }
}
