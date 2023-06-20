<?php
//Verbindung zur Datenbank
$server = 'localhost';
$user = 'root';
$pwd = '4724';
$db = 'adresse';

try {
    $con = new PDO('mysql:hsot=' . $server . ';dbname=' . $db . ';charset=utf8', $user, $pwd);
    // Exception-Handling für PDO muss expliziet eingeschaltet werden
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'Error - Verbindung: ' . $e->getCode() . ': ' . $e->getMessage() . '<br>';
}
