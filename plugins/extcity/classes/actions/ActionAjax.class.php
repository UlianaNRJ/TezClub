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

class PluginExtcity_ActionAjax extends PluginExtcity_Inherit_ActionAjax {

    protected function RegisterEvent() {
		parent::RegisterEvent();
		$this->AddEvent('countrylist','EventCountrylist');
	}
		
	
	protected function EventCountrylist() {
            
            /*
             * Валидация входных значений
             */
            
            
            if(isset($_POST['type']) && !in_array($_POST['type'],array("country","city"))) {
                $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
                return;
            }
            
            if(isset($_POST['full']) && !is_numeric($_POST['full'])) {
                $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
                return;
            }
            
            if(isset($_POST['cid']) && !is_numeric($_POST['cid'])) {
                $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
                return;
            }
            
            if(isset($_POST['ext']) && !is_numeric($_POST['ext'])) {
                $this->Message_AddErrorSingle($this->Lang_Get('system_error'),$this->Lang_Get('error'));
                return;
            }

            $type=($_POST['type']=="country")?"country":"city";
            $full=(!isset($_POST['full']))?1:$_POST['full'];
            $cid=(!isset($_POST['cid']))?0:$_POST['cid'];
            $ext=(!isset($_POST['ext']))?0:$_POST['ext'];
            
            $sReturn='';

            if($type=="city" && $cid!="" && $full!=""){
                
                    if($this->oUserCurrent){
                        $userCity=$this->oUserCurrent->getProfileCity();
                        $userCountry=$this->oUserCurrent->getProfileCountry();
                    } else {
                        $userCity=getRequest('profile_city')?getRequest('profile_city'):'';
                        $userCountry='';
                    }

                    $aCity=$this->User_GetCityListByCountry($full,$cid,$ext,$userCity);
                    
                    $sReturn= '<option value="">- '.$this->Lang_Get('settings_profile_city_not_selected').' -</option>';
                    $sel=false; 
                    
                    foreach($aCity as $sCity){
                            if($userCity==$sCity) {
                                $sel=true;
                            }
                            $selected=($userCity==$sCity)?"selected":"";
                            $sReturn.= '<option value="'.$sCity.'" '.$selected.'>'.$sCity.'</option>';
                    }
                    
                    
                    if($ext==0 && !$sel && $userCity!=""){
                        
                            $cidCountry=$this->User_GetCountryNameByCID($cid);
                            
                            if($userCountry==$cidCountry) {
                                $sReturn.= '<option value="'.$userCity.'" selected>'.$userCity.'</option>';
                            }
                    }
                    
                    if($full==0) {
                        $sReturn.= '<option value="_full_list_">- '.$this->Lang_Get('settings_profile_full_list').' -</option>';
                    } elseif($full==1) {
                        $sReturn.= '<option value="_other_name_">- '.$this->Lang_Get('settings_profile_other_name').' -</option>';
                    }
            }
            
            
            if($type=="country" && $full==1){
                if($this->oUserCurrent){
                    $userCountry=$this->oUserCurrent->getProfileCountry();
                } else {
                    $userCountry='';
                }

                $aCountries=$this->User_GetCountryList(1,$userCountry);
                
                $sReturn.= '<option value="">- '.$this->Lang_Get('settings_profile_country_not_selected').' -</option>';
                
                foreach($aCountries as $aCountry) {
                    $selected=($userCountry==$aCountry['name'])?"selected":"";
                    $sReturn.= '<option value="'.$aCountry['name'].'" id="cid'.$aCountry['id'].'" '.$selected.'>'.$aCountry['name'].'</option>';
                }
                
            }
            
            
            $this->Viewer_AssignAjax('sReturn',$sReturn);
            
            
        }

        /*public function EventShutdown() {
            parent::EventShutdown();
            $this->Viewer_Assign('sTemplateWebPathPlugin',Plugin::GetTemplateWebPath(__CLASS__));
        }*/
}
?>