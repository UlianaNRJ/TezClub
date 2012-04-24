<?php
/********************************************
 * Author: Vladimir Linkevich
 * e-mail: Vladimir.Linkevich@gmail.com
 * since 2011-02-25
 ********************************************/
  class PluginAutocut_ModuleAutocut extends Module {
  		protected $aTagUnbreakable;
		protected $iLengthMax;
		protected $bLightMode;
		protected $iLengthLast;
	
	public function Init() {
		$this->aTagUnbreakable=Config::Get('plugin.autocut.TagUnbreakable');
		$this->iLengthMax=Config::Get('plugin.autocut.length_before_cut');
		$this->bLightMode=Config::Get('plugin.autocut.LightModeOn');
		$this->iLengthLast=Config::Get('plugin.autocut.SecondBarrier');
	}
  	/*************************************************************
 	* Add cut tag
 	**************************************************************/
	public function CutAdd($str) {
		$iLengthMax=$this->iLengthMax;
		$aTagUnbreakable=$this->aTagUnbreakable;
		$iLengthLast=$this->iLengthLast;
		$iTextLength=mb_strlen($str,'UTF-8');
		$cutpos;
		#exclude video link from counting position
		$sPrestripKey='/<?video>[^>]*<?\/video>/i';
		$sPrestripped=preg_replace($sPrestripKey,'',$str);	
		$sStripped=preg_replace ('/<[^>]*>/', '',$sPrestripped);
		#check stripped text length;
		if(strlen($sStripped)<=$iLengthMax){
			return $str;
		}
		#get current CUT position if exists
		$cutpos=mb_strpos(preg_replace('/<(?!cut)[^>]*>/','',$sPrestripped),'<cut>',0,"UTF-8");
		if($cutpos!==false && $this->bLightMode){
			if($cutpos<=$iLengthLast || $iLengthLast==0){
			return $str;
			}else{
			$iLengthMax=$iLengthLast;
		}
			}
		if($cutpos!==false && $cutpos<=$iLengthMax){	 
			return $str;
		}else{
		#remove CUT	
		$str=preg_replace('/<cut>/','',$str);
		$cutpos=0;#calculated CUT position
		$i=0;#char counter
		$countchar=0;#visible chars counter
		
		$bInTag=false;#if we are <inside of a tag>
		$bRecTag=false;#start recording tag name
		$bCount=true;#<don't>DO COUNT<don't>
		#current tag name
		$sCurrentTag='';
		#if we are waiting for tag closure
		$sWaitTag='';

		#moving thrugh text		
		while($countchar<=$iLengthMax && $i<$iTextLength){
			$current=mb_substr($str,$i,1,'UTF-8');
			#Find where the tag begins and start recording it
			if ($current=='<'){
				#set Cut position before tag;
				if($i!=0 && $sWaitTag==''){$cutpos=$i-1;}
				#if it's a second open tag then it's not a tag;
				if($bInTag){
					$bInTag=false;
					$bRecTag=false;
					$bCount=true;
					$countchar+=strlen($sCurrentTag)+2;
				}else{
					$sCurrentTag='';
					$bInTag=true;
					$bRecTag=true;
					$bCount=false;
				}
				#close tag
			} elseif($current=='>'){
				if ($bInTag){
					$bInTag=false;
					$bRecTag=false;
				}else{
					$countchar++;
				}
				if(in_array($sCurrentTag, $aTagUnbreakable)){
					$sWaitTag=$sWaitTag==''?$sCurrentTag:'';
				}
				if($sWaitTag!='video' ){
					$bCount=true;
				}
			#Space character	
			} elseif ($current==' ') {
				if ($bCount){
					$countchar++;
				}
				if($bInTag && !$sCurrentTag==''){
					$bRecTag=false;
				}
				#stop recording tag if it's length is over 11 chars
				if($bRecTag && (strlen($sCurrentTag)>11)){
					$bRecTag=false;
					$bInTag=false;
					$bCount=true;
					$countchar+=strlen($sCurrentTag)+2;
				}
				#if we are not in tag set cut position at this space symbol place
				if(!$bInTag && $sWaitTag==''){
					$cutpos=$i;
				}
			}else{
				if($bCount){	
				$countchar++;
				}
				#stop recording tag if it's length is over 11 chars
				if($bRecTag&&(strlen($sCurrentTag)>11)){
					$bRecTag=false;
					$bInTag=false;
					$bCount=true;
					$countchar+=strlen($sCurrentTag)+2;
				}
				#record current	character as one of the tag
				if($bRecTag && $current!='<' && $current!='/' && $current!=' '){$sCurrentTag.=$current;}
			}
		#char position enumerator
		$i++;	
		}
		#insert a cut tag;
		$str = mb_substr($str, 0, $cutpos,'UTF-8').'<cut>'.mb_substr($str, $cutpos,$iTextLength,'UTF-8');
		}
		return $str;
		#END OF CUT ADD FUNCTION
	}
	
#End of class	
  }
?>