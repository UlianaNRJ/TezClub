<?php
/********************************************
 * Author: Vladimir Linkevich
 * e-mail: Vladimir.Linkevich@gmail.com
 * since 2011-02-25
 ********************************************/

if(!class_exists('Plugin')) {
	die('Hacking attemp!');
}
class PluginAutocut extends Plugin {
	public function Activate() {
		return true;
	}

	public function Init() {
	return true;
	}

	public function Deactivate() {
		return true;
	}
}

?>