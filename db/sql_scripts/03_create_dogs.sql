CREATE TABLE `dogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `breed` varchar(64) NOT NULL,
  `picture` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
);