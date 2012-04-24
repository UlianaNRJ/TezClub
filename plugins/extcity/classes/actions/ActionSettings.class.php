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

class PluginExtcity_ActionSettings extends PluginExtcity_Inherit_ActionSettings {

    /**
	 * Инициализация
	 *
	 * @return unknown
	 */
	public function Init() {
		parent::Init();
		$country=(func_check(getRequest('profile_country'),'text',1,30))?getRequest('profile_country'):$this->oUserCurrent?$this->oUserCurrent->getProfileCountry():'';
		$this->aCountryList=$this->User_GetCountryList(0,$country);
		$this->Viewer_Assign('aCountryList',$this->aCountryList);

	}
}
?>