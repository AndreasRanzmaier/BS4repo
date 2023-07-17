use adresse; 

select * from ort;
select* from plz;
select * from ort_plz;

select ort_name from ort 
inner join ort_plz ;


SELECT p.plz_id, o.ort_id 
FROM ort o
JOIN ort_plz op ON o.ort_id = op.ort_id
JOIN plz p ON op.plz_id = p.plz_id
where p.plz_id = 1;

insert into ort values();


select plz.plz_nr, ort.ort_name from ort 
inner join ort_plz on ort.ort_id = ort_plz.ort_id
inner join plz on plz.plz_id = ort_plz.plz_id;