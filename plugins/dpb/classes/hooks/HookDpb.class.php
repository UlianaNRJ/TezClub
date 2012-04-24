<?php

/* -------------------------------------------------------
 *
 *   LiveStreet (0.5x)
 *   Plugin Disabling personal blogs (v.1.0.0)
 *   Copyright © 2011 Bishovec Nikolay
 *
 * --------------------------------------------------------
 *
 *   Plugin Page: http://netlanc.net
 *   Contact e-mail: netlanc@yandex.ru
 *
  ---------------------------------------------------------
 */

class PluginDpb_HookDpb extends Hook
{

    public function RegisterHook()
    {
	$this->AddHook('check_topic_fields', 'CheckTopicFields', __CLASS__);
	$this->AddHook('check_photoset_fields', 'CheckTopicFields', __CLASS__);
	$this->AddHook('check_link_fields', 'CheckTopicFields', __CLASS__);
	$this->AddHook('check_question_fields', 'CheckTopicFields', __CLASS__);
    }

    public function CheckTopicFields($aVars)
    {
	/**
	 * Проверяем id блога
	 */
	if (getRequest('blog_id')<=0) {
	    $this->Message_AddError($this->Lang_Get('topic_create_blog_id_empty'),$this->Lang_Get('error'));
	    $aVars['bOk'] = false;
	}
    }

}

?>
