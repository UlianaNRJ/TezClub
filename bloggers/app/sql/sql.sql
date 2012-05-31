/*
CREATE DATABASE DBNAME DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
use DBNAME;
grant usage on *.* to DBUSER@localhost identified by 's0TeXc1ub';
grant all privileges on DBNAME.* to DBUSER@localhost ;
*/

CREATE TABLE IF NOT EXISTS `users_ext` (
  `id` int(10) unsigned NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `blog_lj` varchar(255) NOT NULL,
  `blog_blogger` varchar(255) NOT NULL,
  `blog_other` varchar(255) NOT NULL,
  `profile_twitter` varchar(255) NOT NULL,
  `profile_fb` varchar(255) NOT NULL,
  `profile_vk` varchar(255) NOT NULL,
  `profile_skype` varchar(255) NOT NULL,
  `participate` tinyint(1) DEFAULT '0',
  `conkurs_rate` float(9,3) NOT NULL DEFAULT '0.000',
  `date_add` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `active` tinyint(1) DEFAULT '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `bb_fin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mounth` int(2) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `conkurs_rate` float(9,3) NOT NULL DEFAULT '0.000',
  `date_add` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
