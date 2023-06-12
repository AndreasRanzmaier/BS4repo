<?php
echo '<h2>Alle Adressen anzeigen</h2>';
$query = 'select plz_nr as "PLZ",
                ort_name as "Ort",
                str_name as "Strasse"
            from strasse_ort_plz 
                natural join ort_plz 
                natural join strasse 
                natural join ort 
                natural join plz';

makeTable($query);

echo '<h2>Alle Personen mit vollständiger Adresse anzeigen</h2>';
/* Aufgabe: alle Personen mit Adresse in Tabelle ausgeben */
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

makeTable($query2);