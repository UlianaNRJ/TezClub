<?php
// Admin Home.
$app->get('/admin/topic', $authCheck, function() use ($app) {
    $topics = Model::factory('SprTopic')
                    ->order_by_desc('timestamp')
                    ->find_many();
    foreach ($topics as $key => $value) {
        
        $bloger = Model::factory('SprBlogger') ->find_one($value->bl_id);
        $value->set('author', $bloger->name);

        $hotel = Model::factory('SprHotel') ->find_one($value->hotel_id);
        $value->set('hotel', $hotel->name);

    }

    return $app->render('topic/index.twig', array('topics' => $topics));
});

// Admin Add.
$app->get('/admin/topic/add', $authCheck, function() use ($app) {

    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();

    $hotels = Model::factory('SprHotel')
                    ->order_by_desc('timestamp')
                    ->find_many();

    return $app->render('topic/topic_input.twig', 
                                array('action_name' => 'Add',
                                      'action_url' => '/admin/topic/add',
                                      'bloggers' => $bloggers,
                                      'hotels' => $hotels,
                                      )
        );
}); 

// Admin Add - POST.
$app->post('/admin/topic/add', $authCheck, function() use ($app) {
    $topic            = Model::factory('SprTopic')->create();
    $topic->title     = $app->request()->post('title');
    $topic->bl_id     = $app->request()->post('blogger');
    $topic->operator     = $app->request()->post('operator');
    $topic->hotel_id    = $app->request()->post('hotel');


    $topic->summary   =  strip_tags($app->request()->post('summary'), '<p><a><div><br><img><iframe>');
    $topic->content   =  strip_tags($app->request()->post('content'), '<p><a><div><br><img><iframe>');
    
    // выюираем первую картинку для вывода
    preg_match("#<img.*?src=['\"]([^\"']+\.jpg)['\"].*?/?>#i", $topic->content, $image);
    if ( isset($image) && isset($image[1]) )
    { 
        $topic->image = $image[1];
    }

    $topic->timestamp = ($app->request()->post('timestamp')) ? $app->request()->post('timestamp') : date('Y-m-d H:i:s');

    $topic->tags   = $app->request()->post('tags');
    $topic->active    = $app->request()->post('active');

    $topic->save();

    $hotelbl = Model::factory('SprHotelBlogger')
        ->where('blogger_id', $app->request()->post('blogger'))
        ->where('hotel_id', $app->request()->post('hotel'))
        ->find_one();

    if ( !$hotelbl ) {
    // сохраняем связанную таблицу
        $hotelblnew = Model::factory('SprHotelBlogger')->create();
        $hotelblnew->hotel_id = $app->request()->post('hotel');
        $hotelblnew->blogger_id = $app->request()->post('blogger');
        $hotelblnew->save();
    } else {
        $hotelbl->count = $hotelbl->count+1;
        $hotelbl->save();
    }

    // +1 Статья о отеле
    $hotel = Model::factory('SprHotel')->find_one($app->request()->post('hotel'));
    $hotel->count_topic = $hotel->count_topic + 1;
    $hotel->save();
    
    $app->redirect('/admin/topic');
});

// Admin Edit.
$app->get('/admin/topic/edit/(:id)', $authCheck, function($id) use ($app) {
    $topic = Model::factory('SprTopic')->find_one($id);
    if (! $topic instanceof SprTopic) {
        $app->notFound();
    }   
    
    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();

    $hotels = Model::factory('SprHotel')
                    ->order_by_desc('timestamp')
                    ->find_many();

    return $app->render('topic/topic_input.twig', array(
        'action_name' => 'Edit', 
        'action_url'  => '/admin/topic/edit/' . $id,
        'topic'       => $topic,
        'bloggers'    => $bloggers,
        'hotels'      => $hotels
    ));
});

// Admin Edit - POST.
$app->post('/admin/topic/edit/(:id)', $authCheck, function($id) use ($app) {
    $topic = Model::factory('SprTopic')->find_one($id);
    if (! $topic instanceof SprTopic) {
        $app->notFound();
    }

    $topic->title     = $app->request()->post('title');
    $topic->bl_id     = $app->request()->post('blogger');
    $topic->operator     = $app->request()->post('operator');
    // старый номер отеля
    $oldhotel = $topic->hotel_id;

    $topic->hotel_id  = $app->request()->post('hotel');


    $topic->summary   =  strip_tags($app->request()->post('summary'), '<p><a><div><br><img><iframe>');
    $topic->content   =  strip_tags($app->request()->post('content'), '<p><a><div><br><img><iframe>');
    
    // выюираем первую картинку для вывода
    preg_match("#<img.*?src=['\"]([^\"']+\.jpg)['\"].*?/?>#i", $topic->content, $image);
    if ( isset($image) && isset($image[1]) )
    { 
        $topic->image = $image[1];
    }

    $topic->timestamp = ($app->request()->post('timestamp')) ? $app->request()->post('timestamp') : date('Y-m-d H:i:s');

    $topic->tags      = $app->request()->post('tags');
    $topic->active    = $app->request()->post('active');

    $topic->save();
    // если id отеля поменялся
    if ($oldhotel != $app->request()->post('hotel')) {
        //  пересчитываем для нового
        $hotelbl = Model::factory('SprHotelBlogger')
        ->where('blogger_id', $app->request()->post('blogger'))
        ->where('hotel_id', $app->request()->post('hotel'))
        ->find_one();

        if ( !$hotelbl ) {
        // сохраняем связанную таблицу
            $hotelblnew = Model::factory('SprHotelBlogger')->create();
            $hotelblnew->hotel_id = $app->request()->post('hotel');
            $hotelblnew->blogger_id = $app->request()->post('blogger');
            $hotelblnew->save();
        } else {
            $hotelbl->count = $hotelbl->count+1;
            $hotelbl->save();
        }

        // +1 Статья о новом отеле
        $hotel = Model::factory('SprHotel')->find_one($app->request()->post('hotel'));
        $hotel->count_topic = $hotel->count_topic + 1;
        $hotel->save();

        // -1 Статья о старом отеле отеле
        $hotel = Model::factory('SprHotel')->find_one($oldhotel);
        $hotel->count_topic = $hotel->count_topic - 1;
        $hotel->save();


        //  пересчитываем для старого
        $hotelblold = Model::factory('SprHotelBlogger')
        ->where('blogger_id', $app->request()->post('blogger'))
        ->where('hotel_id', $oldhotel)
        ->find_one();

        if ( $hotelblold->count > 1 ) {
        // сохраняем связанную таблицу
            $hotelblold->count = $hotelblold->count-1;
            $hotelblold->save();
        } else {
            $hotelblold->delete();
        }

    }
    
    
    $app->redirect('/admin/topic');
});

// Admin Delete.
$app->get('/admin/topic/delete/(:id)', $authCheck, function($id) use ($app) {
    $topic = Model::factory('SprTopic')->find_one($id);
    if ($topic instanceof SprTopic) {
        $topic->delete();
    }
    
    $app->redirect('/admin/topic');
});
