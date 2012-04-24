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

class PluginExtcity_HookExtcity extends Hook {
	public function RegisterHook() {
        $this->AddHook('template_extcity_register', 'city_registration',__CLASS__,-3);
        //$this->AddDelegateHook('module_user_update_after','update',__CLASS__,-2);
        //$this->AddDelegateHook('module_user_add_after','add',__CLASS__,-2);
	}
    
    public function city_registration() {
        
            
        $country=(func_check(getRequest('profile_country'),'text',1,30))?getRequest('profile_country'):'';
		$this->aCountryList=$this->User_GetCountryList(0,$country);
		$this->Viewer_Assign('aCountryList',$this->aCountryList);
        
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__).'inject_city_registration.tpl');
    }


}
?>