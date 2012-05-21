<?php
// registration page

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

	// выбираем отображаемый шаг
    switch ($login = $app->request()->params('step')) {
    	case 1:
    		if (Registration::isStepEnabled(1)) {
              $step = 1;
            }
            elseif (Registration::isStepEnabled(2)) {
                $step = 2;
            }
            else {
                $step = 3;
            }
    		break;
    	case 2:
    		if (Registration::isStepEnabled(2)) {
              $step = 2;
            }
            elseif (Registration::isStepEnabled(1)) {
                $step = 1;
            }
            else {
                $step = 3;
            }
    		break;
    	case 3:
        default:
            if (Registration::isStepEnabled(3)) {
              $step = 3;
            }
            elseif (Registration::isStepEnabled(2)) {
                $step = 2;
            }
            else {
                $step = 1;
            }
    }

    // загружаем страны и города
    if ($step == 2) {
    	$app->view()->setData( 'base_countries', getCountries() );
        if (!empty($_SESSION['country']))
            $app->view()->setData( 'base_cities', getCities($_SESSION['country']) );
    }

    return $app->render('front/reg_step'.$step.'.twig', Registration::data());
});


$app->post('/registration', function() use ($app, $db) {

    $step = 1;

    switch ($app->request()->params('step')) {
    	case 1:
            // обработка шага 1
    		Registration::login($app->request()->params('login'));
    		Registration::email($app->request()->params('email'));
    		Registration::password($app->request()->params('password'),$app->request()->params('repeat'));
    		Registration::captcha($app->request()->params('captcha'));

			// если нет ошибок переходим ко второму шагу
            if (count(Registration::$errors)) {
                $step = 1;
                $_SESSION['step1_done'] = false;
            }
            else {
                $step = 2;
                $_SESSION['step1_done'] = true;
            }
    		break;

    	case 2:
            // обработка шага 2
            Registration::firstName($app->request()->params('first_name'));
            Registration::lastName($app->request()->params('last_name'));
            Registration::sex($app->request()->params('sex'));
            Registration::birthdate($app->request()->params('birthdate_day'), $app->request()->params('birthdate_month'), $app->request()->params('birthdate_year'));
            Registration::place($app->request()->params('country'), $app->request()->params('city'));
            Registration::blogs($app->request()->params('blog_lj'), $app->request()->params('blog_blogger'), $app->request()->params('blog_other'));
            Registration::about($app->request()->params('about'));
            Registration::avatar($_FILES["avatar"]);

            // если нет ошибок переходим к третьему шагу
            if (count(Registration::$errors)) {
                $step = 2;
                $_SESSION['step2_done'] = false;
            }
            else {
                $step = 3;
                $_SESSION['step2_done'] = true;
            }
    		break;

    	case 3:
            // обработка шага 3
            Registration::addUser();
            $app->redirect('http://tezclub.local/login/');
    		break;
    }

    // загружаем страны
    if ($step == 2) {
        $app->view()->setData( 'base_countries', getCountries() );
        if (!empty($_SESSION['country']))
            $app->view()->setData( 'base_cities', getCities($_SESSION['country']) );
    }

    return $app->render('front/reg_step'.$step.'.twig', Registration::data());
});

