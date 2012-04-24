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

class PluginCleaner_HookCleaner extends Hook
{

    public function RegisterHook()
    {

	$this->AddHook('init_action', 'InitAction', __CLASS__);

	if (($oUserCurrent = $this->User_GetUserCurrent() and $oUserCurrent->isAdministrator())) {
	    $this->AddHook('template_menu_settings', 'MenuSettingsTpl', __CLASS__);
	}
    }

    public function InitAction()
    {
	if (Router::GetAction() == 'settings' and Router::GetActionEvent() == 'cleaner') {
	    Router::Action('cleaner_settings', 'settings');
	}
    }

    public function MenuSettingsTpl()
    {
	return $this->Viewer_Fetch(Plugin::GetTemplatePath('cleaner') . 'menu.setting.item.tpl');
    }

}

?>
