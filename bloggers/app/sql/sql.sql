CREATE DATABASE DBNAME DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
use DBNAME;
grant usage on *.* to DBUSER@localhost identified by 's0TeXc1ub';
grant all privileges on DBNAME.* to DBUSER@localhost ;


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` tinyint(1) DEFAULT '0',
  `date_bd` varchar(255) NOT NULL,
  `place_bd` varchar(255) NOT NULL,
  `about` TEXT DEFAULT NULL,
  `image` varchar(255) NOT NULL,  
  `active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
