<?php 

// Auth Details.
define('USERNAME', 'admin');
define('PASSWORD', 'password');

// Slim PHP
require 'Slim/Slim.php';
require 'Views/TwigView.php';

// Paris and Idiorm
require 'vendor/Paris/idiorm.php';
require 'vendor/Paris/paris.php';

// Models
require 'lib/SprBlogger.php';
require 'lib/SprTopic.php';
require 'lib/SprHotel.php';

// Work Whit images
require 'lib/simpleimage.php';


// Configuration
TwigView::$twigDirectory = __DIR__ . '/vendor/Twig/lib/Twig/';

ORM::configure('mysql:host=localhost;dbname=betatezclub;charset=UTF8');
ORM::configure('username', 'root');
ORM::configure('password', '');

ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));