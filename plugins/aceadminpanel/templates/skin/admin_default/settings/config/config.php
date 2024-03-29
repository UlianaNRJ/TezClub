<?php

$config = array();

/**
 * Настройки вывода js и css файлов
 */
$config['head']['rules']['page'] =array(
	'path' => '___path.root.web___/page/',
	'js' => array(
		'exclude' => array(
			"___path.static.skin___/js/vote.js",
			"___path.static.skin___/js/favourites.js",
			"___path.static.skin___/js/questions.js",
		)
	),
);

$config['head']['default']['js']  = array(
	"___path.root.engine_lib___/external/JsHttpRequest/JsHttpRequest.js",
	"___path.root.engine_lib___/external/MooTools_1.2/mootools-1.2.js?v=1.2.4",
	"___path.root.engine_lib___/external/MooTools_1.2/plugs/Roal/Roar.js",
	"___path.root.engine_lib___/external/MooTools_1.2/plugs/Autocompleter/Observer.js",
	"___path.root.engine_lib___/external/MooTools_1.2/plugs/Autocompleter/Autocompleter.js",
	"___path.root.engine_lib___/external/MooTools_1.2/plugs/Autocompleter/Autocompleter.Request.js",
	"___path.root.engine_lib___/external/MooTools_1.2/plugs/Piechart/moocanvas.js",
	"___path.root.engine_lib___/external/MooTools_1.2/plugs/Piechart/piechart.js",
	"___path.root.engine_lib___/external/MooTools_1.2/plugs/vlaCal-v2.1/jslib/vlaCal-v2.1.js",
    "___path.root.engine_lib___/external/MooTools_1.2/plugs/iFrameFormRequest/iFrameFormRequest.js",
	"___path.root.engine_lib___/external/prettify/prettify.js",
    "___path.static.skin___/js/admin.js?v=" . ACEADMINPANEL_VERSION_BUILD,
	"___path.static.skin___/js/other.js?v=" . ACEADMINPANEL_VERSION_BUILD,
	"___path.static.skin___/js/login.js",
	"___path.static.skin___/js/panel.js",
	"___path.root.engine_lib___/external/MooTools_1.2/plugs/Piechart/moocanvas.js"=>array('browser'=>'IE'),
);

$config['head']['default']['css'] = array(
    "___path.static.skin___/css/admin.css?v=" . ACEADMINPANEL_VERSION_BUILD,
	"___path.static.skin___/css/style.css?v=1",
	"___path.static.skin___/css/Roar.css",
	"___path.static.skin___/css/piechart.css",
	"___path.static.skin___/css/Autocompleter.css",
	"___path.static.skin___/css/prettify.css",	
	"___path.static.skin___/css/vlaCal-v2.1.css",
	"___path.static.skin___/css/ie6.css?v=1"=>array('browser'=>'IE 6'),
	"___path.static.skin___/css/ie7.css?v=1"=>array('browser'=>'gte IE 7'),	
	"___path.static.skin___/css/simple_comments.css"=>array('browser'=>'gt IE 6'),	
);

return $config;

// EOF