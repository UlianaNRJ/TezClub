<?php

//error_reporting (E_ALL);

/* Using:

	<?php
	session_start();
	?>
	<form action="./" method="post">
	<p>Enter text shown below:</p>
	<p><img src="PATH-TO-THIS-SCRIPT?<?php echo session_name()?>=<?php echo session_id()?>"></p>
	<p><input type="text" name="keystring"></p>
	<p><input type="submit" value="Check"></p>
	</form>
	<?php
	if(count($_POST)>0){
		if(isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] ==  $_POST['keystring']){
			echo "Correct";
		}else{
			echo "Wrong";
		}
	}
	unset($_SESSION['captcha_keystring']);
	?>

*/

include('kcaptcha.php');

session_start();
/*
foreach ($_REQUEST as $key => $value) {
	if (preg_match("/^[\w\d]{5,40}$/",$value)) {
		session_name($key);
		session_start();
		break;
	}
}
*/

$captcha = new KCAPTCHA();

setcookie('captcha_keystring',$captcha->getKeyString())


?>