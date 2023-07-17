<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrierung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<!-- Database connection -->
<?php
//          servername   db-name   db-user db-password
$db = conn("localhost", "adresse", "root", "4724");
function conn($host, $dbname, $user, $password)
{
    return new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
}

function select($db, $selectString)
{
    $select = $db->prepare($selectString);
    $select->execute();
    return $select->fetchAll(PDO::FETCH_ASSOC);
}
?>

<body>
    <P>SOME TEXT</P>

    <table class="table table-dark table-borderless">
        <tr>
            <th>TestID</th>
            <th>name</th>
        </tr>
        <?php
        $tabelle = select($db, "SELECT * FROM testdb.testtabelle;");
        foreach ($tabelle as $row) {
            echo ("<tr><td>" . $row["TestID"] . "</td><td>" . $row["name"] . "</td></tr>");
        }
        ?>
    </table>
    <!-- js librarys -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>