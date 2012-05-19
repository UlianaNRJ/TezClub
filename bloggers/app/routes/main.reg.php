<?php
// registration page

// собираем данные для передачи в шаблон
function combineData() {
	
	$data = array();

	$data['login']           = empty($_SESSION['login']) ? '' : $_SESSION['login'];
	$data['email']           = empty($_SESSION['email']) ? '' : $_SESSION['email'];
	$data['password']        = empty($_SESSION['password']) ? '' : $_SESSION['password'];
	$data['captcha_success'] = empty($_SESSION['captcha_success']) ? false : $_SESSION['captcha_success'];

    $data['first_name']      = empty($_SESSION['first_name']) ? '' : $_SESSION['first_name'];
    $data['last_name']       = empty($_SESSION['last_name']) ? '' : $_SESSION['last_name'];
    $data['sex']             = empty($_SESSION['sex']) ? '' : $_SESSION['sex'];
    $data['birthdate_day']   = empty($_SESSION['birthdate_day']) ? '' : $_SESSION['birthdate_day'];
    $data['birthdate_month'] = empty($_SESSION['birthdate_month']) ? '' : $_SESSION['birthdate_month'];
    $data['birthdate_year']  = empty($_SESSION['birthdate_year']) ? '' : $_SESSION['birthdate_year'];
    $data['country']         = empty($_SESSION['country']) ? '' : $_SESSION['country'];
    $data['city']            = empty($_SESSION['city']) ? '' : $_SESSION['city'];
    $data['blog_lj']         = empty($_SESSION['blog_lj']) ? '' : $_SESSION['blog_lj'];
    $data['blog_blogger']    = empty($_SESSION['blog_blogger']) ? '' : $_SESSION['blog_blogger'];
    $data['blog_other']      = empty($_SESSION['blog_other']) ? '' : $_SESSION['blog_other'];
    $data['about']           = empty($_SESSION['about']) ? '' : $_SESSION['about'];

	return $data;
}

function getCountries() {
    global $db;

    return $db->dbFetchAll("SELECT id_country, country_name_ru as country_name FROM base_countries");
}

function getCities($country) {
    global $db;

    return $db->dbFetchAll("SELECT id_city, city_name_ru as city_name FROM base_cities 
                            JOIN base_countries ON (base_cities.id_country = base_countries.id_country) 
                            WHERE base_countries.country_name_ru='".$country."' ORDER BY city_name");
}

$app->get('/registration', function() use ($app, $db) {

    // AJAX выводим список городов для страны
	if ($app->request()->isAjax()) {
        $base_cities = getCities($app->request()->params("country"));
        $out = '';
        foreach ($base_cities as $key => $city) {
            $out .= "<option value='".$city['city_name']."'>".$city['city_name']."</option>";
        }
		echo $out;
		return;
	}

	$step = 1;

    $user = $app->view()->getData( 'userCurrent' );

    switch ($login = $app->request()->params('step')) {
    	case 1:
    		$step = 1;
    		break;
    	case 2:
    		$step = 2;
    		break;
    	case 3:
    		$step = 3;
    		break;
    	default:
    		$step = empty($user) ? 1 : 2;
    }

    // загружаем страны и города
    if ($step == 2) {
    	$app->view()->setData( 'base_countries', getCountries() );
        if (!empty($_SESSION['country']))
            $app->view()->setData( 'base_cities', getCities($_SESSION['country']) );
    }

    return $app->render('front/reg_step'.$step.'.twig', combineData());
});


$app->post('/registration', function() use ($app, $db) {

    $step = 1;

    $errorMsg = array();

    switch ($app->request()->params('step')) {
    	case 1:
    		// получаем данные формы
    		$login = $app->request()->params('login');
    		$email = $app->request()->params('email');
    		$password = $app->request()->params('password');
    		$repeat = $app->request()->params('repeat');
    		$captcha = $app->request()->params('captcha');

    		// проверка полей
    		$checkLogin = RegFuncs::checkLogin($login);
    		$checkEmail = RegFuncs::checkEmail($email);
    		$checkPassword = RegFuncs::checkPassword($password, $repeat);
    		$checkCaptcha = RegFuncs::checkCaptcha($captcha);

    		// добавляем сообщения об ошибках
			if ($checkLogin !== true)
				$errorMsg[] = $checkLogin;
			if ($checkEmail !== true)
				$errorMsg[] = $checkEmail;
			if ($checkPassword !== true)
				$errorMsg[] = $checkPassword;
			if ($checkCaptcha !== true)
				$errorMsg[] = $checkCaptcha;

			// сохраняем переменные
			$_SESSION['login'] = $login;
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $checkPassword === true ? $password : '';
			$_SESSION['captcha_success'] = $checkCaptcha === true ? true : false;

			// если нет ошибок переходим ко второму шагу
    		if (!count($errorMsg)) {
    			$step = 2;
    		}
    		break;

    	case 2:
            // получаем данные формы
    		$first_name = $app->request()->params('first_name');
    		$last_name = $app->request()->params('last_name');
            $sex = $app->request()->params('sex');
            $birthdate_day = $app->request()->params('birthdate_day');
            $birthdate_month = $app->request()->params('birthdate_month');
            $birthdate_year = $app->request()->params('birthdate_year');
            $country = $app->request()->params('country');
            $city = $app->request()->params('city');
            $blog_lj = $app->request()->params('blog_lj');
            $blog_blogger = $app->request()->params('blog_blogger');
            $blog_other = $app->request()->params('blog_other');
    		$about = $app->request()->params('about');

            // проверка полей
            $checkName = RegFuncs::checkName($first_name);
            $checkBirthdate = RegFuncs::checkBirthdate($birthdate_day, $birthdate_month, $birthdate_year);
            $checkPlace = RegFuncs::checkPlace($country, $city);
            $checkBlogs = RegFuncs::checkBlogs($blog_lj, $blog_blogger, $blog_other);
            $checkAbout = RegFuncs::checkAbout($about);

            // добавляем сообщения об ошибках
            if ($checkName !== true)
                $errorMsg[] = $checkName;
            if ($checkBirthdate !== true)
                $errorMsg[] = $checkBirthdate;
            if ($checkPlace !== true)
                $errorMsg[] = $checkPlace;
            if ($checkBlogs !== true)
                $errorMsg[] = $checkBlogs;
            if ($checkAbout !== true)
                $errorMsg[] = $checkAbout;

            // сохраняем переменные
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['sex'] = $sex;
            $_SESSION['birthdate_day'] = $birthdate_day;
            $_SESSION['birthdate_month'] = $birthdate_month;
            $_SESSION['birthdate_year'] = $birthdate_year;
            $_SESSION['country'] = $country;
            $_SESSION['city'] = $city;
            $_SESSION['blog_lj'] = $blog_lj;
            $_SESSION['blog_blogger'] = $blog_blogger;
            $_SESSION['blog_other'] = $blog_other;
            $_SESSION['about'] = $about;

            // если нет ошибок переходим к третьему шагу
            $step = count($errorMsg) ? 2 : 3;
    		break;

    	case 3:
    		break;
    }

    if (count($errorMsg)) {
    	$app->view()->setData( 'errorMsg', $errorMsg );
    }

    // загружаем страны
    if ($step == 2) {
        $app->view()->setData( 'base_countries', getCountries() );
        if (!empty($_SESSION['country']))
            $app->view()->setData( 'base_cities', getCities($_SESSION['country']) );
    }

    return $app->render('front/reg_step'.$step.'.twig', combineData());
});

