<?php
// index page
$app->get('/', $authCheck, function() use ($app) {

    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();

    $hotels = Model::factory('SprHotel')
                    ->order_by_desc('count_topic')
                    ->limit(7)
                    ->find_many();

    $topics = Model::factory('SprTopic')
                    ->order_by_desc('count_bals')
                    ->limit(3)
                    ->find_many();

    foreach ($topics as $key => $value) {
        $value->timestamp = rdate('d M Y, H:i', strtotime($value->timestamp));
    }

    return $app->render('index.twig', array('topics' => $topics,
                                            'hotels' => $hotels,
                                            'bloggers' => $bloggers,
                                            'currentpage' => '/'
                                            )
                        );
});

// 
$app->get('/bloggers', function() use ($app) {
    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();
    return $app->render('bloggers_all.twig', array('bloggers' => $bloggers,
                                                   'currentpage' => 'bloggers'
                                                   ));
});

// 
$app->get('/bloggers/(:id)', 'show_blogger');
$app->post('/bloggers/(:id)', 'show_blogger');

function show_blogger($id) {
    $app = Slim::getInstance();
    
    $blogger = Model::factory('SprBlogger')->find_one($id);
    if (! $blogger instanceof SprBlogger) {
        $app->notFound();
    }
    $blogger->soc_links = json_decode($blogger->soc_links);

    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();

    $sortby = $app->request()->post('sortby');
    if ($sortby == "ASC") {
        $topics = $blogger->topics()
                ->order_by_asc('timestamp')
                ->find_many();
    } else {
        $topics = $blogger->topics()
                ->order_by_desc('timestamp')
                ->find_many();
    }

    foreach ($topics as $key => $value) {
        
        $bloger = Model::factory('SprBlogger') ->find_one($value->bl_id);
        $value->set('author', $bloger->name);

        $hotel = Model::factory('SprHotel') ->find_one($value->hotel_id);
        $value->set('hotel', $hotel->name);

        $value->tags = explode(',', $value->tags);

    }


    $hotels = $blogger->hotels()->find_many();

    return $app->render('bloggers_detail.twig', array('blogger' => $blogger,
                                                      'bloggers' => $bloggers,
                                                      'sortby' => $sortby,
                                                      'topics' => $topics,
                                                      'hotels' => $hotels,
                                                      'currentpage' => 'bloggers'));
};

// Blog Homepage.
$app->get('/blog', 'all_blogs');
$app->post('/blog', 'all_blogs');

function all_blogs () {
    $app = Slim::getInstance();

    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();

    $hotels = Model::factory('SprHotel')
                    ->order_by_desc('count_topic')
                    ->find_many();

    $sortby = $app->request()->post('sortby');
    if ($sortby == "ASC") {
        $topics = Model::factory('SprTopic')
                ->order_by_asc('timestamp')
                ->find_many();
    } else {
        $topics = Model::factory('SprTopic')
                ->order_by_desc('timestamp')
                ->find_many();
    }

    $sortbyhotels = $app->request()->post('sortbyhotels');
    if ($sortbyhotels != "") {
        $topics = Model::factory('SprTopic')
                ->order_by_asc('timestamp')
                ->where('hotel_id', $sortbyhotels)
                ->find_many();
        $sortby ='';
    }
    $sortbybloggers = $app->request()->post('sortbybloggers');
    if ($sortbybloggers != "") {
        $topics = Model::factory('SprTopic')
                ->order_by_asc('timestamp')
                ->where('bl_id', $sortbybloggers)
                ->find_many();
        $sortby ='';
        $sortbyhotels='';
    } 

    foreach ($topics as $key => $value) {
        
        $bloger = Model::factory('SprBlogger') ->find_one($value->bl_id);
        $value->set('author', $bloger->name);

        $hotel = Model::factory('SprHotel') ->find_one($value->hotel_id);
        $value->set('hotel', $hotel->name);

        $value->tags = explode(',', $value->tags);

        $value->timestamp = rdate('d M Y, H:i', strtotime($value->timestamp));

    }

    return $app->render('blog_home.twig', array('topics' => $topics,
                                                'hotels' => $hotels,
                                                'bloggers' => $bloggers,
                                                'sortby' => $sortby,
                                                'sortbyhotels' => $sortbyhotels,
                                                'sortbybloggers' => $sortbybloggers,
                                                'currentpage' => 'blog')
                        );
};

// Blog View.
$app->get('/blog/view/(:id)', function($id) use ($app) {
    $topic = Model::factory('SprTopic')->find_one($id);
    if (! $topic instanceof SprTopic) {
        $app->notFound();
    }

    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();

    $hotels = Model::factory('SprHotel')
                    ->order_by_desc('count_topic')
                    ->find_many();

    $bloger = Model::factory('SprBlogger') ->find_one($topic->bl_id);
    $topic->set('author', $bloger->name);

    $hotel = Model::factory('SprHotel') ->find_one($topic->hotel_id);
    $topic->set('hotel', $hotel->name);

    $topic->tags = explode(',', $topic->tags);


    return $app->render('blog_detail.twig', array('topic' => $topic,
                                                  'hotels' => $hotels,
                                                  'bloggers' => $bloggers,
                                                  'currentpage' => 'blog'));
});



// 
$app->get('/hotels', function() use ($app) {
    $hotelcitys = Model::factory('SprCitycountry')
                    ->order_by_desc('active')
                    ->find_many();

    foreach ($hotelcitys as $key => $value) {
        $value->set('hotels', $value->hotels()->find_many());
    }

    return $app->render('hotels_home.twig', array('hotelcitys' => $hotelcitys,
                                                  'currentpage' => 'hotels'));
});

$app->get('/hotel/(:id)', 'show_hotel') ;
$app->post('/hotel/(:id)', 'show_hotel') ;

function show_hotel($id) {
    $app = Slim::getInstance();
    $hotel = Model::factory('SprHotel')->find_one($id);
    if (! $hotel instanceof SprHotel) {
        $app->notFound();
    }

    $sortby = $app->request()->post('sortby');
    if ($sortby == "ASC") {
        $topics = $hotel->topics()->order_by_asc('id')->find_many();
    } else {
        $topics = $hotel->topics()->order_by_desc('id')->find_many();
    }
    

    foreach ($topics as $key => $value) {
        
        $bloger = Model::factory('SprBlogger') ->find_one($value->bl_id);
        $value->set('author', $bloger->name);

        $hotel = Model::factory('SprHotel') ->find_one($value->hotel_id);
        $value->set('hotel', $hotel->name);

        $value->tags = explode(',', $value->tags);

        $value->timestamp = rdate('d M Y, H:i', strtotime($value->timestamp));

    }

    $hotel->soc_links = json_decode($hotel->soc_links);

    return $app->render('hotels_detail.twig', array('hotel' => $hotel,
                                                    'topics' => $topics,
                                                    'sortby' =>$sortby,
                                                    'currentpage' => 'hotels'
                                                    )
                        );
};

// about
$app->get('/about', function() use ($app) {
    return $app->render('about.twig', array('currentpage' => 'page'));
});

// голосовалка


// 
$app->post('/topic/vote', function() use ($app) {
    // находим топик за который голосовали
    $id = $app->request()->post('topic-id');
    $topic = Model::factory('SprTopic')->find_one($id);
    if (! $topic instanceof SprTopic) {
        $app->notFound();
    }   
    $use_cookie = true; //защита от накруток
    $expires = 3600*24*31; //время жизни кук в секундах (сейчас установлено 31 день) 
    $cookie_name = 'page_'.$id;

    if($use_cookie && isset($_COOKIE[$cookie_name]))
    {
        
        $data['status'] = 'ERR';
        $data['msg'] = 'Вы уже голосовали за эту заметку';
    } else{
        $topic->count_bals = ($topic->count_bals*$topic->count_voises + floatval($app->request()->post('score')))/($topic->count_voises + 1);
        $topic->count_voises    = $topic->count_voises + 1;
        $topic->save();

        $data['status'] = 'OK';
        $data['msg'] = 'Спасибо. Ваш голос учтен.';
        if($use_cookie)
        {
            setcookie($cookie_name,$id,time() + $expires);
        }
        
    }

    echo json_encode($data);
});


// 
$app->post('/blogger/vote', function() use ($app) {
    // находим топик за который голосовали
    $id = $app->request()->post('blogger-id');
    $blogger = Model::factory('SprBlogger')->find_one($id);
    if (! $blogger instanceof SprBlogger) {
        $app->notFound();
    }   
    $use_cookie = true; //защита от накруток
    $expires = 3600*24*31; //время жизни кук в секундах (сейчас установлено 31 день) 
    $cookie_name = 'blogger_'.$id;

    if($use_cookie && isset($_COOKIE[$cookie_name]))
    {
        $data['status'] = 'ERR';
        $data['msg'] = 'Вы уже голосовали за этого блогера';
    } else{
        $blogger->count_bals = ($blogger->count_bals*$blogger->count_voises + floatval($app->request()->post('score')))/($blogger->count_voises + 1);
        $blogger->count_voises = $blogger->count_voises + 1;
        $blogger->save();

        $data['status'] = 'OK';
        $data['msg'] = 'Спасибо. Ваш голос учтен.';
        if($use_cookie)
        {
            setcookie($cookie_name,$id,time() + $expires);
        }
        
    }

    echo json_encode($data);
});
