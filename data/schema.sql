﻿DROP TABLE IF EXISTS `users`;
CREATE TABLE  `users` (
  `id` INT(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) DEFAULT NULL,
  `lname` VARCHAR(45) DEFAULT NULL,
  `email` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;