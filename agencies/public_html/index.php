<?php
require '../app/config.php';

// Start Slim.
$app = new Slim(array(
	'view' => new TwigView
));


// Auth Check.
$authCheck = function() use ($app) {
	$authRequest 	= isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
	$authUser 		= $authRequest && $_SERVER['PHP_AUTH_USER'] === USERNAME;
	$authPass 		= $authRequest && $_SERVER['PHP_AUTH_PW'] === PASSWORD;

	if (! $authUser || ! $authPass) {
		$app->response()->header('WWW-Authenticate: Basic realm="My Blog Administration"', '');
		$app->response()->header('HTTP/1.1 401 Unauthorized', '');
		$app->response()->body('<h1>Please enter valid administration credentials</h1>');
		$app->response()->send();
		exit;
	}
};

// frontend
require '../app/routes/main.php';

// backend
require '../app/routes/admin.php';
require '../app/routes/admin.city.php';
require '../app/routes/admin.metro.php';
require '../app/routes/admin.office.php';

// Slim Run.
$app->run();