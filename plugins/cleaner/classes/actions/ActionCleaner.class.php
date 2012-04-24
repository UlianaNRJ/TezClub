<?php

/* -------------------------------------------------------
 *
 *   LiveStreet (v.0.4.2 and 0.5)
 *   Plugin Cleaner (v.0.1.5)
 *   Copyright © 2011 Bishovec Nikolay
 *
 * --------------------------------------------------------
 *
 *   Plugin Page: http://netlanc.net
 *   Contact e-mail: netlanc@yandex.ru
 *
  ---------------------------------------------------------
 */

class PluginCleaner_ActionCleaner extends ActionPlugin
{

    protected $sMenuItemSelect = 'cleaner';
    protected $oUserCurrent = null;

    public function Init()
    {
	if (!($this->oUserCurrent = $this->User_GetUserCurrent() and $this->oUserCurrent->isAdministrator())) {
	    $this->Message_AddErrorSingle($this->Lang_Get('not_access'), $this->Lang_Get('error'));
	    return Router::Action('error');
	}
    }

    protected function RegisterEvent()
    {
	$this->AddEventPreg('/^settings$/i', '/^clean$/i', 'AjaxCleanerStart');
	$this->AddEventPreg('/^settings$/i', 'EventSettings');
    }

    protected function EventSettings()
    {
	
    }

    protected function AjaxCleanerStart()
    {
	$this->Viewer_SetResponseAjax('json');
	if ($aFile = $this->PluginCleaner_Cleaner_GetCleanerFiles($aFile = array(), Config::Get('path.root.server') . Config::Get('path.uploads.images'))) {
	    $this->PluginCleaner_Cleaner_GetCleanerFilesDB($aFile);
	}
	$this->PluginCleaner_Cleaner_GetCleanerComments();
	$this->Message_AddNoticeSingle($this->Lang_Get('cleaner_attention_ok'), $this->Lang_Get('attention'));
    }

    public function EventShutdown()
    {
	$this->Viewer_Assign('sMenuItemSelect', $this->sMenuItemSelect);
    }

}

?>
