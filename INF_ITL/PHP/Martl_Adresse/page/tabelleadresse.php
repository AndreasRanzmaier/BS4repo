<?php
echo '<h2>Alle Adressen anzeigen</h2>';
$query = 'select plz_nr as "PLZ",
            ort_name as "Ort",
            str_name as "Strasse"
from strasse_ort_plz natural join ort_plz 
    natural join strasse
    natural join ort 
    natural join plz';


$query2 = 'select per_vname as "Vorname",
per_nname as "Nachname",
CONCAT(str_name, " " , ort_name, " ", plz_nr) as "Adresse"
from person natural join person_strasse_ort_plz
natural join strasse_ort_plz natural join strasse
natural join ort_plz natural join ort natural join plz';

maketable($query);

echo '<h2>Alle Personen mit Adresse ausgeben</h2>';

maketable($query2);