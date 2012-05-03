-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 03 2012 г., 10:48
-- Версия сервера: 5.5.16
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `betatezclub`
--

-- --------------------------------------------------------

--
-- Структура таблицы `spr_blogger`
--

DROP TABLE IF EXISTS `spr_blogger`;
CREATE TABLE IF NOT EXISTS `spr_blogger` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` tinyint(1) DEFAULT '0',
  `date_bd` varchar(255) NOT NULL,
  `place_bd` varchar(255) NOT NULL,
  `about` text,
  `soc_links` text,
  `count_bals` int(10) DEFAULT '0',
  `count_voises` int(10) DEFAULT '0',
  `count_topic` int(10) DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `spr_blogger`
--

INSERT INTO `spr_blogger` (`id`, `login`, `password`, `name`, `sex`, `date_bd`, `place_bd`, `about`, `soc_links`, `count_bals`, `count_voises`, `count_topic`, `image`, `active`, `timestamp`) VALUES
(1, 'pylxeriya', '', 'Оксана Павленко', 2, '', 'Украина, Киев', 'Прирожденная принцесса, которой каждый день приходится доказывать, что она солнышко и цветок. На самом деле, люблю гулять и кушать, но настаиваю на своем высоком интеллектуальном уровне. По жизни делаю из букв слова, а из слов - тексты и играю в интернет-девочку. Боюсь летать, ненавижу поезда и не могу расслабиться на дороге, но страсть к путешествием сильнее страха. Готова рисковать ради светлого будущего, в которое неистово верю. <br>', '{"fb":"facebook\\u00a0https:\\/\\/www.facebook.com\\/opavlenko","vk":"http:\\/\\/vk.com\\/zakrolikom","lj":"http:\\/\\/pylxeriya.livejournal.com\\/","tw":"https:\\/\\/twitter.com\\/#!\\/za_krolikom"}', 0, 0, 0, '', 1, '2012-05-03 06:12:09'),
(2, 'DaniilFastovets', '', 'Даниил Фастовец', 1, '', 'Украина, Киев', 'бесконечно талантливый молодой режиссёр из города Киева. Снимает клипы и информационные ролики в собственном стиле<br>', '{"fb":"http:\\/\\/www.facebook.com\\/profile.php?id=699957636","vk":"http:\\/\\/vk.com\\/id6301042","lj":"http:\\/\\/www.youtube.com\\/user\\/daniilfastovets?feature=mhee","tw":"https:\\/\\/twitter.com\\/#!\\/DaniilFastovets\\u00a0"}', 0, 0, 0, '', 1, '2012-05-03 06:14:13'),
(3, 'alexcheban', '', 'Александр Чебан', 1, '', 'Украина, Киев', 'Я люблю путешествовать... что на сегодняшний день составляет 50 посещенных страны и более 300 городов. В моем блоге собраны не просто туристические отчеты... каждая история - это яркий и эмоциональный факт из какого-то далекого уголка планеты. Я не только снимаю "открыточные" пейзажи, но и стараюсь в каждой стране больше общаться с ее жителями, ведь только так можно открыть абсолютно невероятные факты и детали, которые находятся в стороне от проторенной туристической тропы.<br>', '{"fb":"http:\\/\\/www.facebook.com\\/oleksandr.cheban","vk":"http:\\/\\/vk.com\\/id6732123\\u00a0","lj":"http:\\/\\/alexcheban.livejournal.com","tw":"https:\\/\\/twitter.com\\/#!\\/alexcheban"}', 0, 0, 0, '', 1, '2012-05-03 06:16:07'),
(4, 'Asnezhok', '', 'Денис Якимчук', 1, '', 'Украина, Киев', 'Лет 5 занимаюсь фотогафией. Люблю путешествовать, чтоб узнавать новые места и людей. Веду блог о фотографии и для фотографии. Дальтоник:)<br>', '{"fb":"https:\\/\\/www.facebook.com\\/asnezhok","vk":"http:\\/\\/vk.com\\/denis.yakimchuk","lj":"http:\\/\\/aqua_snezhok.livejournal.com\\/","tw":"https:\\/\\/twitter.com\\/#!\\/a_snezhok"}', 0, 0, 0, '', 1, '2012-05-03 06:16:46'),
(5, 'Kremeniuk1', '', 'Семён Кременюк', 1, '', 'Украина, Киев', 'Технический король сайта&nbsp;keddr.com. Гик и любитель путешествий. <br>', '{"fb":"http:\\/\\/www.facebook.com\\/profile.php?id=100001556883995","vk":"http:\\/\\/vk.com\\/kremeniuk","lj":"","tw":"https:\\/\\/twitter.com\\/#!\\/Kremeniuk"}', 0, 0, 0, '', 1, '2012-05-03 06:17:29'),
(6, 'Kremeniuk2', '', 'Саша Ляпота', 1, '', 'Украина, Киев', 'Технический король сайта&nbsp;keddr.com. Гик и любитель путешествий. <br>', '{"fb":"http:\\/\\/www.facebook.com\\/profile.php?id=100001556883995","vk":"http:\\/\\/vk.com\\/kremeniuk","lj":"","tw":"https:\\/\\/twitter.com\\/#!\\/Kremeniuk"}', 0, 0, 0, '', 1, '2012-05-03 06:18:04');

-- --------------------------------------------------------

--
-- Структура таблицы `spr_citycountry`
--

DROP TABLE IF EXISTS `spr_citycountry`;
CREATE TABLE IF NOT EXISTS `spr_citycountry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `spr_citycountry`
--

INSERT INTO `spr_citycountry` (`id`, `name`, `active`) VALUES
(1, 'Кемер (Kemer)', 1),
(2, 'Анталия (Antalya)', 1),
(3, 'Белек (Belek)', 1),
(5, 'Бодрум (Bodrum)', 1),
(6, 'Сиде (Side)', 1),
(7, 'Измир (Izmir)', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `spr_comment`
--

DROP TABLE IF EXISTS `spr_comment`;
CREATE TABLE IF NOT EXISTS `spr_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text,
  `user_id` int(10) unsigned NOT NULL,
  `user_key` int(10) unsigned NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `spr_hotel`
--

DROP TABLE IF EXISTS `spr_hotel`;
CREATE TABLE IF NOT EXISTS `spr_hotel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cc_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `count_topic` int(10) DEFAULT '0',
  `soc_links` text,
  `order_links` text,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `spr_hotel`
--

INSERT INTO `spr_hotel` (`id`, `cc_id`, `name`, `description`, `count_topic`, `soc_links`, `order_links`, `image`, `active`, `timestamp`) VALUES
(1, 1, 'Amara Dolce Vita', '5*<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/amaradolcevita","vkgroup":"http:\\/\\/vk.com\\/amaradolcevita","site":"http:\\/\\/www.amaraworld.com\\/?id=15&lang=ru","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/14699.html"}', NULL, '', 1, '2012-05-03 05:56:45'),
(2, 1, 'Vogue Avantgarde', '5*<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/voguehotel.net","vkgroup":"http:\\/\\/vk.com\\/voguehotel","site":"http:\\/\\/www.avantgardevoguehotel.com\\/","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/130381.html"}', NULL, '', 1, '2012-05-03 05:57:16'),
(3, 2, 'Mardan Palace', '5*<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/pages\\/Mardan-Palace\\/80838735997","vkgroup":" http:\\/\\/vk.com\\/mardanpalace","site":"http:\\/\\/www.mardanpalace.com\\/","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/9003335.html"}', NULL, '', 1, '2012-05-03 05:58:22'),
(4, 3, 'Ela Quality', '5*<br>', 1, '{"fbgroup":"https:\\/\\/www.facebook.com\\/ElaResort","vkgroup":" http:\\/\\/vk.com\\/elaquality","site":"http:\\/\\/www.elaresort.com\\/en-US\\/","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/72588.html"}', NULL, '', 1, '2012-05-03 05:58:56'),
(5, 3, 'Spice Hotel', '5*<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/spicehotel","vkgroup":"http:\\/\\/vk.com\\/spicehotel","site":" http:\\/\\/www.elaresort.com\\/en-US\\/","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/72567.html"}', NULL, '', 1, '2012-05-03 05:59:27'),
(6, 3, 'MaxxRoyal', '5*<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/maxxroyalhotel","vkgroup":"http:\\/\\/vk.com\\/maxxroyal","site":"http:\\/\\/www.maxxroyal.com\\/ru\\/","tzturpage":" "}', NULL, '', 1, '2012-05-03 05:59:57'),
(7, 3, 'Voyage Belek', '5*<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/pages\\/Voyage-Hotels\\/198219574540","vkgroup":"http:\\/\\/vk.com\\/voyagegolf","site":"http:\\/\\/www.voyagehotel.com\\/Voyage-Belek-Golf-Spa-EN","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/72603.html"}', NULL, '', 1, '2012-05-03 06:00:25'),
(8, 2, 'Voyage Sorgun', '5*<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/pages\\/Voyage-Hotels\\/198219574540","vkgroup":"http:\\/\\/vk.com\\/voyagesorgun","site":"http:\\/\\/www.voyagehotel.com\\/Voyage-Sorgun-EN","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/29168.html"}', NULL, '', 1, '2012-05-03 06:00:55'),
(9, 5, 'Voyage Bodrum', '5*<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/pages\\/Voyage-Hotels\\/198219574540","vkgroup":"http:\\/\\/vk.com\\/voyagebodrum","site":"http:\\/\\/www.voyagehotel.com\\/Voyage-Bodrum-EN","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/29250.html"}', NULL, '', 1, '2012-05-03 06:01:36'),
(10, 5, 'Voyage Turkbuku', '<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/pages\\/Voyage-Hotels\\/198219574540","vkgroup":"http:\\/\\/vk.com\\/turkbuku","site":"http:\\/\\/www.voyagehotel.com\\/Voyage-Turkbuku-EN","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/29248.html"}', NULL, '', 1, '2012-05-03 06:02:01'),
(11, 5, 'Voyage Torba', '<br>', 1, '{"fbgroup":"http:\\/\\/www.facebook.com\\/pages\\/Voyage-Hotels\\/198219574540","vkgroup":"http:\\/\\/vk.com\\/voyagetorba","site":"http:\\/\\/www.voyagehotel.com\\/Voyage-Torba-EN","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/29246.html"}', NULL, '', 1, '2012-05-03 06:02:30'),
(12, 2, 'Paloma Renaissance', '5*<br>', 1, '{"fbgroup":"http:\\/\\/www.facebook.com\\/PalomaHotels","vkgroup":"http:\\/\\/vk.com\\/paloma_renaissance","site":"http:\\/\\/www.palomahotels.com\\/renaissance","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/14529.html"}', NULL, '', 1, '2012-05-03 06:02:59'),
(13, 6, 'Paloma  Oceana', '<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/PalomaHotels","vkgroup":"http:\\/\\/vk.com\\/palomaoceana","site":"http:\\/\\/www.palomahotels.com\\/oceana","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/57501.html"}', NULL, '', 1, '2012-05-03 06:03:24'),
(14, 3, 'Paloma  Grida Village', '<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/PalomaHotels","vkgroup":"http:\\/\\/vk.com\\/club37960098","site":"http:\\/\\/www.palomahotels.com\\/grida","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/343.html"}', NULL, '', 1, '2012-05-03 06:03:47'),
(15, 7, 'Paloma  Club Sultan Ozdere', '5*<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/PalomaHotels","vkgroup":" http:\\/\\/vk.com\\/club37961726","site":" http:\\/\\/www.palomahotels.com\\/sultan","tzturpage":" http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/4100269.html"}', NULL, '', 1, '2012-05-03 06:04:13'),
(16, 7, 'Paloma  Pasha', '<br>', 0, '{"fbgroup":"http:\\/\\/www.facebook.com\\/pages\\/Paloma-Hotels-Pasha-Resort\\/140657142661052","vkgroup":"http:\\/\\/vk.com\\/club37962564","site":"http:\\/\\/www.palomahotels.com\\/pasha","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/9004051.html"}', NULL, '', 1, '2012-05-03 06:04:39'),
(17, 0, 'Maritim Pine Beach', '<br>', 1, '{"fbgroup":"http:\\/\\/www.facebook.com\\/pages\\/Maritim-Pine-Beach-Resort-Belek\\/219671734714727","vkgroup":"http:\\/\\/vk.com\\/club4007219","site":"http:\\/\\/www.maritim.com.tr\\/resort\\/ru-RU\\/","tzturpage":"http:\\/\\/www.teztour.ua\\/turkey\\/hotel\\/index\\/id\\/57472.html"}', NULL, '', 1, '2012-05-03 06:05:00');

-- --------------------------------------------------------

--
-- Структура таблицы `spr_hoteltype`
--

DROP TABLE IF EXISTS `spr_hoteltype`;
CREATE TABLE IF NOT EXISTS `spr_hoteltype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `spr_hoteltype`
--

INSERT INTO `spr_hoteltype` (`id`, `name`, `active`) VALUES
(1, 'Семейный', 1),
(2, 'Молодежный', 1),
(3, 'Роскошный отдых', 1),
(6, 'Активный отдых', 1),
(5, 'Спокойный отдых', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `spr_hotel_blogger`
--

DROP TABLE IF EXISTS `spr_hotel_blogger`;
CREATE TABLE IF NOT EXISTS `spr_hotel_blogger` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogger_id` int(10) unsigned NOT NULL,
  `hotel_id` int(10) unsigned NOT NULL,
  `count` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `spr_hotel_blogger`
--

INSERT INTO `spr_hotel_blogger` (`id`, `blogger_id`, `hotel_id`, `count`) VALUES
(1, 3, 17, 1),
(6, 6, 12, 1),
(3, 5, 17, 1),
(4, 3, 11, 1),
(5, 6, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `spr_hotel_hoteltype`
--

DROP TABLE IF EXISTS `spr_hotel_hoteltype`;
CREATE TABLE IF NOT EXISTS `spr_hotel_hoteltype` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `htype_id` int(10) unsigned NOT NULL,
  `hotel_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `spr_hotel_hoteltype`
--

INSERT INTO `spr_hotel_hoteltype` (`id`, `htype_id`, `hotel_id`) VALUES
(1, 6, 1),
(2, 3, 1),
(3, 1, 1),
(4, 1, 2),
(5, 3, 3),
(6, 1, 3),
(7, 5, 3),
(8, 6, 4),
(9, 2, 4),
(10, 1, 4),
(11, 3, 5),
(12, 1, 5),
(13, 1, 6),
(14, 6, 7),
(15, 1, 7),
(16, 6, 8),
(17, 2, 8),
(18, 1, 8),
(19, 5, 9),
(20, 1, 10),
(21, 6, 11),
(22, 2, 11),
(23, 1, 11),
(24, 5, 12),
(25, 6, 13),
(26, 2, 13),
(27, 1, 13),
(28, 1, 14),
(29, 6, 15),
(30, 1, 15),
(31, 2, 16),
(32, 1, 16),
(33, 1, 17);

-- --------------------------------------------------------

--
-- Структура таблицы `spr_topic`
--

DROP TABLE IF EXISTS `spr_topic`;
CREATE TABLE IF NOT EXISTS `spr_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `summary` text,
  `content` text,
  `bl_id` int(10) unsigned NOT NULL,
  `hotel_id` int(10) unsigned NOT NULL,
  `count_comments` int(10) DEFAULT '0',
  `count_bals` int(10) DEFAULT '0',
  `count_voises` int(10) DEFAULT '0',
  `tags` text,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `spr_topic`
--

INSERT INTO `spr_topic` (`id`, `title`, `summary`, `content`, `bl_id`, `hotel_id`, `count_comments`, `count_bals`, `count_voises`, `tags`, `image`, `active`, `timestamp`) VALUES
(1, 'Города на краю земли ', 'Друзья, предлагаем вам посмотреть 5 городов в мире, который в \r\nпрямом смысле расположены на краю земли. Два из них находятся в Испании,\r\n поэтому и заметка в испанском блоге. Конечно, наверняка в мире таких \r\nгородов не пять, и скорее всего даже не десять, так что будем считать \r\nчто это Топ 5 подобных городов. Приятного просмотра :)<br><br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/c5b8b0.jpg"><br>', '<div class="content">\r\n                Друзья, предлагаем вам посмотреть 5 городов в \r\nмире, который в прямом смысле расположены на краю земли. Два из них \r\nнаходятся в Испании, поэтому и заметка в испанском блоге. Конечно, \r\nнаверняка в мире таких городов не пять, и скорее всего даже не десять, \r\nтак что будем считать что это Топ 5 подобных городов. Приятного \r\nпросмотра :)<br>\r\n<br>\r\nРонда, Испания<br>\r\n<br>\r\nРонда (исп. Ronda (Málaga) ) — город и муниципалитет в Испании, входит в\r\n провинцию Малага. Город расположен в гористой местности на высоте \r\nпримерно 750м над уровнем моря, на краю скалы. Старую часть города от \r\nновой разделяет глубокий каньон «El Tajo», оставляя часть домов прямо на\r\n краю пропасти.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/c5b8b0.jpg"><a name="cut" rel="nofollow"></a> <br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/2af508.jpg"><br>\r\n<br>\r\nМанарола, Италия<br>\r\n<br>\r\nМанарола (Manarola) – это небольшой итальянский городок на севере \r\nИталии, расположенный в провинции Лигурия (Liguria). Этот город \r\nопределенно является одним из самых привлекательных мест в Италии, \r\nславившийся еще в древне-римских текстах своим прекрасным вином. \r\nПоистине удивительное место.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/e73f9a.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/b8dabf.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/f651c8.jpg"><br>\r\n<br>\r\nСанторини, Греция<br>\r\n<br>\r\nСанторини – это небольшая группа островов вулканического происхождения в\r\n виде кольца, расположенная в Эгейском море в 200 км от материковой \r\nГреции. Древнейшее поселение на этом острове было еще в 3000 г до н.э., \r\nкоторое, однако, было уничтожено мощным извержением вулкана примерно в \r\n1600 г до н.э. В центре расположена гигантская лагуна размерами около 12\r\n на 7 км, окруженная 300 метровыми отвесными скалами.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/8d32cc.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/e0656e.jpg"><br>\r\n<br>\r\nКастельфульит-де-ла-Рока, Испания<br>\r\n<br>\r\nЭтот небольшой городок в Каталонии(Испания) располагается на 50-метровом\r\n базальтовой скале километровой длины. Этот утёс был образован двумя \r\nвстречными потоками лавы.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/9aa421.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/3c8f38.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/14667c.jpg"><br>\r\n<br>\r\nБонифачо, Корсика<br>\r\n<br>\r\nНа восточной оконечности острова Корсика располагается самая большая \r\nкомунна Бонифачо(Bonifacio). Эта цитадель находится на высоте 70 метров \r\nнад уровнем моря на краю скалы, непрерывно подвергающейся воздействию \r\nморя и ветра. Будучи когда-то военно-морской бухтой, сейчас это пристань\r\n для фешенебельных яхт со всего мира.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/d866df.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/26/60a78e.jpg"><br>\r\n<br>\r\nИсточник: <a href="http://www.bambooclub.ru/articles/document41876.htm" rel="nofollow">Bamboo Club</a>\r\n            </div>', 6, 4, 0, 0, 0, 'Испания,Греция,фото,путешествия', '', 1, '2012-05-03 06:27:45'),
(2, 'Валенсия за 24 часа: что посмотреть, куда сходить, где поесть ', 'Самый большой европейский океанариум, Святой Грааль и другие лучшие достопримечательности Валенсии.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/042978.jpg"><br>\r\n<br>\r\nВаленсия – столица одноименной провинции и третий по количеству жителей город Испании. <br>\r\nИстория Валенсии насчитывает более 22 веков. Римляне, варвары, мавры, \r\nиспанцы оставили свой след в истории города. Расцвет Валенсии приходится\r\n на XV-XVII века, именно тогда королевство Валенсия становится одним из \r\nважнейших центров европейской торговли.', '<div class="content">\r\n                Самый большой европейский океанариум, Святой Грааль и другие лучшие достопримечательности Валенсии.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/042978.jpg"><br>\r\n<br>\r\nВаленсия – столица одноименной провинции и третий по количеству жителей город Испании. <br>\r\nИстория Валенсии насчитывает более 22 веков. Римляне, варвары, мавры, \r\nиспанцы оставили свой след в истории города. Расцвет Валенсии приходится\r\n на XV-XVII века, именно тогда королевство Валенсия становится одним из \r\nважнейших центров европейской торговли.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/414836.jpg"><br>\r\n<br>\r\nСегодня Валенсия – это второй по величине порт Испании, город, известный\r\n международными спортивными событиями – например, гонкой Formula 1, а \r\nтакже большой туристический центр.<br>\r\n<a name="cut" rel="nofollow"></a> <br>\r\nМавры называли Валенсию с ее мягким климатом и прекрасной природой — раем на земле. <br>\r\n<br>\r\nРитм жизни здесь по-южному неторопливый – немного курортный, немного \r\nпровинциальный. Здесь прекрасная архитектура, свежий воздух, много \r\nзелени, а вот толп на улицах – нет. Городские достопримечательности \r\nрасположены компактно, и добраться до них можно пешком, на велосипеде \r\nили общественном транспорте.<br>\r\n<br>\r\nЕсли вы хотите избавиться от стресса большого города – вам сюда. И \r\nособенно мы рекомендуем посетить Валенсию, если вы путешествуете с \r\nмаленькими детьми. <br>\r\n<br>\r\n9.00 – 10.00 – пьем кофе напротив городского совета Валенсии<br>\r\n<br>\r\nНачнем свою прогулку со станции метро Xativa. Выйдя из метро, увидим \r\nпрямо перед собой арену для корриды на площади Plaza de Toros.<br>\r\n<br>\r\nМимо кафе и магазинчиков на Marques de Sotelо пройдем до площади \r\nAyuntamiento – там расположен городской совет Валенсии, а посреди \r\nплощади искрятся прекрасные фонтаны.<br>\r\n<br>\r\nСадитесь за столик одного из многочисленных кафе на площади или \r\nнеподалеку, чтобы позавтракать или выпить чашечку кофе на солнышке. \r\nКстати, в Валенсии солнечными являются более 300 дней в году.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/20c1d0.jpg"><br>\r\n<br>\r\n10.00 – 11.00 – заходим в гости к Священному Граалю<br>\r\n<br>\r\nПродолжим нашу прогулку по Calle San Vicente Martir и попадем на площадь\r\n Plaza de la Reigna. Тут расположен знаменитый Собор Валенсии, который \r\nбыл построен в XIII веке на месте разрушенной мечети и, по утверждению \r\nученых, на месте храма римской богини Дианы.<br>\r\n<br>\r\nКаждые из трех ворот храма исполнены в своем стиле: Железные ворота – \r\nбарокко, Апостольские ворота – в готическом стиле, Дворцовые ворота – в \r\nроманском стиле. Колокольня собора является самым высоким религиозным \r\nсооружением в Валенсии. С нее открывается чудесный вид на город.<br>\r\n<br>\r\nЕще одна причина посетить собор: Святой Грааль – чаша, из которой пил \r\nИисус на тайной вечере. Аутентичность этой чаши официально признана \r\nсамим Ватиканом.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/e5706a.jpg"><br>\r\n<br>\r\nПопасть в собор можно ежедневно с 10.00 до 17.30 (по субботам, воскресеньям – с 14.00 до 17.30) за €3.<br>\r\n<br>\r\n11.00 – 12.00 – осматриваем Шелковую биржу — La Lonja<br>\r\n<br>\r\nПо узким улочкам старого города попадаем к готическому зданию Шелковой \r\nбиржи. Здание биржи было построено на рубеже XV и XVI веков. В 1996 году\r\n это строение было занесено в список мирового наследия ЮНЕСКО.<br>\r\n<br>\r\nВ Средние века здесь торговали шелком, заключали сделки купцы и \r\nсудовладельцы. Сегодня здание функционирует как музей. Посмотреть на \r\nинтерьер биржи можно ежедневно с 10.00 до 20.30, в воскресенье – с 15.00\r\n до 20.30. Вход бесплатный.<br>\r\n<br>\r\nОкончив осмотр Шелковой биржи, пересекаем Plaza del Mercado и отправляемся на центральный рынок.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/5a2181.jpg"><br>\r\n<br>\r\n12.00 – 13.00 обедаем на рынке Mercado Central<br>\r\n<br>\r\nОбъединим прекрасное с полезным и отобедаем с большим вкусом прямо на \r\nрынке Mercado Central. Как и 100 лет назад, рынок работает по своему \r\nпрямому назначению. Посещение рынка обязательно даже для тех, кто на \r\nдиете, ведь это один из самых больших и красивых рынков Испании.<br>\r\n<br>\r\nЗдание рынка было построено в 1928 году, оно точно повторяет форму \r\nоткрытого рынка, который был здесь ранее. Это великолепный образец \r\nархитектуры арт-нуво точно передает колорит города с помощью мозаики, \r\nвитражей и керамики.<br>\r\nВнутри работают более тысячи торговых прилавков. Тут можно выбрать \r\nпрекрасные овощи и фрукты, попробовать сыры, хамон, орехи, сухофрукты, \r\nпонюхать специи, полюбоваться на свежайшие морепродукты.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/7c023b.jpg"><br>\r\n<br>\r\nРынок работает с понедельника по субботу с 7.30 до 14.30, воскресенье – выходной.<br>\r\n<br>\r\n13.00 – 15.00 прогулка по старому руслу реки Турия – Jardi de Turia<br>\r\n<br>\r\nОтведав местных деликатесов на рынке, отправимся дышать свежим воздухом \r\n«на дно» — в парк, который расположен в старом русле реки Турия.<br>\r\n<br>\r\nКогда-то она текла через Валенсию, регулярно разливаясь и нанося городу \r\nзначительный ущерб. После особенно тяжелого наводнения 1957 года было \r\nрешено перенести русло реки, чтобы обезопасить город от стихии воды. Что\r\n и было сделано.<br>\r\n<br>\r\nВ старом русле был разбит прекрасный парк с пальмами и бутылочными \r\nдеревьями. Этот парк стал не только зелеными легкими города, но и \r\nпопулярным местом для досуга. Там располагаются статуи, фонтаны, \r\nплощадки для разных видов спорта и аттракционы для детей.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/1c75bc.jpg"><br>\r\n<br>\r\nВыйдя из здания рынка, отправляйтесь по Calle de Murillo и поверните \r\nнаправо на Carrer de Guillem de Castro. Минуя здания Католического \r\nуниверситета и Музея истории и культуры Валенсии, вы уткнетесь в сады \r\nТурии и пересекающий их мост — Puente dе les Artes.<br>\r\n<br>\r\nОтправляйтесь на прогулку по парку в сторону Ciudad de Las Artes y Las \r\nCiencias – Город искусств и науки. Прогулка займет у вас не более 1 \r\nчаса.<br>\r\n<br>\r\n15.00 – 16.00 – восхищаемся архитектурой Ciudad de Las Artes y Las Ciencias<br>\r\n<br>\r\nCiudad de Las Artes y Las Ciencias, Город искусств и наук, — без сомнения, одна из главных достопримечательностей Валенсии.<br>\r\n<br>\r\nФутуристический архитектурный комплекс, который был построен \r\nархитекторами Сантьяго Калатравой и Феликсом Канделой, поражает \r\nвоображение и воспринимается как архитектура будущего. Сложно поверить, \r\nчто первое сооружение комплекса – l’Hemisferic, – было открыто еще 14 \r\nлет назад, в 1998 году.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/9fbd69.jpg"><br>\r\n<br>\r\nСегодня комплекс состоит из 5 главных сооружений – l’Hemispheric (там \r\nнаходится кинотеатр IMAX), l’Oceanografic (океанариум), l’Agora \r\n(выставочный зал), Музей наук принца Филиппа и Дворец искусств королевы \r\nСофии.<br>\r\n<br>\r\nПриближаясь к грандиозным сооружениям Города по парку в русле Турии, не пропустите статую Гулливера посреди небольшого озерца.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/8f6ac3.jpg"><br>\r\n<br>\r\n16.00 – 18.00 – изучаем обитателей морских глубин в аквариуме L’Oceanografic<br>\r\n<br>\r\nВизит в океанариум Города искусств и наук Валенсии приведет в восторг и ребенка, и взрослого.<br>\r\n<br>\r\nЗдесь можно столкнуться с акулой лицом к лицу, увидеть, как над вами \r\nпроплывает косяк рыб, оценить размеры моржей и увидеть, как тренируют \r\nдельфинов.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/74f4e1.jpg"><br>\r\n<br>\r\nПанорамные туннели океанариума не оставят вас равнодушными, даже если вы\r\n успели побывать в аквариумах Лиссабона, Барселоны или Дубая.<br>\r\n<br>\r\nБилет в самый большой океанариум Европы для взрослого стоит €24,90. \r\nСтудентам, пенсионерам и детям младше 12 лет – скидки, а дети до 4 лет \r\nпроходят бесплатно. Билеты можно приобретать в кассах океанариума или на\r\n сайте.<br>\r\n<br>\r\nОкеанариум работает ежедневно с 10.00. Время закрытия зависит от сезона и дня недели, проверяйте режим работы на сайте.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/228276.jpg"><br>\r\n<br>\r\nДостопримечательности Валенсии. 18.00 – 20.00 – шопинг в торговом центре El Saler<br>\r\n<br>\r\nЕсли вы привыкли совмещать заграничные впечатления с заграничным \r\nшопингом, пересеките Autopista El Saler и отправляйтесь в большой \r\nогромный торговый центр El Saler прямо напротив Города искусств и науки.<br>\r\n<br>\r\nТам можно перекусить, обновить гардероб или купить в гипермаркете \r\nCarrrefour хамон в качестве сувениров друзьям и знакомым. Можно не \r\nспешить, ведь торговый центр работает до 22.00.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/2044dd.jpg"><br>\r\n<br>\r\n20.00 – 22.00 – пробуем на вкус гордость Валенсии — паэлью<br>\r\n<br>\r\nОдин из символов Валенсии – паэлья, блюдо из риса, мяса или \r\nморепродуктов и овощей, которое готовится на большой плоской сковороде. \r\nИменно от названия сковороды и происходит название блюда.<br>\r\n<br>\r\nВ традиционную валенсийскую паэлью входят белый рис, мясо кролика, \r\nкурица и улитки, а также овощи и бобы. Однако там точно нет места \r\nколбасе или сосискам.<br>\r\n<br>\r\nПаэлью можно отведать во многих кафе, ее даже можно взять на вынос из \r\nснек-бара. Мы рекомендуем уличное кафе El Café Del Mar (Plz. Lope de \r\nVega, 5 — 46001 Valencia — Tel. 96 392 20 22). Кафе бюджетное, а еда – \r\nпальчики оближешь. Например, сковорода вкуснейшей валенсийской паэльи на\r\n 2 голодных мужчин стоит всего €13.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/2b95f5.jpg"><br>\r\n<br>\r\nДостопримечательности Валенсии. 22.00 – 00.00 прогулка по ночному городу с бар-шопингом<br>\r\n<br>\r\nНесмотря на размеренную дневную жизнь, Валенсия умеет веселиться ночью. \r\nЗа весельем идем прямиком в богемный район Carmen. Чтобы понять, что \r\nтакое Carmen, смешайте в своей голове атмосферу парижского Монмартра и \r\nмноголикость лондонского Camden Town. Далее – уменьшите масштаб. Готово –\r\n перед вами Carmen.<br>\r\n<br>\r\nБольшая часть ночной жизни района Carmen сосредоточена на территории \r\nмежду Mercado central, Plaza de la Reina и Calle Caballeros. Тут можно \r\nнайти заведение на любой вкус – от подвальчика с джазом до жаркой \r\nсальса-тусовки.<br>\r\n<br>\r\nНочное действо не начнется ранее полуночи, однако выпить можно и ранее. \r\nТолько не верьте вывескам: если заведение называется bar, скорее всего, \r\nтам едят, но не пьют. Большой выбор спиртных напитков можно найти в \r\ncafe, а славно потанцевать можно в pub. Так что проверяйте формат \r\nзаведения личным визитом.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/ab067f.jpg"><br>\r\n<br>\r\nДостопримечательности Валенсии. 00.00– 3.00 погружаемся в ночную жизнь богемного района Carmen<br>\r\n<br>\r\nОдно из самых известных ночных заведений в Carmen, которое придется по \r\nвкусу многим, – Radio City. Заведение славится отличными диджеями и \r\nуниверсальной музыкой. Однако учтите, как и многие другие ночные \r\nзаведения в Carmen, Radio City заканчивает свои вечеринки поздней ночью –\r\n в 3.30.<br>\r\n<br>\r\nВход бесплатный. Бокал пива обойдется примерно €4-5.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/4c0854.jpg"><br>\r\n<br>\r\nГде остановиться<br>\r\n<br>\r\nЕсли во время своего пребывания в Валенсии вы хотите посмотреть все \r\nосновные достопримечательности, выбирайте отель или хостел в \r\nисторическом центре. Деловой центр не так интересен и удобен для \r\nтуристов, а отели возле пляжа хороши для тех, кто приехал на море, а не в\r\n Валенсию.<br>\r\nВ центре много отелей и хостелов на любой вкус.<br>\r\n<br>\r\nКак передвигаться по городу.<br>\r\n<br>\r\nВаленсия – город компактный, и если ваш отель находится в старом городе,\r\n вы легко доберетесь до большинства достопримечательностей пешком.<br>\r\n<br>\r\nВ городе есть метро. Станции обозначены «конфетками M&amp;M’s». Метро \r\nпригодится вам, чтобы добраться в аэропорт и обратно. Поездка на метро в\r\n пределах одной зоны обходится в €1,45, в пределах 2 зон (из аэропорта в\r\n центр) — €2. Не выбрасывайте билет, войдя в метро, — его требуется \r\nприложить к автомату на выходе. И не пытайтесь сэкономить, купив билет \r\nна 1 зону вместо двух: в метро ходят контролеры.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/19/c85143.jpg"><br>\r\n<br>\r\nНа каком языке говорить.<br>\r\n<br>\r\nВ Валенсии в обиходе 2 языка: официальный язык Испании – испанский, а \r\nтакже язык провинции – валенсийский. Именно на этих двух языках \r\nдублированы все надписи в общественных местах.<br>\r\n<br>\r\nА вот английский может вам не помочь совсем — испанцы, как и большинство\r\n народов Западной Европы, не отличаются рвением в изучении иностранных \r\nязыков. Язык жестов – вот что всегда выручает туриста.<br>\r\n<br>\r\nАвтор: Катерина Цыганкова <br>\r\nПо материалам: <a href="http://travel.tochka.net/7186-valensiya-za-24-chasa-chto-posmotret-kuda-skhodit-gde-poest/" rel="nofollow">tochka.net</a>\r\n            </div>', 5, 17, 0, 0, 0, 'Испания,Греция,фото,путешествия', '', 1, '2012-05-03 06:28:50'),
(3, 'Ибица. Поездка по острову. ', 'Фото-отчеты путешествий хороши тем, что просматривая их — \r\nкак-будто сам оказываешься на месте автора. А еще можно взять «на \r\nвооружение» опыт автора. Поэтому искренне надеемся, что этот фото-отчет \r\nпоездки на Ибицу вам как минимум понравится, а возможно и вовсе поможет \r\nспланировать свою поездку.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/e7f630.jpg">', '<div class="content">\r\n                Фото-отчеты путешествий хороши тем, что \r\nпросматривая их — как-будто сам оказываешься на месте автора. А еще \r\nможно взять «на вооружение» опыт автора. Поэтому искренне надеемся, что \r\nэтот фото-отчет поездки на Ибицу вам как минимум понравится, а возможно и\r\n вовсе поможет спланировать свою поездку.<br>\r\n<br>\r\nКогда я первый раз позвонил домой из нашего отеля, расположенного на \r\nПлайя ден Босса, я описал Ибицу как что-то похожее на Хургаду. Пока мы \r\nехали из аэропорта, вид состоял из прямоугольных коробок отелей вдоль \r\nдороги, каких-то редких пальмочек, заборов неоконченных строек и прочих \r\nнеприглядностей в таком же духе. Ну и конечно с утра пьяные \r\nсоотечественники на пороге отеля, куда же без них. И первые два дня я \r\nтак и думал, что хвалить это место не за что, во всяком случае не за \r\nархитектуру или природную красоту. Но по истечении двух дней я свое \r\nмнение поменял. А в последний день, который был свободен от официальных \r\nмероприятий, мы с друзьями взяли машину и отправились наугад в поездку \r\nпо острову. И эти несколько часов показали, что Ибица оправдывает свою \r\nпопулярность и рекомендовать ее посещение можно.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/e7f630.jpg"><br>\r\n<a name="cut" rel="nofollow"></a> <br>\r\nПотеряв неожиданно много времени на оформление машины в прокате мы \r\nвынуждены были ограничиться только посещением северной и восточной \r\nчастей острова. Жаль, не доехали до Сэнт Антони — второго по численности\r\n населения города, ведь именно отсюда пошла слава Ибицы, здесь полвека \r\nназад появились первые отели и их обитатели, здесь расположено культовое\r\n Кафе дель Мар. Ну, ничего, в следующий раз. Увиденного в любом случае \r\nоказалось достаточно, чтобы сделать позитивные выводы.<br>\r\n<br>\r\nИтак, первая остановка — городок Санта Эулариа дес Риу. Бросив машину на\r\n парковке, мы отправились на поиски достопримечательностей. Город не \r\nбольшой, случайно потеряв одного человека из нашей команды, мы также \r\nслучайно его вскоре встретили в другой части города.<br>\r\n<br>\r\nАдминистрация. От нее к морю ведет целая сувенирная улочка, на которой я\r\n даже пополнил свой багаж знаний представлением о том, что такое морское\r\n ухо.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/c55fd2.jpg"><br>\r\n<br>\r\nМорское ухо. Сначала я подумал, что это краска такая, оказалось — натур продукт<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/77d6a1.jpg"><br>\r\n<br>\r\nГород вырос на месте впадения реки с одноименным названием в море. Эта река, кстати, единственная на Ибице.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/30c8d0.jpg"><br>\r\n<br>\r\nПляж здесь совсем небольшой, по сравнению с трехкилометровым Плайа ден Босса, но зато здесь есть спасатели.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/260756.jpg"><br>\r\n<br>\r\nИ отели-отели-отели:<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/28f4f8.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/a5e440.jpg"><br>\r\n<br>\r\nУкрашение Санта Эуларии — церковь Puig de Missa (XVI в.). Ее трудно не \r\nзаметить, она занимает вершину холма в западной части города. <br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/a5d923.jpg"><br>\r\n<br>\r\nПока дошли успели отвлечься на дико растущие лимоны:<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/6165c6.jpg"><br>\r\n<br>\r\nИскусство озеленения:<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/fefee1.jpg"><br>\r\n<br>\r\nПотрясающей красоты цветы. Оказывается, это страстофрукт или — чтоб по-русски и понятно — маракуйя.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/ecc726.jpg"><br>\r\n<br>\r\nДошли. Церковь:<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/554025.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/9cef14.jpg"><br>\r\n<br>\r\nВнутри оказалось достаточно скромненько:<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/cce3c9.jpg"><br>\r\n<br>\r\nВид с холма на город:<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/e51927.jpg"><br>\r\n<br>\r\nНа улицах Санта Эуларии. Ящерицы — символ Ибицы (и сувенир номер один):<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/c519a5.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/82342f.jpg"><br>\r\n<br>\r\nЕдем дальше мимо города Сант Карлеса (хотя, что это за город — так, \r\nпарочка домов). Он известен колоритным рынком хиппи, о котором будет \r\nфото-сюжет в следующей части, и двумя зданиями, стоящими рядом друг с \r\nдругом. Дорога как раз проходит между ними, поэтому пропустить их \r\nневозможно. Первое здание — это церковь, в которой не так давно \r\nпроисходили интересные события.<br>\r\n<br>\r\nОдно из самых «гоанских» заведений на Ибице родилось в Сан Карлосе в \r\nдень Святого Карлоса, 4 ноября 1954 года. Скромный фермер и плотник Хуан\r\n Мари открыл бар у дороги, в задней комнате разместил танцпол, а на \r\nвывеске написал Las Dalias. Со всего севера острова, да и не только с \r\nсевера, сюда начали слетаться любители потусить, пообщаться и повыпивать\r\n за символическую плату. Заведение стало культовым в прямом смысле \r\nслова: в Las Dalias приходили праздновать свадьбы, рождество, крещения \r\nмладенцев… Священник Сан Карлоса дошел до крайней степени отчаяния от \r\nтого, что его паства столь падка на греховные удовольствия, и с целью \r\nвозвращения блудных сынов под крылышко церкви решился на беспрецедентный\r\n шаг – начал крутить для прихожан кинофильмы. Помогло как мертвому \r\nприпарка. Las Dalias были неудержимы. Во 1960ых Хуан Мари одним из \r\nпервых ибисенских предпринимателей оценил потенциал зарождающейся \r\nтуриндустрии и поспешил заключить договоры с туроператорами, которые \r\nначали поставлять своих клиентов в Las Dalias.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/3fc31e.jpg"><br>\r\n<br>\r\nВторое здание — легендарный бар Аниты. Это место — один из эпицентров, откуда есть пошла земля ибицевская. <br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/b9cc39.jpg"><br>\r\n<br>\r\nРядом с Las Dalias стояло еще одно знаковое заведение той поры, бар \r\nAnita, названный в честь его владелицы. К Аните полвека назад сходились \r\nна огонек друзья, друзья друзей и просто хорошие люди, которые были друг\r\n другу как одна большая семья. Они часами сидели за столом, радуясь \r\nжизни и обществу друг друга, но была и еще одна причина, по которой даже\r\n не слишком любящие застолье ибисенцы сходились в этот бар со всего \r\nсевера – в Anita был единственный на много километров вокруг телефон. <br>\r\n<br>\r\nЗнают ли посетители этого ничем не примечательного со стороны бара о \r\nтом, какую роль он сыграл в популяризации как самого курорта, так и \r\nвсего хиппанского движения на острове?<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/84d5f8.jpg"><br>\r\n<br>\r\nА вокруг — обычные дома и обычные люди.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/963788.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/51e66b.jpg"><br>\r\n<br>\r\nВ районе Сант Карлеса несколько съездов к морю, где можно найти \r\nнебольшие тихие пляжи, в том числе и нудистские. Было решено сделать \r\nостановку. Бирюзовое море кажется таким теплым, но в середине июня здесь\r\n еще достаточно прохладная вода, правда, солнце припекает уже хорошо.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/cc76a7.jpg"><br>\r\n<br>\r\nДалее мы поехали на северо-запад. Дорога пробегает серпантином через \r\nгоры, то и дело открывая виды, ради которых стоило все это затеять. \r\nВидно, что не так давно здесь бушевал пожар, уничтожив немало леса.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/4cc9b3.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/bfce8d.jpg"><br>\r\n<br>\r\nДалее мы поехали на северо-запад. Дорога пробегает серпантином через \r\nгоры, то и дело открывая виды, ради которых стоило все это затеять. \r\nВидно, что не так давно здесь бушевал пожар, уничтожив немало леса.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/860e1c.jpg"><br>\r\n<br>\r\nВозле церкви в тени дерева прогуливается памятник писателю, которого звали Мария Вилангомез Ллогет.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/930fd7.jpg"><br>\r\n<br>\r\nНа улочках города:<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/294eba.jpg"><br>\r\n<br>\r\nПоследняя наша остановка, которая поставила не просто точку в нашей \r\nпоездке, а восклицательный знак — пещеры Сан Марко, находящиеся в порту \r\nСан Мигель. Даже если бы не было никаких пещер и мы просто попали в \r\nокрестности порта, уже можно бы было говорить, что поездка удалась. \r\nЗамечательные виды с утеса.<br>\r\n<br>\r\nПанорама:<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/832a58.jpg"><br>\r\n<br>\r\nВнизу:<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/7954c5.jpg"><br>\r\n<br>\r\nПещере больше ста тысяч лет. Долгое время пираты использовали ее для \r\nконтрабанды. А до недавнего времени местные жители здесь еще что-то \r\nсушили. <br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/40afb8.jpg"><br>\r\n<br>\r\nПещера небольшая, но очень живописная:<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/8155a0.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/355397.jpg"><br>\r\n<br>\r\nОчень хорошая подсветка, показывают даже целое музыкально-световой шоу с\r\n водопадом. Без сомнений, одна из лучших достопримечательностей Ибицы. \r\nНа фотографии снизу, кстати, подсветки нет — настоящая фосфоресценция.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/957640.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/a206dc.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/44d391.jpg"><br>\r\n<br>\r\nСлучайное фото на обратном пути:<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/72369f.jpg"><br>\r\n<br>\r\nБонус-трек. Эти снимки были сделаны тремя днями раньше, место не знаю \r\nкак называется, но подозреваю, что где-то на самом востоке острова.<br>\r\n<br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/20cdbe.jpg"><br>\r\n<img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/18/e5fe7e.jpg"><br>\r\n<br>\r\nАвтор: <a href="http://vartumashvili.livejournal.com/48249.html" rel="nofollow">vartumashvili</a>\r\n            </div>', 3, 11, 0, 0, 0, 'Испания,Греция,фото,путешествия', '', 1, '2012-05-03 06:29:35'),
(4, 'На этой неделе по всей Доминикане пройдет музыкальный Festival de Primavera ', '<a href="http://tezclub.com.ua/blog/Dominicana/100.html#" class="favourite ">\r\n            &nbsp;\r\n        </a>\r\n    \r\n        <div class="content">\r\n                <img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/04/7d6221.jpg"><br>\r\n<br>\r\nДля тех, кто не попал на знаменитый карнавал в Доминикане, на этой \r\nнеделе представится возможность наверстать упущенное. С 6 по 8 апреля \r\nпрактически во всех провинциях страны пройдет грандиозный музыкальный \r\nфестиваль — Festival de Primavera.<br>\r\n</div>', '<a href="http://tezclub.com.ua/blog/Dominicana/100.html#" class="favourite ">\r\n            &nbsp;\r\n        </a>\r\n    \r\n        <div class="content">\r\n                <img src="http://tezclub.com.ua/uploads/images/00/00/06/2012/04/04/7d6221.jpg"><br>\r\n<br>\r\nДля тех, кто не попал на знаменитый карнавал в Доминикане, на этой \r\nнеделе представится возможность наверстать упущенное. С 6 по 8 апреля \r\nпрактически во всех провинциях страны пройдет грандиозный музыкальный \r\nфестиваль — Festival de Primavera.<br>\r\n<br>\r\nВ одно и то же время в разных частях страны выступят самые популярные \r\nисполнители меренге и сальсы, бачаты и реггетона. На бесплатных \r\nконцертах можно будет услышать как современное техно, так и более \r\nтрадиционную тропическую музыку. Среди участников – Omega, Juliana, Alex\r\n Bueno, La India Canela, El Gringo de la Bachata, La Materialista, El \r\nChaval и другие. Всего же в эти дни в 32-х провинциях Доминиканы \r\nсостоятся 45 концертов с участием 150 исполнителей.<br>\r\n<br>\r\nКонцерты запланированы на курорте Кабарете в провинции Пуэрто-Плата, на \r\nпляже Boca Chica в провинции Санто-Доминго, в городе Нагуа в провинции \r\nМария-Тринидад-Санчес, на пляже Pedernales в провинции Педерналес, \r\nкурорте Хуан-Долио в провинции Сан-Педро-де-Макорис, на пляже La Caleta в\r\n провинции Ла-Романа, в Пуэрто-Плата и в других местах.\r\n            </div>', 6, 12, 0, 0, 0, 'Доминикана, новости', '', 1, '2012-05-03 06:30:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
