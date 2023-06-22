<?php
global $con;
echo '<h2>Rezepte</h2>';

if(isset($_POST['range'])) {
    // Rezeptnamen in Zeitraum anzeigen
    $von = $_POST['von'];
    $bis = $_POST['bis'];
    $query = 'select rez_name "Rezeptnamen"
              from rezeptname r, 
                zubereitung z 
              where z.rez_id = r.rez_id 
                and zub_bereitgestellt_am > "'.date('Y-m-d H:i:s',strtotime($von)).'"
                and zub_bereitgestellt_am < "'.date('Y-m-d H:i:s',strtotime($bis)).'"';
    makeTable($query, null);
} else if(isset($_POST['month'])) {
    // Rezeptnamen nach Monat anzeigen
    $month = $_POST['time'];
    if ($month == 'last') {
      $month = date("Y-m", strtotime('-1 month'));
    } else if ($month == 'now') {
      $month = date('Y-m', time());
    } else if ($month == 'other') {
      if ($_POST['input'] == null) {
        echo 'Es wurde kein Monat eingegeben!';
      } else {
        $month = date('Y-m', strtotime(date('Y-', time()).$_POST['input']));
      }
    }
    $query = 'select rez_name "Rezeptnamen"
              from rezeptname r, 
                zubereitung z 
              where z.rez_id = r.rez_id
                and zub_bereitgestellt_am like "'.$month.'"';
    makeTable($query, null);
} else {
    // Suche anzeigen
    ?>
    <h3 for="suche">Rezepte nach Bereitstellungszeitraum durchsuchen </h3>
    <form method="post">
        <label>Zeitraum von: </label>
        <input type="date" id="von" name="von">
        <br>
        <label>Zeitraum bis: </label>
        <input type="date" id="bis" name="bis">
        <br>
        <input type="submit" name="range" value="Suche starten">
    </form>
    <h3>Oder wählen Sie aus folgenden Optionen: </h3>
    <form method="post">
        <input type="radio" id="last" name="time" value="last">
        <label for="last">letzter Monat</label><br>
        <input type="radio" id="now" name="time" value="now" checked>
        <label for="now">laufender Monat</label><br>
        <input type="radio" id="other" name="time" value="other">
        <label for="other"><input type="text" name="input"></input>Monat des laufenden Jahres angeben z.B. 4</label>
        <br>
        <input type="submit" name="month" value="Suche starten">
    </form>
    <?php
}