--CREATE DATABASE sptezclub DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
--use sptezclub;
--grant usage on *.* to sptezclub@localhost identified by 's0TeXc1ub';
--grant all privileges on sptezclub.* to sptezclub@localhost ;


CREATE TABLE IF NOT EXISTS `spr_citycountry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `spr_hoteltype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `spr_hotel_hoteltype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `htype_id` int(10) unsigned NOT NULL,
  `hotel_id` int(10) unsigned NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `spr_hotel_blogger` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogger_id` int(10) unsigned NOT NULL,
  `hotel_id` int(10) unsigned NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `spr_hotel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cc_id`  int(10) unsigned NOT NULL,
  `htype_id`  int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `count_topic` int(10) DEFAULT '0',
  `soc_links` TEXT DEFAULT '',
  `order_links` TEXT DEFAULT '',
  `image` varchar(255) NOT NULL,  
  `active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `spr_blogger` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` tinyint(1) DEFAULT '0',
  `date_bd` varchar(255) NOT NULL,
  `place_bd` varchar(255) NOT NULL,
  `about` TEXT DEFAULT NULL,
  `soc_links` TEXT DEFAULT '',
  `count_bals` int(10) DEFAULT '0',
  `count_voises` int(10) DEFAULT '0',
  `count_topic` int(10) DEFAULT '0',
  `image` varchar(255) NOT NULL,  
  `active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `spr_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `summary` TEXT DEFAULT NULL,
  `text` TEXT DEFAULT NULL,
  `bl_id` int(10) unsigned NOT NULL,
  `operator` varchar(255) NOT NULL,  
  `operatorlink` varchar(512) NOT NULL,  
  `hotel_id` int(10) unsigned NOT NULL,
  `count_comments` int(10) DEFAULT '0',
  `count_bals` float NOT NULL,
  `count_voises` int(10) DEFAULT '0',
  `tags` TEXT DEFAULT '',
  `image` varchar(255) NOT NULL,  
  `active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `spr_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL,
  `text` TEXT DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_key` int(10) unsigned NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
