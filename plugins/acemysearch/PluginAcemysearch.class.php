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
 * @File Name: PluginAcemysearch.class.php
 * @License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *----------------------------------------------------------------------------
 */

// * Запрещаем напрямую через браузер обращение к этому файлу.
if (!class_exists('Plugin')) die('Are you sure?');

class PluginAceMySearch extends Plugin
{
    private $sPlugin = 'acemysearch';

    protected $aDelegates = array(
        'action' => array('ActionSearch' => 'PluginAceMySearch_ActionMySearch'),
    );

    public function Activate()
    {
        return true;
    }

    /**
     * Инициализация плагина
     */
    public function Init()
    {
    }

    public function AdminPanel()
    {
        return array(
            //'class' => 'PluginAceMySearch_ActionMySearchAdmin',
        );
    }
}

// EOF