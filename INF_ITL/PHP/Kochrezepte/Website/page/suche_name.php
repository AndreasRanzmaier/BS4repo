<?php
echo '<h2>Rezepte</h2>';
try {
    $query = 'select * from rezeptname;';
    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Abfragefehler' . $e->getMessage());
}
?>


<input type="text" id="myInput" onkeyup="search('myInput', 'myTable' , 0)" placeholder="Search for Rezept.." title="input">
<center>
    <table id="myTable">
        <tr class="header">
            <th>Name</th>
        </tr>
        <?php
        foreach ($result as $row) : ?>
            <form action="" method="GET">

                <?php $var =  $row['rez_name'];  ?>
                <tr>
                    <input style="display:none;" name="seite" value="suche_name">
                    <input style="display:none;" name="rezept_name" value="<?php echo $row['rez_name']; ?>">

                    <td><?php echo $row['rez_name']; ?></td>
                    <td><?php echo '<button onclick="showTable($var);" type="submit">Rezept anzeigen</button>' ?></td>
                </tr>
            </form>

        <?php endforeach; ?>
    </table>
</center>

<?php

if (isset($_GET['rezept_name'])) {

    echo $_GET['rezept_name'];
    echo "<h2>HABIBI</h2> ";
}

?>

<script>
    function showTable(vat) {

        alert(vat);
    }
</script>