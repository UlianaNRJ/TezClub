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
 * @File Name: ActionMySearchAdmin.class.php
 * @License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *----------------------------------------------------------------------------
 */

/**
 * "Родной" поиск без использования Spinx'а
 * Администрирование плагина
 */
class PluginAceMySearch_ActionMySearchAdmin extends AceAdminPlugin {
    private $sPlugin = 'acemysearch';

    protected $aConfig = array();

    /**
     * Инициализация админки плагина
     *
     * @return void
     */
    public function Init() {
        //var_dump('init');
    }

    /**
     * Администрирование плагина
     * 
     * @return void
     */
    public function Admin() {
        //var_dump('admin');
    }

    /**
     * Завершение работы админки плагина
     *
     * @return void
     */
    public function Done() {
        //var_dump('done');
    }


}
// EOF