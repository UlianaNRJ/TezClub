<?php

/* -------------------------------------------------------
 *
 *   LiveStreet (v.0.4.2 and 0.5)
 *   Plugin Ad units (v.1.0.0)
 *   Copyright © 2011 Bishovec Nikolay
 *
 * --------------------------------------------------------
 *
 *   Plugin Page: http://netlanc.net
 *   Contact e-mail: netlanc@yandex.ru
 *   
  ---------------------------------------------------------
 */
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginAdmvote extends Plugin
{

    public $aInherits = array(
	'action' => array('ActionAjax' => '_ActionAjax'),
    );

    public function Activate()
    {
	return true;
    }

    public function Init()
    {
	
    }

}

?>
