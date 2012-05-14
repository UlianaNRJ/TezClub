<?php 

// переводим месяц в русское название
function rdate($param, $time=0) {
    if(intval($time)==0) $time=time();
    $MonthNames=array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
    if(strpos($param,'M')===false) {
        return date($param, $time);
    }
    else {
        return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
    }
}