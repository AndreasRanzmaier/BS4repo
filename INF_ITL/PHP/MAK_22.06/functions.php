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
    return $stmt;
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
