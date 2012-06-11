<?php
// index page
$app->get('/(city/:id)', function($id = '') use ($app) {

	$cities = getCities();
	if (!empty($id)) {
		$currentCityId = $id;
		foreach ($cities as $city) {
			if ($city["id"] === $id) {
				$currentCity = $city["city"];
			}
		}
	}
	else {
		$currentCity = $cities[0]["city"];
		$currentCityId = $cities[0]["id"];
	}
	$metros = getMetros($currentCityId);
	$offices = getOffices($currentCityId);

	foreach ($offices as &$office) {
		if (!empty($office["latlng"])) {
			$latlng = explode(",", $office["latlng"]);
			$office["lat"] = $latlng[0];
			$office["lng"] = $latlng[1];
			$office["address"] = mainTextConvert($office["address"]);
			$office["time"] = mainTextConvert($office["time"]);
			$office["phones"] = mainTextConvert($office["phones"]);
			$office["infocenter"] = mainTextConvert($office["infocenter"]);
			$office["skype"] = mainTextConvert($office["skype"]);
		}
	}

	$data = array(
		"cities" => $cities,
		"currentCity" => $currentCity,
		"currentCityId" => $currentCityId,
		"metros" => $metros,
		"offices" => $offices
	);
    return $app->render('front/index.twig', $data);
});

function mainTextConvert($str) {
	return str_replace(array("\r","\n"), '', nl2br(htmlspecialchars($str, ENT_QUOTES)));
}