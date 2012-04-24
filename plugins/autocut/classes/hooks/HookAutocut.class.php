<?php
/********************************************
 * Author: Vladimir Linkevich
 * e-mail: Vladimir.Linkevich@gmail.com
 * since 2011-02-25
 ********************************************/
class PluginAutocut_HookAutocut extends Hook {
	public function RegisterHook() {
		/* 
		 * ActionTopic Hook
		 * CheckTopicFields function hook.
		 */ 
			$this -> AddHook('check_topic_fields', 'CheckTopicFieldsCut');	
	}

	public function CheckTopicFieldsCut($var) {	
		if(!$var['bOk']){
			return $var;
		}
		#check if we are posting to personal blog and if we need to cut personal topics
		if(getRequest('blog_id')==0 && !Config::Get('plugin.autocut.cutPersonal')){
			return $var;
		}
		#Avoid plugin pokupalka inheritance
		if(getRequest('goods_currency')){
			return $var;
		}
		#Get Topic Text
		$this -> sTopicText = getRequest('topic_text');
		#Insert CUT
		$this -> sTopicText = $this -> PluginAutocut_Autocut_CutAdd($this -> sTopicText);
		#get the values back to the form
		$_REQUEST['topic_text'] = $this -> sTopicText;
	}
#End of class
}
?>