<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/

/**
 * Регистрация хука для вывода ссылки копирайта
 *
 */
class HookCopyright extends Hook {
	public function RegisterHook() {
		$this->AddHook('template_copyright','CopyrightLink',__CLASS__,-100);
	}

	public function CopyrightLink() {
		/**
		 * Выводим везде, кроме страницы списка блогов и списка всех комментов
		 */
		if (!(Router::GetAction()=='blogs' or Router::GetAction()=='comments')) {
			return '&copy; <!--<a href="http://teztour.ua">TezTour</a>---><a href="http://teztour.ua/">TezTour.UA</a>';
		}
		return '';
	}
}
?>