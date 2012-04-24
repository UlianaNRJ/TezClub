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
 * Используемые таблицы БД
 */
$config['table']['openid'] = '___db.table.prefix___openid';
$config['table']['openid_tmp'] = '___db.table.prefix___openid_tmp';

/**
 * Настраиваем роутинг
 */
Config::Set('router.page.openid_login', 'PluginOpenid_ActionLogin');
Config::Set('router.page.openid_settings', 'PluginOpenid_ActionSettings');

/**
 * Общие настройки
 */
$config['file_store']   = '___sys.cache.dir___php_consumer_livestreet'; // каталог для хранения данных OpenID
$config['time_key_limit']   = 60*60*1; // in seconds, время актуальности временных данных при авторизации
$config['mail_required']   = false; // обязательный ввод e-mail
$config['buggy_gmp']   = false; // для обхода проблемы с шибкой "Bad signature" на некоторых серверах

/**
 * Настройки авторизации ВКонтакте
 */
$config['vk']['id']   = 2919946; // ID приложения
$config['vk']['secure_key']   = 'bgdQ1NxtVCtERk6J25aH'; // Защищенный ключ приложения
$config['vk']['transport_path']   = '/plugins/openid/include/xd_receiver.html'; // Путь от корня сайта до файла транспорта

/*
$config['vk']['id']   = 2764079; // ID приложения
$config['vk']['secure_key']   = '0hEprzN9Nrwo1eWNFvg2'; // Защищенный ключ приложения
$config['vk']['transport_path']   = '/plugins/openid/include/xd_receiver.html'; // Путь от корня сайта до файла транспорта
*/

/**
 * Настройки Facebook Application
 */
/*
$config['fb']['id']   = '204005829694555'; // Application ID
$config['fb']['secret']   = 'df1d22388ec57efd5dfa5653a09c7ee6'; // Application Secret
*/
$config['fb']['id']   = '434419026575515'; // Application ID
$config['fb']['secret']   = '140f541c02f6e0173142246e4ca1d4f1'; // Application Secret

/**
 * Настройки Twitter Application
 */
$config['twitter']['token']   = 'Ta5wpOjoT8GXsbJuIWIATQ'; // Consumer key
$config['twitter']['token_secret']   = 'TOPeSMxqgV81I12spPXzjHXNIwvEi6pSlQwZ9wqU'; // Consumer secret

return $config;
?>
