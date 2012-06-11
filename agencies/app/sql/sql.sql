/*
CREATE DATABASE DBNAME DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
use DBNAME;
grant usage on *.* to DBUSER@localhost identified by 's0TeXc1ub';
grant all privileges on DBNAME.* to DBUSER@localhost ;
*/

CREATE TABLE IF NOT EXISTS `tour_office` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `phones` varchar(255) NOT NULL,
  `infocenter` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `latlng` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `metro_id` int(10) unsigned NOT NULL,
  PRIMARY KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tour_city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tour_metro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `metro` varchar(255) NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  PRIMARY KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

