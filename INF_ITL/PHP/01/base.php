<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<?php
$db = conn("localhost", "TestDB", "root", "4724");
function conn($host, $dbname, $user, $password)
{
    return new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
}

function select($db)
{
    $select = $db->prepare("SELECT * FROM testdb.testtabelle;");

    $select->execute();
    return $select->fetchAll(PDO::FETCH_ASSOC);
}

print_r(select($db));
?>

<body>



    <!-- js librarys -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>