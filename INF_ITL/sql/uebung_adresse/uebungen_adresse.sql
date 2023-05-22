/* AR 08.05.23 */
use adresse;
show tables;

select
	CONCAT_WS(' ', o.ort_name, p1.plz_nr) as ORT,
	CONCAT_WS(' ', s.str_name, CONCAT(p.per_vname, p.per_nname))
from
	ort o
	left join ort_plz op on o.ort_id = op.ort_id
	left join plz p1 on op.plz_id = p1.plz_id
	left join strasse_ort_plz sop on op.orpl_id = sop.orpl_id
	left join strasse s on sop.str_id = s.str_id
	left join person_strasse_ort_plz psp on sop.str_id = psp.str_id and sop.orpl_id = psp.orpl_id
	left join person p on psp.per_id = p.per_id
order by ORT DESC;