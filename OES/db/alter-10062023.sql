ALTER TABLE `tb_form` ADD `deleted_flag` ENUM('0','1') AFTER `facetoface`;

UPDATE `tb_form` SET `deleted_flag` = '0';