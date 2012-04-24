<?php
/*-------------------------------------------------------
*
*   LiveStreet (v.0.4.2 and 0.5)
*   Plugin Cleaner (v.0.1.5)
*   Copyright © 2011 Bishovec Nikolay
*
*--------------------------------------------------------
*
*   Plugin Page: http://netlanc.net
*   Contact e-mail: netlanc@yandex.ru
*
---------------------------------------------------------
*/
define('SYS_HACKER_CONSOLE',false);
require_once(dirname(dirname(dirname(__FILE__))).'/config/loader.php');
require_once(Config::Get('path.root.engine')."/classes/Engine.class.php");
$oEngine=Engine::getInstance();
$oEngine->Init();

if ($aFile=$oEngine->PluginCleaner_Cleaner_GetCleanerFiles($aFile=array(),Config::Get('path.root.server').Config::Get('path.uploads.images'))){
  $oEngine->PluginCleaner_Cleaner_GetCleanerFilesDB($aFile);
}
$oEngine->PluginCleaner_Cleaner_GetCleanerComments();

?>
