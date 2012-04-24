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
 * @File Name: config.php
 * @License: GNU GPL v2, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *----------------------------------------------------------------------------
 */

define('MYSEARCH_VERSION', '1.5');
define('MYSEARCH_VERSION_BUILD', '121');

define('ROUTE_PAGE_MYSEARCH', 'search');

/***
 * Не используется
 */
define('MYSEARCH_HOOK_ENABLE', true);

/***
 * Основа шаблона для определения слов
 * Слово - это набор букв, цифр, знаков "подчеркивание" и "минус"
 * 
 * Шаблон служит для фильтрации "небукв" на этапе подготовки к поиску
 * и для выделения слов в "подсветке"
 * 
 * Для поддержки многоязычности в этом шаблоне заданы символы алфавитов
 * практически всех языков народов стран Европы и бывш. СССР.
 * При желании можно добавить любой другой - китайский, хинди, суахили и т.д.
 * Для этого добавляется (или заменяется) диапазон символов в кодах Unicode.
 */
define('MYSEARCH_CHAR_PATTERN', '[\d\w\x{00c0}-\x{024f}\x{0386}-\x{052f}\x{0530}-\x{058F}_-]');

/***
 * Поиск строгий/нестрогий
 * false - нестрогий поиск, т.е. запрос "дом" вернет "дома", "задом" и т.д.
 * true  - строгий поиск, т.е. запрос "дом" будет игнорировать "дома" и "задом",
 *         но запросу "дом*" будут соответствовать "дома", "домовой", 
 *         а запросу "*дом" будут соответствовать "задом", "передом",
 *         а запросу "*дом*" будет соответствовать "рандомный"
 */
define('MYSEARCH_STRICT', true);

/***
 * Минимальная и максимальная длина искомого выражения.
 * Не рекомендуется минимальное значение задавать меньше 3
 * Не рекомендуется максимальное значение задавать больше 255
 */
define('MYSEARCH_MIN_LENGTH', 3);
define('MYSEARCH_MAX_LENGTH', 255);

/***
 * Режим вывода результатов поиска
 * 1 - Краткий текст
 * 2 - Полный текст
 * 3 - Сниппет
 */
define('MYSEARCH_OUT_TEXT_SHORT', 1);
define('MYSEARCH_OUT_TEXT_FULL', 2);
define('MYSEARCH_OUT_TEXT_SNIPPET', 3);

define('MYSEARCH_OUT_MODE', MYSEARCH_OUT_TEXT_SNIPPET); // Задаем режим вывода результатов

/***
 * Длина сниппета. Реальный размер может быть и больше,
 * учитывая, что будет выравнивание до границ слова пв начале и конце сниппета
 */
define('MYSEARCH_SNIPPET_LENGTH', 160);

/***
 * Максимальная длина сниппета. Если сниппет с учетом выравнивания по границам слов
 * становится больше этого параметра, то он будет обрезаться принудительно
 * Если = 0, то игнорируется
 */
define('MYSEARCH_SNIPPET_MAXLENGTH', 220);

/***
 * Строки, которые будут вставляться в тексте до и после искомых строк,
 * например, чтобы "подсветить" найденный текст
 */
define('MYSEARCH_SNIPPET_BEFORE_MATCH', '<span class="searched-item">');
define('MYSEARCH_SNIPPET_AFTER_MATCH', '</span>');

/***
 * Строки, которые будут вставляться в тексте до и после фрагмента с искомыми строками,
 * например, чтобы разбить их на параграфы
 */
define('MYSEARCH_SNIPPET_BEFORE_FRAGMENT', '<p>');
define('MYSEARCH_SNIPPET_AFTER_FRAGMENT', '</p>');

/***
 * Максимальное число фрагментов, которое будет показано в сниппете
 * Если = 0, то игнорируется
 */
define('MYSEARCH_SNIPPET_MAX_FRAGMENTS', 5);

/***
 * Пропускать теги
 * Если задано, то в тегах поиск все равно будет осуществляться,
 * но в результатах поиска все теги будут удаляться. Поэтому
 * если искомое слово встречается только в теге, то топик будет
 * выведен, но слово подсвечено не будет
 */
define('MYSEARCH_SKIP_ALL_TAGS', false);

/***
 * Протоколирование запросов поиска на сайте. 
 *   true - протоколирование включено
 *   true - протоколирование включено
 */
define('MYSEARCH_LOGS_ENABLE', false);

/***
 * Имя файла для протоколирования запросов. Если протоколирование включено,
 * то файл протокола будет сохраняться в папке logs Вашего сайта
 */
define('MYSEARCH_LOGS_FILE', 'mysearch.log'); 

/***
 * Максимальный размер лог-файла; если = 0, то ротация по дате
 * 
 * Например, 
 *   define('LOGS_MAX_SIZE', 1024*1024*1000); // Размер файла 1 Гб
 */
//define('LOGS_MAX_SIZE', 1024*1024*1000);	// 
define('MYSEARCH_LOGS_MAX_SIZE', 0); 

/***
 * Максимальное число лог-файлов
 * 
 * Например, если имя файла задано mysearch.log, то старые файлы
 * будут сохраняться под именами 
 *   mysearch1.log
 *   mysearch2.log
 *   mysearch3.log
 *   mysearch4.log
 *   ... и т.д. 
 */
define('MYSEARCH_LOGS_MAX_FILES', 10); 

$config=array(
        'version' => MYSEARCH_VERSION,
        'char_pattern' => MYSEARCH_CHAR_PATTERN,
        'strict_search' => MYSEARCH_STRICT,
        'min_length_req' => MYSEARCH_MIN_LENGTH,
        'max_length_req' => MYSEARCH_MIN_LENGTH,
        'out_mode' => MYSEARCH_OUT_MODE,
        'snippet' => array(
                'length' => MYSEARCH_SNIPPET_LENGTH,
                'maxlength' => MYSEARCH_SNIPPET_MAXLENGTH,
                'before_match' => MYSEARCH_SNIPPET_BEFORE_MATCH,
                'after_match' => MYSEARCH_SNIPPET_AFTER_MATCH,
                'before_fragment' => MYSEARCH_SNIPPET_BEFORE_FRAGMENT,
                'after_fragment' => MYSEARCH_SNIPPET_AFTER_FRAGMENT,
                'max_fragments' => MYSEARCH_SNIPPET_MAX_FRAGMENTS,
        ),
        'skip_all_tags' => MYSEARCH_SKIP_ALL_TAGS,
        'logs' => array(
                'enable' => MYSEARCH_LOGS_ENABLE,
                'file' => MYSEARCH_LOGS_FILE,
                'max_size' => MYSEARCH_LOGS_MAX_SIZE,
                'max_files' => MYSEARCH_LOGS_MAX_FILES
        ),
    'per_page' => 20
);

return $config;

// EOF