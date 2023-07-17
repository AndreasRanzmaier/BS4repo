<?php
global $con;

if(isset($_POST['show'])) {
    // Patientensuche
    $sv = $_POST['sv'];
    $geb = $_POST['geb'];
    $von = $_POST['von'];
    $bis = $_POST['bis'];

    echo "<label>Suchkriterien:</label>";
    echo "<br>";

    if($von == null && $bis == null) {
        echo "<label>".$sv."/".date('Y-m-d',strtotime($geb))."</label>";

        $query = 'select concat_ws(" ", ter_beginn, ter_ende) "Zeitraum",
                         concat(per_vname, " ", per_nname) "Patient",
                         concat(per_svnr, "/", per_geburt) "SVNr",
                         dia_name "Diagnose"
                     from person p, behandlungszeitraum bz, diagnose d
                 where p.per_id = bz.per_id
                     and d.dia_id = bz.dia_id
                     and per_svnr = '.$sv.'
                     and per_geburt = "'.date('Y-m-d',strtotime($geb)).'"';
        
    } else {
        echo "<label>".$sv."/".date('Y-m-d',strtotime($geb))."</label>";
        echo "<br>";

        if ($bis == null) {
            echo "<label>".date('Y-m-d H:i:s',strtotime($von))." - noch laufend</label>";

            $query = 'select concat_ws(" ", ter_beginn, ter_ende) "Zeitraum", 
                         concat(per_vname, " ", per_nname) "Patient",
                         concat(per_svnr, "/", per_geburt) "SVNr",
                         dia_name "Diagnose"
                     from person p, behandlungszeitraum bz, diagnose d
                 where p.per_id = bz.per_id
                     and d.dia_id = bz.dia_id
                     and per_svnr = '.$sv.'
                     and per_geburt = "'.date('Y-m-d',strtotime($geb)).'"
                     and ter_beginn > "'.date('Y-m-d H:i:s',strtotime($von)).'"';
        } else {
            echo "<label>".date('Y-m-d H:i:s',strtotime($von))." - ".date('Y-m-d H:i:s',strtotime($bis))."</label>";

            $query = 'select concat_ws(" ", ter_beginn, ter_ende) "Zeitraum", 
                             concat(per_vname, " ", per_nname) "Patient",
                             concat(per_svnr, "/", per_geburt) "SVNr",
                             dia_name "Diagnose"
                         from person p, behandlungszeitraum bz, diagnose d
                     where p.per_id = bz.per_id
                         and d.dia_id = bz.dia_id
                         and per_svnr = '.$sv.'
                         and per_geburt = "'.date('Y-m-d',strtotime($geb)).'"
                         and ter_beginn > "'.date('Y-m-d H:i:s',strtotime($von)).'"
                         and ter_ende < "'.date('Y-m-d H:i:s',strtotime($bis)).'"';
        }
    }

    makeTable($query, null);
} else {
    // Suche anzeigen
    ?>
    <form method="post">
        <h3 for="suche">Patienten - Diagnosen</h3>
        <label>SVNr: </label>
        <input type="number" id="sv" name="sv" min="1000" max="9999" required>
        <br>
        <label>Geburtstag: </label>
        <input type="date" id="geb" name="geb" required>

        <h3 for="suche">Behandlungszeitraum</h3>
        <label>Zeitraum von: </label>
        <input type="date" id="von" name="von">
        <br>
        <label>Zeitraum bis: </label>
        <input type="date" id="bis" name="bis">
        <br>
        <input type="submit" name="show" value="anzeigen">
    </form>
    <?php
}