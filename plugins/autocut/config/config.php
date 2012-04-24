<?php
/********************************************
 * Author: Vladimir Linkevich
 * e-mail: Vladimir.Linkevich@gmail.com
 * since 2011-02-25
 ********************************************/
$config=array(); 

/* will set cut after XXX characters
 * Автоматически вставляем тег <cut> после ХХХ символов (слова и теги разрывать не должен)
 */
$config['length_before_cut']=1550;

/*
 * Does not allow to input CUT between opening and closing tags of listed below;
 * Не разрешает вставлять CUT внутри этих тегов:
 */
$config['TagUnbreakable']=array('video','code','a','blockquote', 'iframe', 'embed');

/*
 * Do you want to cut topics in personal blogs as well?
 * В персональных блогах топики резать будем?
 */
$config['cutPersonal']=true;

/*
 * If LightModeOn is set "true" then IF user had put the <cut> into text autocutting check SecondBarrier.
 * Otherways AutoCut will override user's cut IF user's cut is AFTER the length_before_cut value.
 * Если включить опцию ниже, то ЕСЛИ полбователь поставил <cut>, АвтоКат установит другой лимит: SecondBarrier.
 * Иначе, пользовательский кат будет заменен автоматическим ЕСЛИ он был установлен ПОСЛЕ лимита (length_before_cut).
 */
$config['LightModeOn']=false;

/* 
 * Add an other text length check if LightModeOn. set 0 if you accept ANY length before user's manual cut;
 * Вторая проверка (при LightModeOn). Установите 0, если пользователь может поставить КАТ в ЛЮБОМ месте, или установите второе разумное ограничение;
 */
$config['SecondBarrier']=2500;
return $config;
?>