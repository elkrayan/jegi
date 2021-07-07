<?php
require('sql.php');

CREATE TABLE `jige`.`patient` ( `id` INT NOT NULL , `site_id` INT NOT NULL , `lit` INT NOT NULL , `nom` VARCHAR(250) NOT NULL , `prenom` VARCHAR(250) NOT NULL ) ENGINE = InnoDB; 
ALTER TABLE `patient` ADD `ddn` DATE NOT NULL AFTER `prenom`; 

?>