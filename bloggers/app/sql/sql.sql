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
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
