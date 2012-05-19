<?php
// 
$app->get('/hotels', function() use ($app) {
    $hotelcitys = Model::factory('SprCitycountry')
                        ->where('active', 1)
                        ->order_by_desc('active')
                        ->find_many();

    $hoteltypes = Model::factory('SprHoteltype')
                        ->where('active', 1)
                        ->order_by_desc('active')
                        ->find_many();

    foreach ($hotelcitys as $key => $value) {
        $hotels = $value->hotels()->find_many();
        
        foreach ($hotels as $key2 => $value2) {
            $htypes = $value2->hoteltypes()->find_many();
            $value2->set('htypes', $htypes);
        }
        
        $value->set('hotels', $hotels);
    }

    return $app->render('hotels_home.twig', array('hotelcitys' => $hotelcitys,
                                                  'hoteltypes' => $hoteltypes,
                                                  'currentpage' => 'hotels'));
});

$app->get('/hotel/:id(/:page)', 'show_hotel') ;
$app->post('/hotel/:id(/:page)', 'show_hotel') ;

function show_hotel($id, $page = 1) {
    $app = Slim::getInstance();
    $hotel = Model::factory('SprHotel')->where('active', 1)->find_one($id);
    if (! $hotel instanceof SprHotel) {
        $app->notFound();
    }

    $sortby = $app->request()->post('sortby');
    // ------------------- pagination 
    $onpage = 5;
    $page = (int) $page;
    //собираем кол-во страниц, для пагинации
    $pages = $hotel->topics()->count();
    $pages = ceil($pages / $onpage);
    $arrpage =  array();
    for ($i=0; $i < $pages; $i++) {
        $arrpage[$i]['id'] = $i+1;
        $arrpage[$i]['current'] = ($page == $i+1) ? 1 : 0;
    }

    $offset = $onpage * ($page-1) + $page-1;

    // ------------------- end  pagination 
    if ($sortby == "ASC") {
        $topics = $hotel->topics()
                        ->where('active', 1)
                        ->order_by_asc('id')
                        ->limit($onpage)
                        ->offset($offset)
                        ->find_many();
    } else if ($sortby == "POP") {
        $topics = $hotel->topics()
                        ->where('active', 1)
                        ->order_by_desc('count_bals')
                        ->limit($onpage)
                        ->offset($offset)
                        ->find_many();
    } else {
        $topics = $hotel->topics()
                        ->where('active', 1)
                        ->order_by_desc('id')
                        ->limit($onpage)
                        ->offset($offset)
                        ->find_many();
    }


    foreach ($topics as $key => $value) {
        
        $bloger = Model::factory('SprBlogger')->where('active', 1)->find_one($value->bl_id);
        $value->set('author', $bloger->name);
        $value->set('author_ava', $bloger->image);

        $hotel = Model::factory('SprHotel')->where('active', 1)->find_one($value->hotel_id);
        $value->set('hotel', $hotel->name);

        $value->tags = explode(',', $value->tags);

        $value->timestamp = rdate('d M Y, H:i', strtotime($value->timestamp));

    }

    $hotel->soc_links = json_decode($hotel->soc_links);

    return $app->render('hotels_detail.twig', array('hotel' => $hotel,
                                                    'topics' => $topics,
                                                    'sortby' =>$sortby,
                                                    'pagination' =>$arrpage,
                                                    'current' => $page,
                                                    'currentpage' => 'hotels'
                                                    )
                        );
};