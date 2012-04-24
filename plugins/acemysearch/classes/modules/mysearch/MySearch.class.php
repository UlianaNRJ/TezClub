<?php
/*---------------------------------------------------------------------------
 * @Plugin Name: aceMySearch
 * @Plugin Id: acemysearch
 * @Plugin URI: 
 * @Description: Simple Search via MySQL (without Sphinx) for LiveStreet/ACE
 * @Version: 1.5.121
 * @Author: Vadim Shemarov (aka aVadim)
 * @Author URI: 
 * @LiveStreet Version: 0.5
 * @File Name: MySearch.class.php
 * @License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *----------------------------------------------------------------------------
 */

/**
 * "Родной" поиск без использования Spinx'а
 *
 */
class PluginAceMySearch_ModuleMySearch extends Module {

    /**
     * Инициализация модуля
     *
     */
    public function Init() {
        $this->oMapper = HelperPlugin::GetMapper();
    }

    /**
     * Получает список топиков по регулярному выражению (поиск)
     *
     * @param unknown_type $sRegexp
     * @param unknown_type $iPage
     * @param unknown_type $iPerPage
     * @return unknown
     */
    public function GetTopicsIdByRegexp($sRegexp, $iPage, $iPerPage, $aParams=array()) {
        $sTag = md5(serialize($sRegexp).serialize($aParams));
        $sCacheTag='mysearch_topics_'.$sTag.'_'.$iPage.'_'.$iPerPage;
        if (false === ($data = $this->Cache_Get($sCacheTag))) {
            $data = array('collection'=>$this->oMapper->GetTopicsIdByRegexp($sRegexp, $iCount, $iPage, $iPerPage, $aParams),
                    'count'=>$iCount);
            $this->Cache_Set($data, $sCacheTag, array('topic_update', 'topic_new'), 60*60);
        }
        return $data;
    }

    /**
     * Получает список комментариев по регулярному выражению (поиск)
     *
     * @param unknown_type $sRegexp
     * @param unknown_type $iPage
     * @param unknown_type $iPerPage
     * @return unknown
     */
    public function GetCommentsIdByRegexp($sRegexp, $iPage, $iPerPage, $aParams=array()) {
        $sTag = md5(serialize($sRegexp).serialize($aParams));
        $sCacheTag='mysearch_comments_'.$sTag.'_'.$iPage.'_'.$iPerPage;
        if (false === ($data = $this->Cache_Get($sCacheTag))) {
            $data = array('collection'=>$this->oMapper->GetCommentsIdByRegexp($sRegexp, $iCount, $iPage, $iPerPage, $aParams),
                    'count'=>$iCount);
            $this->Cache_Set($data, $sCacheTag, array('topic_update', 'comment_new'), 60*60);
        }
        return $data;
    }

    /**
     * Получает список блогов по регулярному выражению (поиск)
     *
     * @param unknown_type $sRegexp
     * @param unknown_type $iPage
     * @param unknown_type $iPerPage
     * @return unknown
     */
    public function GetBlogsIdByRegexp($sRegexp, $iPage, $iPerPage, $aParams=array()) {
        $sTag = md5(serialize($sRegexp).serialize($aParams));
        $sCacheTag='mysearch_blogs_'.$sTag.'_'.$iPage.'_'.$iPerPage;
        if (false === ($data = $this->Cache_Get($sCacheTag))) {
            $data = array(
                    'collection'=>$this->oMapper->GetBlogsIdByRegexp($sRegexp, $iCount, $iPage, $iPerPage, $aParams),
                    'count'=>$iCount);
            $this->Cache_Set($data, $sCacheTag, array('blog_update', 'blog_new'), 60*60);
        }
        return $data;
    }

    public function GetBlogsByArrayId($aArrayId) {
        $sTag = md5(serialize($aArrayId));
        $sCacheTag='mysearch_blogs_list_'.$sTag;
        if (false === ($data = $this->Cache_Get($sCacheTag))) {
            $data = $this->oMapper->GetBlogsByArrayId($aArrayId);
            $this->Cache_Set($data, $sCacheTag, array('blog_update', 'blog_new'), 60*60);
        }
        return $data;
    }

}

// EOF