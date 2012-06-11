<?php 

// Auth Details.
define('USERNAME', 'admin');
define('PASSWORD', 'password');

// путь к livestreet
define('ROOT_DIR', '../../');
define('ROOT_URL', str_replace('bloggers.', '', 'http://'.$_SERVER['HTTP_HOST'].'/') );

// Slim PHP
require 'Slim/Slim.php';
require 'Views/TwigView.php';

// PDO MYSQL Class 
require 'lib/db.php';
require 'config/config.db.php';

// Work Whit images
require 'lib/simpleimage.php';
// More Functions
require 'lib/functions.php';

// Configuration
TwigView::$twigDirectory = __DIR__ . '/vendor/Twig/lib/Twig/';
// включение кэширования шаблонов
//TwigView::$twigOptions = array('cache' => __DIR__ . '/../compilation_cache',);
// Кэширование выкллючено
TwigView::$twigOptions = array('cache' => false,);
