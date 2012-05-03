<?php
// index page
$app->get('/', $authCheck, function() use ($app) {
    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();
    $hotels = Model::factory('SprHotel')
                    ->order_by_desc('count_topic')
                    ->limit(10)
                    ->find_many();

    $topics = Model::factory('SprTopic')
                    ->order_by_desc('count_bals')
                    ->limit(3)
                    ->find_many();

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
$app->get('/bloggers/(:id)', function($id) use ($app) {
    $blogger = Model::factory('SprBlogger')->find_one($id);
    if (! $blogger instanceof SprBlogger) {
        $app->notFound();
    }
    $blogger->soc_links = json_decode($blogger->soc_links);

    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();

    $topics = $blogger->topics()->find_many();

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
                                                      'topics' => $topics,
                                                      'hotels' => $hotels,
                                                      'currentpage' => 'bloggers'));
});

// Blog Homepage.
$app->get('/blog', function() use ($app) {
    $topics = Model::factory('SprTopic')
                    ->order_by_desc('timestamp')
                    ->find_many();
    return $app->render('blog_home.twig', array('topics' => $topics,
                                                'currentpage' => 'blog'));
});

// Blog View.
$app->get('/blog/view/(:id)', function($id) use ($app) {
    $topic = Model::factory('SprTopic')->find_one($id);
    if (! $topic instanceof SprTopic) {
        $app->notFound();
    }

    $bloger = Model::factory('SprBlogger') ->find_one($topic->bl_id);
    $topic->set('author', $bloger->name);

    $hotel = Model::factory('SprHotel') ->find_one($topic->hotel_id);
    $topic->set('hotel', $hotel->name);

    $topic->tags = explode(',', $topic->tags);


    return $app->render('blog_detail.twig', array('topic' => $topic,
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

$app->get('/hotel/(:id)', function($id) use ($app) {
    $hotel = Model::factory('SprHotel')->find_one($id);
    if (! $hotel instanceof SprHotel) {
        $app->notFound();
    }

    $topics = $hotel->topics()->find_many();

    foreach ($topics as $key => $value) {
        
        $bloger = Model::factory('SprBlogger') ->find_one($value->bl_id);
        $value->set('author', $bloger->name);

        $hotel = Model::factory('SprHotel') ->find_one($value->hotel_id);
        $value->set('hotel', $hotel->name);

        $value->tags = explode(',', $value->tags);

    }

    $hotel->soc_links = json_decode($hotel->soc_links);

    return $app->render('hotels_detail.twig', array('hotel' => $hotel,
                                                    'topics' => $topics,
                                                    'currentpage' => 'hotels'));
});

// about
$app->get('/about', function() use ($app) {
    return $app->render('about.twig', array('currentpage' => 'page'));
});