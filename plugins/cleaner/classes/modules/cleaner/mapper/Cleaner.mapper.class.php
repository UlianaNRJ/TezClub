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

class PluginCleaner_ModuleCleaner_MapperCleaner extends Mapper
{
    public function GetCleanerFilesXtextDB($sFile)
    {
	$sql = "DELETE FROM " . Config::Get('plugin.xtext.table.file') . "
		WHERE file_orig_name = ?";

	if ($aRows = $this->oDb->select($sql, $sFile)) {
	    return true;
	}
	return false;
    }

    public function GetCleanerFilesDB($sFile)
    {
	$iCount=0;
	$aRows = $this->oDb->select("SELECT topic_id FROM " . Config::Get('db.table.topic_content') . " WHERE topic_text_source LIKE '%$sFile%'");
	$iCount = count($aRows);
	
	if (Config::Get('db.table.topic_photo')) {
	    $sFileCrop=substr($sFile, 0,10);
	    $aRows = $this->oDb->select("SELECT topic_id FROM " . Config::Get('db.table.topic_photo') . " WHERE path LIKE '%$sFileCrop%'");
	    $iCount = $iCount + count($aRows);
	}

	if (Config::Get('plugin.page.table.page')) {
	    $aRows = $this->oDb->select("SELECT page_id FROM " . Config::Get('plugin.page.table.page') . " WHERE page_text LIKE '%$sFile%'");
	    $iCount = $iCount + count($aRows);
	}

	$aRows = $this->oDb->select("SELECT comment_id FROM " . Config::Get('db.table.comment') . " WHERE comment_text LIKE '%$sFile%'");
	$iCount = $iCount + count($aRows);

	$aRows = $this->oDb->select("SELECT user_id FROM " . Config::Get('db.table.user') . " WHERE user_profile_foto LIKE '%$sFile%'");
	$iCount = $iCount + count($aRows);
	
	if (Config::Get('plugin.wall.table.wall')) {
	    $aRows = $this->oDb->select("SELECT wall_id FROM " . Config::Get('plugin.wall.table.wall') . " WHERE text LIKE '%$sFile%'");
	    $iCount = $iCount + count($aRows);
	}
	
	if (Config::Get('db.table.company')) {
	    $aRows = $this->oDb->select("SELECT company_id FROM " . Config::Get('db.table.company') . " WHERE company_vacancies LIKE '%$sFile%' or company_description LIKE '%$sFile%' or company_boss LIKE '%$sFile%'");
	    $iCount = $iCount + count($aRows);
	}
	return $iCount;
    }

    public function GetAllComments()
    {
	$sql = "SELECT comment_id, target_id, target_type FROM " . Config::Get('db.table.comment') . " WHERE comment_delete = 1";
	if ($aRows = $this->oDb->select($sql)) {
	    return $aRows;
	}
	return false;
    }

    public function GetPidComments($sPid)
    {
	$sql = "SELECT comment_id, target_id, target_type FROM " . Config::Get('db.table.comment') . " WHERE comment_pid = ?";
	if ($aRows = $this->oDb->select($sql, $sPid)) {
	    return $aRows;
	}
	return false;
    }

    public function DellComment($sCommentId)
    {
	$sql = "DELETE FROM " . Config::Get('db.table.comment') . "
			    WHERE
				comment_id = ?";
	if ($this->oDb->select($sql, $sCommentId)) {
	    return true;
	}
	return false;
    }

}

?>
