<?php
echo '<h2>Adressen anzeigen</h2>';
try {
    $query = 'select plz_nr as "PLZ",
    ort_name as "Ort",
    str_name as "Strasse"
    from strasse_ort_plz 
    natural join ort_plz 
    natural join strasse 
    natural join ort 
    natural join plz';
    $stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Abfragefehler' . $e->getMessage());
}
?>

<input type="text" id="myInput" onkeyup="search('myInput', 'myTable' , 1)" placeholder="Search for Adress.." title="input">
<center>
    <table id="myTable">
        <tr class="header">
            <th>PLZ</th>
            <th>Ort</th>
            <th>Straße</th>
        </tr>
        <?php $rowNum = 0; ?>
        <?php foreach ($result as $row) : ?>
            <?php $rowNum++; ?>
            <tr style="<?php if ($rowNum % 2 == 0) echo 'background-color: #f2f200;'; ?>">
                <td><?php echo $row['PLZ']; ?></td>
                <td><?php echo $row['Ort']; ?></td>
                <td><?php echo $row['Strasse']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</center>

<?php
echo '<h2>Alle Personen anzeigen</h2>';
try {
    $query2 = 'select concat(per_vname, " ", per_nname) as "Person",
    plz_nr as "PLZ",
    ort_name as "Ort",
    str_name as "Strasse"
    from person
    natural join person_strasse_ort_plz
    natural join strasse_ort_plz
    natural join ort_plz
    natural join strasse
    natural join ort
    natural join plz';
    $stmt = $con->prepare($query2);
    $stmt->execute();
    $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Abfragefehler' . $e->getMessage());
}
?>

<input type="text" id="myInput2" onkeyup="search('myInput2', 'myTable2' , 0)" placeholder="Search for People." title="input">
<center>
    <table id="myTable2">
        <tr class="header">
            <th>Person</th>
            <th>PLZ</th>
            <th>Ort</th>
            <th>Strasse</th>
        </tr>
        <?php
        foreach ($result2 as $row) : ?>
            <tr>
                <td><?php echo $row['Person']; ?></td>
                <td><?php echo $row['PLZ']; ?></td>
                <td><?php echo $row['Ort']; ?></td>
                <td><?php echo $row['Strasse']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</center>