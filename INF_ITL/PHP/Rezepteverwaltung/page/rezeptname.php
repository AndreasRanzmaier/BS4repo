<?php
global $con;
echo '<h2>Nach Rezepten suchen</h2>';

if (isset($_POST['change'])) {
    // Ergebnisliste anzeigen
    $rezsuche = $_POST['suche'];
    ?>
    <form method="post">
        <?php
        $query = 'select rez_id, rez_name from rezeptname where lower(rez_name) like "%'.$rezsuche.'%"';
        $stmt = $con->prepare($query);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo '<h3>Gesucht wurde nach: <?php echo $rezsuche ?></h3>';
            echo '<br>';
            echo '<label for="suche">Egebnisliste der Suche: </label>';
            echo '<select name="rezid">';
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                echo '<option value="'.$row[0].'">'.$row[1];
            }
            echo '</select><br>';
            echo '<br>';
            echo '<input type="submit" name="show" value="anzeigen">';
        }
        else {
            echo 'Kein Rezeptname mit dem Inhalt "'.$rezsuche.'"';
            echo '<br>';
            ?>
            <input type="button" name="show" value="Neue Suche" onclick="location.href='index.php?seite=rezeptsuche_name';">
            <?php
        }
        ?>
    </form> 
    <?php
} else if(isset($_POST['show'])) {
    // Rezepte anzeigen
    $rezid = $_POST['rezid'];
    $query = 'select rez_name from rezeptname where rez_id = "'.$rezid.'"';
    $stmt = $con->prepare($query);
    $stmt->execute();
    $rez = $stmt->fetch(PDO::FETCH_NUM);
    echo '<h2>Alle Ergebnisse für '.$rez[0].'</h2>';
    $query = 'select zub_id, zub_beschreibung from zubereitung where rez_id = "'.$rezid.'"';
    $stmt2 = $con->prepare($query);
    $stmt2->execute();
    while ($zub = $stmt2->fetch(PDO::FETCH_NUM)) {
        $zubid = $zub[0];
        $zubname = $zub[1];
        echo '<label>Rezeptnummer '.$zubid.': '.$zubname.'</label>';
        $query = 'select 
                    zubein_menge "Menge",
                    ein_name "Einheit",
                    zut_name "Zutat"
                  from zutat z,
                    zutat_einheit zte,
                    einheit e,
                    zubereitung_einheit zbe
                  where zub_id = '.$zubid.'
                    and zbe.zuei_id = zte.zuei_id
                    and zte.zut_id = z.zut_id
                    and zte.ein_id = e.ein_id';
        makeTable($query);
    }
} else {
    // Suche anzeigen
    ?>
    <form method="post">
        <label for="suche">Rezeptnamen suchen (auch Wortteil möglich): </label>
        <input type="text" id="suche" name="suche">
        <br>
        <input type="submit" name="change" value="suchen">
    </form>
    <?php
}