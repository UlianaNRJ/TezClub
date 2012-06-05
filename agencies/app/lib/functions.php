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

// получаем города и количество агенств в них
function getCities() {
    global $db;
    return $db->dbFetchAll("SELECT tour_city.*, COUNT(*) as count FROM tour_city
                            LEFT JOIN tour_office ON (tour_city.id = tour_office.city_id)
                            GROUP BY tour_office.city_id");
}

function getCity($id) {
    global $db;
    return $db->dbFetchObject("SELECT * FROM tour_city WHERE id = ". $id);
}

function addCity($data) {
    global $db;
    $db->dbQuery("INSERT INTO tour_city
					(city) VALUES('". $data["city"] ."')");
}

function updateCity($data) {
    global $db;
    $db->dbQuery("UPDATE tour_city SET
					city = '". $data["city"] . "'
					WHERE id = ". $data["id"]);
}

function deleteCity($id) {
    global $db;
    $db->dbQuery("DELETE FROM tour_city 
    				WHERE id = ". $id);
}


function getMetros($city_id = '') {
    global $db;
    $query = "SELECT tour_metro.*, tour_city.city FROM tour_metro LEFT JOIN tour_city ON (tour_metro.city_id = tour_city.id)";
    if (!empty($city_id))
        $query .= "WHERE tour_metro.city_id = " . $city_id;
    return $db->dbFetchAll($query);
}

function getMetro($id) {
    global $db;
    return $db->dbFetchObject("SELECT * FROM tour_metro 
    							LEFT JOIN tour_city ON (tour_metro.city_id = tour_city.id) 
    							WHERE tour_metro.id = " . $id);
}

function addMetro($data) {
    global $db;
    $db->dbQuery("INSERT INTO tour_metro
					(metro, city_id) 
					VALUES('". $data["metro"] ."', '" . $data["city_id"] . "')");
}

function updateMetro($data) {
    global $db;
    $db->dbQuery("UPDATE tour_metro SET
					metro = '". $data["metro"] . "',
					city_id = '". $data["city_id"] . "'
					WHERE id = ". $data["id"]);
}

function deleteMetro($id) {
    global $db;
    $db->dbQuery("DELETE FROM tour_metro 
    				WHERE id = ". $id);
}


function getOffices($city_id = '') {
    global $db;
    $query = "SELECT tour_office.*, tour_city.city, tour_metro.metro
                            FROM tour_office 
                            LEFT JOIN tour_city ON (tour_office.city_id = tour_city.id)
                            LEFT JOIN tour_metro ON (tour_office.metro_id = tour_metro.id)";
    if (!empty($city_id))
        $query .= "WHERE tour_office.city_id = " . $city_id;
    return $db->dbFetchAll($query);
}

function getOffice($id) {
    global $db;
    return $db->dbFetchObject("SELECT tour_office.*, tour_city.city, tour_metro.metro
    						FROM tour_office 
    						LEFT JOIN tour_city ON (tour_office.city_id = tour_city.id)
    						LEFT JOIN tour_metro ON (tour_office.metro_id = tour_metro.id)
    						WHERE tour_office.id = " . $id);
}

function addOffice($data) {
    global $db;
    $db->dbQuery("INSERT INTO tour_office
					(title, address, time, phones, infocenter, mail, skype, latlng, image, city_id, metro_id) 
					VALUES(
						'". $data["title"] ."', 
						'". $data["address"] ."', 
						'". $data["time"] ."', 
						'". $data["phones"] ."', 
						'". $data["infocenter"] ."', 
						'". $data["mail"] ."', 
						'". $data["skype"] ."', 
						'". $data["latlng"] ."', 
						'". $data["image"] ."', 
						'". $data["city_id"] ."', 
						'". $data["metro_id"] ."')");
}

function updateOffice($data) {
    global $db;
    $db->dbQuery("UPDATE tour_office SET
    				title = '". $data["title"] . "',
    				address = '". $data["address"] . "', 
    				time = '". $data["time"] . "', 
    				phones = '". $data["phones"] . "', 
    				infocenter = '". $data["infocenter"] . "', 
    				mail = '". $data["mail"] . "', 
    				skype = '". $data["skype"] . "', 
    				latlng = '". $data["latlng"] . "',
    				image = '". $data["image"] . "',
					city_id = '". $data["city_id"] . "',
					metro_id = '". $data["metro_id"] . "'
					WHERE id = ". $data["id"]);
}

function deleteOffice($id) {
    global $db;
    $db->dbQuery("DELETE FROM tour_office 
    				WHERE id = ". $id);
}