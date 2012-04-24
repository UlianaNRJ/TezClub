<?php
/*-------------------------------------------------------
*
*	Plugin Extcity
*	Author: Vladimir Yuriev ( extravert )
*	Contact e-mail: support@lsmods.ru
*	Site: http://lsmods.ru
*
*/

class PluginExtcity_ModuleUser_MapperUser extends PluginExtcity_Inherit_ModuleUser_MapperUser {
	
    
    public function GetCountryList($full,$userCountry=''){
	    if($full==1) {
            
            $sql="SELECT * 
                FROM base_countries
                ORDER BY country_name_ru ASC";
            $aRows=$this->oDb->select($sql);
            
        } elseif($full==0) {
            
            $sql="SELECT * 
                FROM `base_countries` 
                WHERE 
                    sort>0 
                OR 
                    country_name_ru=?
                ORDER BY sort ASC";
            
            $aRows=$this->oDb->select($sql,$userCountry);
            
        }
        
	    $aReturn=array();
	    if($aRows) {
            foreach($aRows as $aRow) {   
                $aReturn[]=array("id"=>$aRow['id_country'],"name"=>$aRow['country_name_ru']);
            }
        }
	    return $aReturn;
	}


	public function GetCityListByCountry($full,$cid,$ext,$userCity=''){
	    if($full==0){
            
			$sql="
                SELECT 
                    city_name_ru,
                    id_country
                FROM base_cities 
                WHERE 
                    (id_country=?d AND `sort`>0) 
                    { OR city_name_ru= ? }
                ORDER BY `sort` ASC";
			$aRows=$this->oDb->select($sql,$cid,($ext==0)?$userCity:DBSIMPLE_SKIP);
	        $_arr=array();
            
            foreach($aRows as $a) {
                $_arr[]=$a['city_name_ru']; 
                $_arr=array_unique($_arr); # bug with equal city names
            }
            
	        if(sizeof($_arr)<=1){
	   			$sql="
                    SELECT 
                        city_name_ru,
                        id_country
                    FROM base_cities 
                    WHERE id_country=?d
                    ORDER BY city_name_ru ASC LIMIT 10";
				$aRows=$this->oDb->select($sql,$cid);
			}
            
	    }elseif($full==1){
			$sql="SELECT 
                    city_name_ru,
                    id_country
                  FROM base_cities
                  WHERE id_country=?
                  ORDER BY city_name_ru ASC";
			$aRows=$this->oDb->select($sql,$cid);
	    }
        
        
	    $aReturn=array();
	    if($aRows) {
            foreach($aRows as $aRow) {
                if($full==0 && $aRow['id_country']==$cid) {
                    $aReturn[]=$aRow['city_name_ru'];
                } elseif($full==1) {
                    $aReturn[]=$aRow['city_name_ru'];
                }
            }
        }
        
	    return $aReturn;
	}


	public function GetCountryNameByCID($cid){
	    $sql="SELECT 
                country_name_ru
            FROM 
                base_countries 
            WHERE 
                id_country=?d 
            LIMIT 1";
	    $aRow=$this->oDb->selectRow($sql,$cid);
	    return $aRow['country_name_ru'];
	}

}
?>