<?php 
class Registration
{

	public static $errors = array();

	public static function data() {
		global $user;
		$data = array();
		
		// если пользователь зарегестрирован, то берем его данные
		if (self::isRegistered()) {
			if (!isset($_SESSION['first_name']) && isset($user->user_profile_name))
				$_SESSION['first_name'] = $user->user_profile_name;
			if (!isset($_SESSION['last_name']) && isset($user->last_name))
				$_SESSION['last_name'] = $user->last_name;
			if (!isset($_SESSION['sex']) && isset($user->user_profile_sex))
				$_SESSION['sex'] = $user->user_profile_sex;
			if (!isset($_SESSION['birthdate_day']) && isset($user->user_profile_birthday)) {
				$tmp = date_parse($user->user_profile_birthday);
				$_SESSION['birthdate_day'] = $tmp["day"];
			}
			if (!isset($_SESSION['birthdate_month']) && isset($user->user_profile_birthday)) {
				$tmp = date_parse($user->user_profile_birthday);
				$_SESSION['birthdate_month'] = $tmp["month"];
			}
			if (!isset($_SESSION['birthdate_year']) && isset($user->user_profile_birthday)) {
				$tmp = date_parse($user->user_profile_birthday);
				$_SESSION['birthdate_year'] = $tmp["year"];
			}
			if (!isset($_SESSION['avatar']) && isset($user->user_profile_avatar))
				$_SESSION['avatar'] = $user->user_profile_avatar;
			if (!isset($_SESSION['country']) && isset($user->user_profile_country))
				$_SESSION['country'] = $user->user_profile_country;
			if (!isset($_SESSION['city']) && isset($user->user_profile_city))
				$_SESSION['city'] = $user->user_profile_city;
			if (!isset($_SESSION['about']) && isset($user->user_profile_about))
				$_SESSION['about'] = $user->user_profile_about;
		}
		
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

	    $data['errorMsg']        = self::$errors;

	    $data['step1_enabled']   = self::isStepEnabled(1);
	    $data['step2_enabled']   = self::isStepEnabled(2);
	    $data['step3_enabled']   = self::isStepEnabled(3);

		return $data;
	}

	// может ли пользователь просматривать конкретный шаг
	public static function isStepEnabled($step) {
		switch ($step) {
			case 1:
				return !self::isRegistered() ? true : false;
				break;
			case 2:
				return ( !self::isParticipating() && (!empty($_SESSION['step1_done']) || self::isRegistered() ) ) ? true : false;
				break;
			case 3:
				return ( self::isParticipating() || (!empty($_SESSION['step2_done']) && (self::isRegistered() || !empty($_SESSION['step1_done']))) ) ? true : false;
				break;
			
			default:
				return false;
		}
	}

	// возвращает true если пользователь уже зарегистрирован и вошел
	public static function isRegistered() {
		global $user;
		return !empty($user) ? true : false;
	}

	// возвращает true если пользователь уже ечаствует в кокурсе
	public static function isParticipating() {
		global $user;
		return (!empty($user) && !empty($user->participate)) ? true : false;
	}

	public static function login($login = null) {
		if ($login !== null)
		{
			global $db;
			if (!preg_match("/^[\da-z\_\-]{3,30}$/i",$login)) {
				self::$errors[] = "Неверный логин, допустим от 3 до 30 символов.";
			}
			elseif ($db->dbFetchObject("SELECT * FROM tc_user WHERE user_login = '" . $login . "'")) {
				self::$errors[] = "Этот логин уже занят.";
			}
			$_SESSION['login'] = $login;
		}
		return $_SESSION['login'];
	}

	public static function email($email = null) {
		if ($email !== null)
		{
			global $db;
			if (!preg_match("/^[\da-z\_\-\.\+]+@[\da-z_\-\.]+\.[a-z]{2,5}$/i",$email)) {
				self::$errors[] = "Неверный формат e-mail.";
			}
			elseif ($db->dbFetchObject("SELECT * FROM tc_user WHERE user_mail = '" . $email . "'")) {
				self::$errors[] = "Этот e-mail уже занят.";
			}
			$_SESSION['email'] = $email;
		}
		return $_SESSION['email'];
	}

	public static function password($password = null, $repeat = null) {
		if ($password !== null && $repeat !== null)
		{
			if (strlen($password) < 5) {
				self::$errors[] = "Неверный пароль, допустим от 5 символов.";
				$_SESSION['password'] = '';
			}
			elseif ($password !== $repeat) {
				self::$errors[] = "Пароли не совпадают.";
				$_SESSION['password'] = '';
			}
			else {
				$_SESSION['password'] = $password;
			}
		}
		return $_SESSION['password'];
	}

	public static function captcha($captcha = null) {
		if ($captcha !== null)
		{
			if ( (empty($captcha) || empty($_COOKIE['captcha_keystring']) || $captcha !== $_COOKIE['captcha_keystring']) && empty($_SESSION['captcha_success'])) {
	    		self::$errors[] = "Неправильно ввели текст с картинки.";
	    		$_SESSION['captcha_success'] = false;
	    	}
	    	else {
	    		$_SESSION['captcha_success'] = true;
	    	}
    	}
		return $_SESSION['captcha_success'];
	}

	public static function firstName($first_name = null) {
		if ($first_name !== null)
		{
			if ( empty($first_name) ) {
	    		self::$errors[] = "Введите имя.";
	    	}
	    	$_SESSION['first_name'] = $first_name;
	    }
		return $_SESSION['first_name'];
	}

	public static function lastName($last_name = null) {
		if ($last_name !== null)
		{
			$_SESSION['last_name'] = $last_name;
		}
		return $_SESSION['last_name'];
	}

	public static function sex($sex = null) {
		if ($sex !== null)
		{
			$_SESSION['sex'] = $sex;
		}
		return $_SESSION['sex'];
	}

	public static function birthdate($d = null,$m = null,$y = null) {
		if ($d !== null && $m !== null && $y !== null)
		{
			if ( empty($d) || empty($m) || empty($y) ) {
	    		self::$errors[] = "Введите дату рождения.";
	    	}
	    	$_SESSION['birthdate_day'] = $d;
	        $_SESSION['birthdate_month'] = $m;
	        $_SESSION['birthdate_year'] = $y;
    	}
		return array('birthdate_day'=>$_SESSION['birthdate_day'], 'birthdate_month'=>$_SESSION['birthdate_month'], 'birthdate_year'=>$_SESSION['birthdate_year']);
	}

	public static function place($country = null, $city = null) {
		if ($country !== null && $city !== null)
		{
			if ( empty($country) ) {
	    		self::$errors[] = "Выберите страну.";
	    	}
	    	elseif ( empty($city) ) {
	    		self::$errors[] = "Выберите город.";
	    	}
	    	$_SESSION['country'] = $country;
            $_SESSION['city'] = $city;
	    }
		return array('country'=>$_SESSION['country'], 'city'=>$_SESSION['city']);
	}

	public static function blogs($blog_lj = null, $blog_blogger = null, $blog_other = null) {
		if ($blog_lj !== null && $blog_blogger !== null && $blog_other !== null)
		{
			if ( empty($blog_lj) && empty($blog_blogger) && empty($blog_other) ) {
	    		self::$errors[] = "Введите хотябы один блог.";
	    	}
	    	$_SESSION['blog_lj'] = $blog_lj;
	        $_SESSION['blog_blogger'] = $blog_blogger;
	        $_SESSION['blog_other'] = $blog_other;
    	}
		return array('blog_lj'=>$_SESSION['blog_lj'], 'blog_blogger'=>$_SESSION['blog_blogger'], 'blog_other'=>$_SESSION['blog_other']);
	}

	public static function about($about = null) {
		if ($about !== null)
		{
			if ( empty($about) ) {
	    		self::$errors[] = "Напишите что-то о себе.";
	    	}
	    	$_SESSION['about'] = $about;
    	}
    	if (!isset($_SESSION["about"]))
	    	$_SESSION["about"] = '';
		return $_SESSION['about'];
	}

	// временно сохраняем картинку что бы потом сделать аватарку
	public static function avatar($file = null) {
		if ( isset($file) && is_uploaded_file($file["tmp_name"]) ) {

			// удаляем старую
			if (!empty($_SESSION["avatar_tmp"])) {
				unlink($_SESSION["avatar_tmp"]);
				unset($_SESSION["avatar_tmp"]);
			}

	        //$uploadPath = BASE_DIR."../upload/images/";
	        $tmpPath = ROOT_DIR . "tmp/";

	        $tmpImg = $tmpPath . substr(md5(uniqid(mt_rand(),true)),0,10);
	        move_uploaded_file($_FILES["avatar"]["tmp_name"], $tmpImg );
	        /*
	        $image = new SimpleImage();
	        // делаем аватар
	        $image->load($img);
	        $image->resize(100, 100);
	        $image->save('avatar_100x100');
			*/
	        //$_SESSION["avatar"] = $avatar;
	        $_SESSION["avatar_tmp"] = $tmpImg;
	    }
	    elseif ( empty($_SESSION["avatar"]) && empty($_SESSION["avatar_tmp"]) ) {
	    	self::$errors[] = "Загрузите аватар.";
	    }
	    if (!isset($_SESSION["avatar_tmp"]))
	    	$_SESSION["avatar_tmp"] = '';
		return $_SESSION["avatar_tmp"];
	}

	// Создаёт каталог по полному пути
	private static function func_mkdir($sBasePath,$sNewDir) {
		$sBasePath=rtrim($sBasePath,'/');
		$sBasePath.='/';
		$sTempPath=$sBasePath;
		$aNewDir=explode('/',$sNewDir);
		foreach ($aNewDir as $sDir) {
			if ($sDir!='.' and $sDir!='' and $sDir!='..') {
				if (!file_exists($sTempPath.$sDir.'/'))	{
					@mkdir($sTempPath.$sDir.'/');
					@chmod($sTempPath.$sDir.'/',0755);
				}
				$sTempPath=$sTempPath.$sDir.'/';
			}
		}   	
	}

	// создаем аватарку из временного файла
	private static function createAvatar($userId) {
		if (!empty($_SESSION["avatar_tmp"])) {
			// размеры
			$sizes = array(0,100,64,48,24);
			$images_dir = ROOT_DIR.'uploads/images/';
			$path = preg_replace('~(.{2})~U', "\\1/", str_pad($userId, 6, "0", STR_PAD_LEFT)).date('Y/m/d');
			// удаляем старые
			if (!empty($_SESSION["avatar"])) {
				foreach ($sizes as $value) {
					$img_old = str_replace(array('_100x100', ROOT_URL),array( (($value==0)?"":"_{$value}x{$value}") , ROOT_DIR ),$_SESSION["avatar"]);
					try {
						unlink($img_old);
					} catch (Exception $e) {
					}
				}
			}
			$image = new SimpleImage();
			$image->load($_SESSION["avatar_tmp"]);
			$image->cropSquare();
			foreach ($sizes as $value) {
				$img_new = $images_dir.$path.'/avatar' . (($value==0)?"":"_{$value}x{$value}") . '.jpg';
				if ($value!=0) {
					$image->resize($value,$value);
				}
				self::func_mkdir($images_dir,$path);
				$image->save($img_new);
			}
			$_SESSION["avatar"] = ROOT_URL.'uploads/images/'.$path.'/avatar_100x100.jpg';
			
		}
		return isset($_SESSION["avatar"]) ? $_SESSION["avatar"] : '';
	}

	public static function clearData() {
		unset($_SESSION['login']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['captcha_success']);
		unset($_SESSION['first_name']);
		unset($_SESSION['last_name']);
		unset($_SESSION['sex']);
		unset($_SESSION['birthdate_day']);
		unset($_SESSION['birthdate_month']);
		unset($_SESSION['birthdate_year']);
		unset($_SESSION['country']);
		unset($_SESSION['city']);
		unset($_SESSION['blog_lj']);
		unset($_SESSION['blog_blogger']);
		unset($_SESSION['blog_other']);
		unset($_SESSION['about']);
		unset($_SESSION['step1_done']);
		unset($_SESSION['step2_done']);
		if (!empty($_SESSION["avatar_tmp"]))
			unlink($_SESSION["avatar_tmp"]);
		unset($_SESSION["avatar_tmp"]);
		unset($_SESSION["avatar"]);
	}

	public static function addUser() {
		global $user;
		global $db;

		// если пользователь уже участвует - ничего не делаем
		if (self::isParticipating())
			return;

		$ip 			= $_SERVER['REMOTE_ADDR'];
		$date 			= date("Y-m-d H:i:s");
		$login 			= self::login();
		$password 		= self::password();
		$email 			= self::email();
		$sex 			= self::sex();
		$first_name 	= self::firstName();
		$last_name 		= self::lastName();
		$birthdate 		= self::birthdate();
		$birthdate 		= date("Y-m-d H:i:s",mktime(0,0,0,$birthdate['birthdate_month'],$birthdate['birthdate_day'],$birthdate['birthdate_year']));
		$place 			= self::place();
		$country 		= $place['country'];
		$city 			= $place['city'];
		$blogs			= self::blogs();
		$blog_lj 		= $blogs['blog_lj'];
		$blog_blogger 	= $blogs['blog_blogger'];
		$blog_other 	= $blogs['blog_other'];
		$about 			= self::about();
		$avatar 		= '';

		// если пользователь не зарегестрирован
		if (!self::isRegistered()) {
			$db->dbQuery("INSERT INTO tc_user
							(user_login, user_password, user_mail, user_date_register, user_ip_register, user_activate, user_activate_key,
							user_profile_name, user_profile_sex, user_profile_country, user_profile_city, user_profile_about,
							user_profile_birthday, user_profile_date)
							VALUES('". $login ."','". md5($password) ."','". $email ."','". $date ."','". $ip ."', 1, '',
							'". $first_name . "','". $sex . "','". $country ."','". $city ."','". $about. "',
							'". $birthdate . "','". $date ."')");
			$id = $db->dblastInsertId();
			$avatar = self::createAvatar($id);
			$db->dbQuery("UPDATE tc_user SET
							user_profile_avatar = '". $avatar ."'
							WHERE user_id = ". $id);
			$db->dbQuery("INSERT INTO users_ext
							(id, last_name, blog_lj, blog_blogger, blog_other, participate)
							VALUES(". $id .",'". $last_name ."','". $blog_lj ."','". $blog_blogger ."','". $blog_other ."', 1)");
		}
		// если пользователь зарегестрирован
		else {
			$avatar = self::createAvatar($user->user_id);
			$db->dbQuery("UPDATE tc_user SET
							user_profile_name = '". $first_name . "',
							user_profile_sex = '". $sex . "',
							user_profile_country = '". $country ."',
							user_profile_city = '". $city ."',
							user_profile_about = '". $about. "',
							user_profile_avatar = '". $avatar ."',
							user_profile_birthday = '". $birthdate ."',
							user_profile_date = '". $date ."'
							WHERE user_id = ". $user->user_id);
			echo "REPLACE INTO users_ext SET
							user_id = ". $user->user_id .",
							last_name = '". $last_name ."',
							blog_lj = '". $blog_lj ."',
							blog_blogger = '". $blog_blogger ."',
							blog_other = '". $blog_other ."', 
							participate = 1";
			$db->dbQuery("REPLACE INTO users_ext SET
							id = ". $user->user_id .",
							last_name = '". $last_name ."',
							blog_lj = '". $blog_lj ."',
							blog_blogger = '". $blog_blogger ."',
							blog_other = '". $blog_other ."', 
							participate = 1");
		}
						
		self::clearData();
	}
}
