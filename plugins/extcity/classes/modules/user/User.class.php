<?php
/*-------------------------------------------------------
*
*	Plugin Extcity
*	Author: Vladimir Yuriev ( extravert )
*	Contact e-mail: support@lsmods.ru
*	Site: http://lsmods.ru
*
*/
class PluginExtcity_ModuleUser extends PluginExtcity_Inherit_ModuleUser {

    public function GetCountryList($full,$userCountry=''){
		return $this->oMapper->GetCountryList($full,$userCountry);
	}
    
	public function GetCityListByCountry($full,$cid,$ext,$userCity=''){
		return $this->oMapper->GetCityListByCountry($full,$cid,$ext,$userCity);
	}
    
	public function GetCountryNameByCID($cid){
		return $this->oMapper->GetCountryNameByCID($cid);
	}

}
?>