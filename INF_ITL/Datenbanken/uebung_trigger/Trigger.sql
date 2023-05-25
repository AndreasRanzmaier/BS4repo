/*AR Übung zu Trigger*/
use adresse;
show tables;

/* eigenes Schema um Daten von Trigger events zu speichern*/
create schema adresse_trigger;
use adresse_trigger;

/* 	wenn in Schema adresse in Ort ein neuer DS eingefügt wird 
	soll in adresse_triger.after_insert_ort folgendes gespeichert werden:
    Benutzer (auführende Person)
    Zeitpunkt 
    ort_id 	*/
create table after_insert_ort(
	aio_id int primary key auto_increment, 
	aio_user varchar(255) not null,
	aio_time timestamp default now(), 
	aio_new_ort_id int not null);

use adresse;

-- drop trigger after_insert_ort;
/* new und old: um auf geänderte oder neue Werte zuzugreifen*/

create trigger after_insert_ort 
after insert on ort 
for each row 
insert into adresse_trigger.after_insert_ort(aio_user, aio_new_ort_id)
values(user(), new.ort_id);

/* do the thing the trigger waits for */
insert into ort(ort_name) values("Wien");

/* now we get a new entry into our trigger table */
select * from adresse_trigger.after_insert_ort;

create table adresse_trigger.after_update_ort
	(auo_id int primary key auto_increment, 
	auo_user varchar(255) not null, 
	auo_time datetime default now(),
	auo_old_ort_name varchar(255) not null, 
	auo_new_ort_name varchar(255) not null, 
	auo_ort_id int not null);
    
use adresse;

drop trigger after_update_ort;

create trigger after_update_ort after update on ort 
for each row 
insert into adresse_trigger.after_update_ort(
auo_user, 
auo_old_ort_name, 
auo_new_ort_name,
auo_ort_id) values (user(), old.ort_name, new.ort_name, old.ort_id);

update ort set ort_name = "Wiiiiiien" where ort_id = 4;

select * from ort;
select * from adresse_trigger.after_update_ort;