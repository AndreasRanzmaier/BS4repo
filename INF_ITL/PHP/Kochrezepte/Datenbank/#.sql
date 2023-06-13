use kochrezepte;

select zub.zub_beschreibung from zubereitung as zub where rez_id = 1;

select zub.zub_beschreibung, zhze.zubein_menge, e.ein_name, z.zut_name from zubereitung as zub
inner join zubereitung_has_zutat_einheit zhze on zhze.zub_id = zub.zub_id
inner join zutat_einheit as ze on zhze.zuein_id = ze.zuein_id
inner join einheit as e on e.ein_id = ze.ein_id
inner join zutat as z on z.zut_id = ze.zut_id
where zub.zub_id = 1;

select z.zub_bereitgestellt_am, r.rez_name from zubereitung as z
inner join rezeptname as r on r.rez_id = z.rez_id;