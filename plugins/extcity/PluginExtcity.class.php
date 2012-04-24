<?php
/*-------------------------------------------------------
*
*	Plugin "Extcity"
*	Author: Vladimir Yuriev (extravert)
*	Site: lsmods.ru
*	Contact e-mail: support@lsmods.ru
*
---------------------------------------------------------
*/

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
	die('Hacking attemp!');
}

class PluginExtcity extends Plugin {

	
	protected $aInherits=array(
	   'action'=>array('ActionSettings','ActionAjax'),
       'module'=>array('ModuleUser'),
       'mapper'=>array('ModuleUser_MapperUser'),
    );

    protected $aDelegates=array(
        'template'=>array(
            'actions/ActionSettings/profile.tpl'=>'_actions/ActionSettings/profile.tpl',
        ),
    );
	
	public function Activate() {
        $this->ExportSQL(dirname(__FILE__).'/country_list.sql');
		return true;
	}
	/**
	 * Init plugin
	 */
	public function Init() {
        $this->Viewer_AppendScript(Plugin::GetTemplateWebPath(__CLASS__).'js/city.js');
	}
}
?>