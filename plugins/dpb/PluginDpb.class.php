<?php

/* -------------------------------------------------------
 *
 *   LiveStreet (0.5x)
 *   Plugin Disabling personal blogs (v.1.0.0)
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

class PluginDpb extends Plugin
{

    public function Activate()
    {
	return true;
    }

    public function Init()
    {
	
    }

}

?>
