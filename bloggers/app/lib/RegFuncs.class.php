<?php 
class RegFuncs 
{

	/**
	 * Проверяет логин
	 */
	public static function checkLogin($sLogin) {
		global $db;
		if (!preg_match("/^[\da-z\_\-]{3,30}$/i",$sLogin)) {
			return "Неверный логин, допустим от 3 до 30 символов.";
		}
		elseif ($db->dbFetchObject("SELECT * FROM tc_user WHERE user_login = '" . $sLogin . "'")) {
			return "Этот логин уже занят.";
		}
		return true;
	}

	/**
	 * Проверяет email
	 */
	public static function checkEmail($sEmail) {
		global $db;
		if (!preg_match("/^[\da-z\_\-\.\+]+@[\da-z_\-\.]+\.[a-z]{2,5}$/i",$sEmail)) {
			return "Неверный формат e-mail.";
		}
		elseif ($db->dbFetchObject("SELECT * FROM tc_user WHERE user_mail = '" . $sEmail . "'")) {
			return "Этот e-mail уже занят.";
		}
		return true;
	}

	/**
	 * Проверяет пароль
	 */
	public static function checkPassword($sPassword,$sRepeat) {
		if (strlen($sPassword) < 5) {
			return "Неверный пароль, допустим от 5 символов.";
		}
		elseif ($sPassword !== $sRepeat) {
			return "Пароли не совпадают.";
		}
		return true;
	}

	/**
	 * Проверяет капчу
	 */
	public static function checkCaptcha($sCaptcha) {
		if ( (empty($sCaptcha) || empty($_COOKIE['captcha_keystring']) || $sCaptcha !== $_COOKIE['captcha_keystring']) && empty($_SESSION['captcha_success'])) {
    		return "Неправильно ввели текст с картинки.";
    	}
		return true;
	}

	/**
	 * Проверяет имя
	 */
	public static function checkName($sName) {
		if ( empty($sName) ) {
    		return "Введите имя.";
    	}
		return true;
	}

	/**
	 * Проверяет имя
	 */
	public static function checkAvatar() {
		if ( isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != '' ) {

	        $_FILES["image"]["tmp_name"];

	        $img = "/../../../upload/images/" . time() . $_FILES["image"]["name"];
	        move_uploaded_file($_FILES["image"]["tmp_name"], $img );

	        $image = new SimpleImage();
	        // делаем аватар
	        $image->load($img);
	        $image->resize(100, 100);
	        $image->save('avatar_100x100');

	        //$_SESSION["avatar"] = $avatar;
	        $_SESSION["photo"] = $img;
	    }
	    else {
	    	return "Загрузите вашу фотографию.";
	    }
		return true;
	}

	/**
	 * Проверяет дату рождения
	 */
	public static function checkBirthdate($d,$m,$y) {
		if ( empty($d) || empty($m) || empty($y) ) {
    		return "Введите дату рождения.";
    	}
		return true;
	}

	/**
	 * Проверяет Местоположения
	 */
	public static function checkPlace($country,$city) {
		if ( empty($country) ) {
    		return "Выберите страну.";
    	}
    	elseif ( empty($city) ) {
    		return "Выберите город.";
    	}
		return true;
	}

	/**
	 * Проверяет блоги
	 */
	public static function checkBlogs($b_lj,$b_blogger,$b_other) {
		if ( empty($b_lj) && empty($b_blogger) && empty($b_other) ) {
    		return "Введите хотябы один блог.";
    	}
		return true;
	}

	/**
	 * Проверяет блоги
	 */
	public static function checkAbout($about) {
		if ( empty($about) ) {
    		return "Напишите что-то о себе.";
    	}
		return true;
	}

	public static function clearSessionData() {
		//unset();
	}

	public static function registerUser() {
		/*
		$ip = $_SERVER['REMOTE_ADDR'];
		$db->dbQuery("INSERT INTO tc_user
						(user_login, user_password, user_mail, user_date_register, user_ip_register, user_activate, user_activate_key)
						VALUES(". $_SESSION['login'] ",". $_SESSION['password'] .",". $_SESSION['email'] ."	?,	?,	?,	?,	?)");
						*/
	}
}
