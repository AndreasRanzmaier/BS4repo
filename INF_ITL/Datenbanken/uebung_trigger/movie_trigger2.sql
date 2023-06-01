/*Andreas Ranzmaier 23.05.23*/
CREATE SCHEMA movie_trigger;

USE movie_trigger;
-------- AFTER INSERT PROTAGONIST --------
CREATE TABLE AFTER_INSERT_PROTAGONIST(
	aip_id INT PRIMARY KEY AUTO_INCREMENT, 
	aip_user VARCHAR(100) NOT NULL,
	aip_time DATETIME DEFAULT CURRENT_TIMESTAMP, 
	aip_pro_vname VARCHAR(100) NOT NULL,
    aip_pro_nname VARCHAR(100) NOT NULL);
-- drop table AFTER_INSERT_PROTAGONIST

-------- AFTER UPDATE COUNTRY --------
CREATE table AFTER_UPDATE_COUNTRY(
	auc_id INT PRIMARY KEY AUTO_INCREMENT, 
	auc_user VARCHAR(100) NOT NULL,
	auc_time DATETIME DEFAULT CURRENT_TIMESTAMP, 
    auc_cou_id INT not null,
	auc_cou_old_name VARCHAR(100) not null,
	auc_cou_new_name VARCHAR(100) not null);
-- drop table AFTER_UPDATE_COUNTRY

USE movie;

CREATE TRIGGER AFTER_INSERT_PROTAGONIST
AFTER INSERT ON protagonist
FOR EACH ROW INSERT INTO movie_trigger.AFTER_INSERT_PROTAGONIST (aip_user, aip_pro_vname, aip_pro_nname)
VALUES (USER(), NEW.pro_fname, NEW.pro_sname);
-- drop trigger AFTER_INSERT_PROTAGONIST;

SELECT * FROM protagonist;
INSERT INTO protagonist ( pro_fname, pro_sname)
VALUES ( 'andfddi', 'radnasdfzi');

CREATE TRIGGER trigger_after_update_country
AFTER UPDATE ON country
FOR EACH ROW INSERT INTO movie_trigger.AFTER_UPDATE_COUNTRY (auc_user, auc_cou_id, auc_cou_old_name, auc_cou_new_name)
VALUES (USER(), OLD.cou_id, OLD.cou_name, NEW.cou_name);
-- drop trigger trigger_after_update_country;

select * from country;
UPDATE country
SET cou_name = 'Cubaa'
WHERE cou_id = 1;

use movie_trigger;
SELECT * FROM after_update_country;
SELECT * FROM after_insert_protagonist;
