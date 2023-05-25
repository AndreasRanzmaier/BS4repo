-- Andreas Ranzmaier
-- 09.05.2023
-- Kursverwaltung

use kurs;

-- a)	Geben Sie alle Kursteilnehmer eines bestimmten Kurses aus. Nachname | Vorname
select per_nname as nachname, per_vname as vorname
from person_firma
join buchung using(per_id)
join kurstermin using(kute_id)
join kurs using(kur_id)
where kur_bezeichnung = "PHP 5";

-- b)	Anzahl der Teilnehmer je Kurs – sortiert nach Kursbezeichnung Anzahl
select kur_bezeichnung, count(per_id)
from kurs
left join kurstermin using(kur_id)
left join buchung using(kute_id)
group by kur_id
order by kur_bezeichnung;

-- c)	Ermitteln Sie alle Kurse und führen Sie die Kursleiter (Vortragenden) an. Formatieren Sie das Datum (DATE_FORMAT) Kursleiter | Kursbezeichnung [ Beginn
select concat(per_vname, ' ', per_nname) as "Kursleiter",
       kur_bezeichnung as "Kursbezeichnung",
       DATE_FORMAT(kute_start, '%d.%m.%Y') as "Beginn"
from kurs
left join kurstermin using(kur_id)
left join person_firma on per_id = vortragender_per_id;

-- d)	Ermitteln Sie alle Kursteilnehmer eines bestimmten Kurses. Vor- und Nachname in einer Spalte ausgeben
select concat(per_nname, ' ', per_vname) as "Name"
from person_firma
join buchung using(per_id)
join kurstermin using(kute_id)  
join kurs using(kur_id)
where kur_bezeichnung = "PHP 5";

-- e)	Ermitteln Sie Personen an einem bestimmten Kurs teilgenommen haben. 
select per_vname as "Vorname", per_nname as "Nachname"
from person_firma 
join buchung using(per_id)
join kurstermin using(kute_id)
join kurs using(kur_id) 
where kur_bezeichnung = "PHP 5";

-- f)	Geben Sie Summe (Funktion sum) aus, die durch alle bereits stattgefundenen Kurse eingenommen wurde.
select sum(kupr_wert) as "Einnahmen"
from kurspreis
join kurs using(kur_id)
join kurstermin using(kur_id)
where kute_start < curdate(); -- nicht richtig, alle preise gemeinsam

-- g)   Ermitteln Sie, wie viele Personen noch nie an einem Kurs teilgenommen haben.
select count(*)
from person_firma; 

-- h)	Ermitteln Sie, welche Personen einen bestimmten Kurs noch nicht besucht haben, sortiert nach Kurs, Personen.
select kur_bezeichnung as "Kurs", per_vname as "Vorname", per_nname as "Nachname"
from kurs
cross join person_firma
left join buchung on buchung.kute_id = kurs.kur_id and buchung.per_id = person_firma.per_id
where buc_id is null
order by kur_bezeichnung, per_nname desc, per_vname;

-- i)	Geben Sie alle Kurse aus die mehr als 150 aber weniger als 2000 kosten. Kursbezeichnung | Preis
select kur_bezeichnung as "Kurs", kupr_wert as "Kosten"
from kurs
join kurspreis using(kur_id)
where kupr_wert > 150 and kupr_wert < 2000;

-- j)	Geben Sie alle Personen aus, in deren Nachname an zweiter Stelle ein bestimmter Buchstabe steht (Sie dürfen diesen selbst wählen, z.B. a)
select per_vname, per_nname
from person_firma
where substring(per_nname, 2, 1) = "o"; -- voestalpine

-- k)	Geben Sie alle Personen aus deren Nachname mit einem bestimmten Buchstaben (selber wählen) beginnt und deren Vorname auf einen bestimmten Buchstaben (selber wählen) endet.
select per_vname, per_nname
from person_firma
where per_nname like 'S%' and per_vname like '%d';

-- l)	Geben Sie die Preisentwicklung zu einem bestimmten Kurs aus. Kursbezeichnung | Preis | gültig bis
select kur_bezeichnung as "Kursbezeichnung", kupr_wert as "Preis", kupr_bis as "gültig bis"
from kurs
join kurspreis using(kur_id)
where kur_bezeichnung = 'PHP 5';

-- m)	Geben Sie alle Personen nach Geschlecht, Nachnamen und Vornamen sortiert aus. Wählen sie mind. einmal absteigend.
select per_geschlecht as "Geschlecht", per_nname as "Nachname", per_vname as "Vorname"
from person_firma
order by per_geschlecht, per_nname desc, per_vname;

-- n)	Welche Kurse finden in einem gewissen Zeitraum statt (legen Sie den Zeitraum selber 
select kur_bezeichnung, kute_start
from kurs
join kurstermin using(kur_id)
where kute_start between "2020-01-01" and "2022-01-01";