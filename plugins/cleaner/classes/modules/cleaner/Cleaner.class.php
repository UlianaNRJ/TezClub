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

class PluginCleaner_ModuleCleaner extends Module
{

    protected $oMapper;

    public function Init()
    {

	$this->oMapper = Engine::GetMapper(__CLASS__);
    }

    public function GetCleanerFiles($aFile = array(), $sDirName = '')
    {
	if ($rRirHandle = opendir($sDirName)) {
	    while (($sFile = readdir($rRirHandle)) !== false) {
		if ($sFile != "." && $sFile != ".." && ereg("avatar", $sFile) != true && ereg("company", $sFile) != true) {
		    if (is_dir($sDirName . "/" . $sFile)) {
			$aFile = $this->GetCleanerFiles($aFile, $sDirName . "/" . $sFile);
		    } else {
			$aTmpFile['name'] = $sFile;
			$aTmpFile['dirname'] = $sDirName . "/" . $sFile;
			$aFile[] = $aTmpFile;
		    }
		}
	    }
	}
	return $aFile;
    }

    public function GetCleanerFilesDB($aFiles)
    {
	foreach ($aFiles as $aFile) {
	    if (!($sCount = $this->oMapper->GetCleanerFilesDB($aFile['name']))) {
		if (unlink($aFile['dirname'])) {
		    //логи
		    if (substr_count($aFile['dirname'], 'xtext')) {
			if ($this->oMapper->GetCleanerFilesXtextDB($aFile['name'])) {
			    //логи
			} else {
			    //логи
			}
		    }
		} else {
		    //логи
		}
	    }
	}
    }

    public function GetCleanerComments()
    {

	if ($aComments = $this->oMapper->GetAllComments()) {
	    foreach ($aComments as $aComment) {
		$this->DellComment($aComment);
	    }
	    return true;
	}
    }

    public function DellComment($aComment)
    {
	$sId = $aComment['comment_id'];
	if ($this->Comment_DeleteCommentByTargetId($sId, $aComment['target_type'])) {
	    if ($this->oMapper->DellComment($sId)) {
		if ($aComment['target_type'] == 'topic') {
		    if ($oTopic = $this->Topic_GetTopicById($aComment['target_id'])) {
			$oTopic->setCountComment($oTopic->getCountComment() - 1);
			$this->Topic_UpdateTopic($oTopic);
		    }
		}
		if ($aComment['target_type'] == 'talk') {
		    if ($oTalk = $this->Talk_GetTalkById($aComment['target_id'])) {
			$oTalk->setCountComment($oTalk->getCountComment() - 1);
			$this->Talk_UpdateTalk($oTalk);
		    }
		}
		$this->Cache_Delete("comment_{$sId}");
		if ($aCommentPid = $this->oMapper->GetPidComments($sId)) {
		    foreach ($aCommentPid as $aComment) {
			$this->DellComment($aComment);
		    }
		}
	    }
	    return true;
	}
    }

}

?>
