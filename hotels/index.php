<?php
require 'app/config.php';

// Start Slim.
$app = new Slim(array(
	'view' => new TwigView
));
//Get the Request root URI
$rootUri = $app->request()->getRootUri();

//Get the Request resource URI
$resourceUri = $app->request()->getResourceUri();

/*print_r($app->request()->getRootUri());
echo "<br>";
print_r($app->request()->getResourceUri());
*/

$app->view()->setData('siteurl', 'http://'.$_SERVER["SERVER_NAME"] );
//$app->view()->setData('hotelssiteurl', HOTELS_WEB_DIR );

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

// проверяем автологин пользователя
if (!empty($_COOKIE['key'])){
	// получаем пользователя
	$result = Model::factory('TcSession')
				->where('session_key', $_COOKIE['key'])
				->find_one();

	if ( $result ) {
		$user = Model::factory('TcUser')->where('user_id', $result->user_id)->find_one();
		if ($user) {
			// подменяем аватарку
			$user->user_profile_avatar = str_replace('100x100', '48x48', $user->user_profile_avatar);

			$app->view()->setData('userCurrent', $user );
			// session_security_key
			if (!empty($_COOKIE['tezclub'])) {
				$app->view()->setData('security_ls_key', md5($_COOKIE['tezclub'].'livestreet_security_key'));
			}

			// количество новых сообщений 
			$iUserCurrentCountTalkNew = Model::factory('TcTalkUser')
						->where('user_id', $user->user_id)
						->where('date_last', NULL)
						->where('talk_user_active', 1)
						->count();
			$app->view()->setData( 'iUserCurrentCountTalkNew', $iUserCurrentCountTalkNew);
		}
	}


}

// frontend
require 'app/routes/main.php';
// backend
require 'app/routes/admin.php';
require 'app/routes/admin.topic.php';
require 'app/routes/admin.hotel.php';
require 'app/routes/admin.blogger.php';


// Slim Run.
$app->run();