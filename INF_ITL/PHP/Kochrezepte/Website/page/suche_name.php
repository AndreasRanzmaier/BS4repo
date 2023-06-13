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
                <tr>
                    <input style="display:none;" name="seite" value="suche_name.php">
                    <input style="display:none;" name="rezept_id" value="<?php echo $row['rez_id']; ?>">

                    <td><?php echo $row['rez_name']; ?></td>
                    <td><?php echo '<button type="submit">Rezept anzeigen</button>' ?></td>
                </tr>
            </form>

        <?php endforeach; ?>
    </table>
</center>

<?php
if (isset($_GET['rezept_id'])) {
    echo '<h2>Rezepte</h2>';
    try {
        $query1 = 'select zub.zub_id, zub.zub_beschreibung from zubereitung as zub where rez_id = ' . $_GET['rezept_id'];
        $stmt1 = $con->prepare($query1);
        $stmt1->execute();
        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        $result2;
        foreach ($result1 as &$sth) { // with & we adress the variable result 1 itself
            $query =    'select zhze.zubein_menge, e.ein_name, z.zut_name from zubereitung as zub
                        inner join zubereitung_has_zutat_einheit zhze on zhze.zub_id = zub.zub_id
                        inner join zutat_einheit as ze on zhze.zuein_id = ze.zuein_id
                        inner join einheit as e on e.ein_id = ze.ein_id
                        inner join zutat as z on z.zut_id = ze.zut_id
                        where zub.zub_id = ' . $sth['zub_id'];
            $stmt2 = $con->prepare($query);
            $stmt2->execute();
            $sth['ingredients'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        };
?>
        <center>

            <?php
            foreach ($result1 as $sth1) : ?>
                <h3>Rezept: <?php echo $sth1['zub_id'] . ' ' . $sth1['zub_beschreibung']; ?></h3>
                <table id="myTable2">
                    <tr class="header">
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                    <?php
                    foreach ($sth1['ingredients'] as $sth2) : ?>
                        <tr>
                            <td><?php echo $sth2['zubein_menge']; ?></td>
                            <td><?php echo $sth2['ein_name']; ?></td>
                            <td><?php echo $sth2['zut_name']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endforeach; ?>

        </center>
<?php
    } catch (PDOException $e) {
        die('Abfragefehler' . $e->getMessage());
    }
}
?>