<?php
// Admin Home.
$app->get('/admin/hotel', $authCheck, function() use ($app) {
    $hotels = Model::factory('SprHotel')
                    ->order_by_desc('timestamp')
                    ->find_many();
                    
    return $app->render('hotel/index.twig', array('hotels' => $hotels));
});

// Admin Add.
$app->get('/admin/hotel/add', $authCheck, function() use ($app) {
    $cities = Model::factory('SprCitycountry')
                    ->where('active', 1)
                    ->order_by_asc('name')
                    ->find_many();

    $hoteltypes = Model::factory('SprHoteltype')
                    ->where('active', 1)
                    ->order_by_asc('name')
                    ->find_many();

    return $app->render('hotel/hotel_input.twig', 
            array('action_name' => 'Add', 
                  'action_url' => '/admin/hotel/add',
                  'cities' => $cities,
                  'hoteltypes' => $hoteltypes
                  )
        );
}); 

// Admin Add - POST.
$app->post('/admin/hotel/add', $authCheck, function() use ($app) {
    // ловим картинку
    
    if ( isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != '' ) {

        $_FILES["image"]["tmp_name"];

        $img = "upload/hotels/" . time() . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $img );

        $image = new SimpleImage();
        // делаем превью
        $image->load($img);
        $image->resizeToWidth(150);
        $image->save($img);

        // делаем превью
        $image->load($img);
        $image->resizeToWidth(25);
        $image->save($img.'.25');

        $hotel->image = $img;
    }

    $hotel              = Model::factory('SprHotel')->create();
    $hotel->name        = $app->request()->post('name');
    $hotel->cc_id       = $app->request()->post('city');
    $hotel->description = $app->request()->post('description');
    
    //$hotel->htype_id = $app->request()->post('hoteltype');

    $hotel->soc_links   = json_encode(
                            array(
                              'fbgroup'     => $app->request()->post('fbgroup'),
                              'vkgroup'     => $app->request()->post('vkgroup'),
                              'site'        => $app->request()->post('site'),
                              'tzturpage'   => $app->request()->post('tzturpage')
                              )
                          );
    

    $hotel->timestamp = date('Y-m-d H:i:s');

    $hotel->save();
    // id после вставки становиться ИД обьекта
    $hotel_id = $hotel->id;

    // сохраняем связанную таблицу
    foreach ($app->request()->post('hoteltype') as $key => $value) {
        $HotelHoteltype = Model::factory('SprHotelHoteltype')->create();
        $HotelHoteltype->htype_id = $value;
        $HotelHoteltype->hotel_id = $hotel_id;
        $HotelHoteltype->save();
    }

    $app->redirect('/admin/hotel');
});

// Admin Edit.
$app->get('/admin/hotel/edit/(:id)', $authCheck, function($id) use ($app) {
    $hotel = Model::factory('SprHotel')->find_one($id);
    if (! $hotel instanceof SprHotel) {
        $app->notFound();
    }

    $cities = Model::factory('SprCitycountry')
                    ->where('active', 1)
                    ->order_by_asc('name')
                    ->find_many();
    
    // выбираем список всех выбранных ранее элементов
    $hotelhoteltypes = $hotel->hoteltypes()->find_many();
    foreach ($hotelhoteltypes as $key => $value) {
        $hht[] = $value->id;
    }

    $hoteltypes = Model::factory('SprHoteltype')
                    ->where('active', 1)
                    ->order_by_asc('name')
                    ->find_many();
    
    foreach ($hoteltypes as $key => $value) {
        if (in_array($value->id, $hht))
        {
            $value->set('check', '1');
        }
    }

    $hotel->soc_links = json_decode($hotel->soc_links);
    
    return $app->render('hotel/hotel_input.twig', array(
        'action_name'   =>  'Edit', 
        'action_url'    =>  '/admin/hotel/edit/' . $id,
        'hotel'       =>  $hotel,
        'cities' =>$cities,
        'hoteltypes' =>$hoteltypes,
        'server_name' =>'http://'.$_SERVER['SERVER_NAME'].'/'
    ));
});

// Admin Edit - POST.
$app->post('/admin/hotel/edit/(:id)', $authCheck, function($id) use ($app) {
    $hotel = Model::factory('SprHotel')->find_one($id);
    if (! $hotel instanceof SprHotel) {
        $app->notFound();
    }
    
    // ловим картинку
    if ( isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != '' ) {

        $img = "upload/hotels/" . time() . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $img );

        $image = new SimpleImage();
        // делаем превью
        $image->load($img);
        $image->resizeToWidth(150);
        $image->save($img);

        // делаем превью
        $image->load($img);
        $image->resizeToWidth(25);
        $image->save($img.'.25');

        $hotel->image = $img;
    }

    $hotel->name        = $app->request()->post('name');
    $hotel->cc_id       = $app->request()->post('city');
    $hotel->description = $app->request()->post('description');

    $hotel->soc_links   = json_encode(
                            array(
                              'fbgroup'     => $app->request()->post('fbgroup'),
                              'vkgroup'     => $app->request()->post('vkgroup'),
                              'site'        => $app->request()->post('site'),
                              'tzturpage'   => $app->request()->post('tzturpage')
                              )
                          );
    
    $hotel->timestamp = date('Y-m-d H:i:s');
    $hotel->active = $app->request()->post('active');
    
    $hotel->save();

    $clearHotelHoteltype = Model::factory('SprHotelHoteltype')
                                ->where('hotel_id', $id)
                                ->find_many();

    foreach ($clearHotelHoteltype as $key => $value) {
        $mchh = Model::factory('SprHotelHoteltype')->find_one($value->id);
        if ($mchh instanceof SprHotelHoteltype) {
            $mchh->delete();
        }
    }

    // сохраняем связанную таблицу
    foreach ($app->request()->post('hoteltype') as $key => $value) {
        $HotelHoteltype = Model::factory('SprHotelHoteltype')->create();
        $HotelHoteltype->htype_id = $value;
        $HotelHoteltype->hotel_id = $id;
        $HotelHoteltype->save();
    }

    $app->redirect('/admin/hotel');
});

// Admin Delete.
$app->get('/admin/hotel/delete/(:id)', $authCheck, function($id) use ($app) {
    $hotel = Model::factory('SprHotel')->find_one($id);
    if ($hotel instanceof SprHotel) {
        $hotel->delete();
    }
    
    $app->redirect('/admin/hotel');
});


// ---------- hotel types ------------
$app->get('/admin/hoteltype', $authCheck, function() use ($app) {
    $hoteltypes = Model::factory('SprHoteltype')
                    ->order_by_desc('active')
                    ->find_many();
                    
    return $app->render('hotel/hoteltype.twig', array('hoteltypes' => $hoteltypes));
});

// Admin Add.
$app->get('/admin/hoteltype/add', $authCheck, function() use ($app) {
    return $app->render('hotel/hoteltype_input.twig', 
            array('action_name' => 'Add', 'action_url' => '/admin/hoteltype/add')
        );
}); 

// Admin Add - POST.
$app->post('/admin/hoteltype/add', $authCheck, function() use ($app) {
    $hotel            = Model::factory('SprHoteltype')->create();
    $hotel->name     = $app->request()->post('name');
    $hotel->active    = $app->request()->post('active');
    $hotel->save();
    
    $app->redirect('/admin/hoteltype');
});

// Admin Edit.
$app->get('/admin/hoteltype/edit/(:id)', $authCheck, function($id) use ($app) {
    $hoteltype = Model::factory('SprHoteltype')->find_one($id);
    if (! $hoteltype instanceof SprHoteltype) {
        $app->notFound();
    }   
    
    return $app->render('hotel/hoteltype_input.twig', array(
        'action_name'   =>  'Edit', 
        'action_url'    =>  '/admin/hoteltype/edit/' . $id,
        'hoteltype'     =>  $hoteltype
    ));
});

// Admin Edit - POST.
$app->post('/admin/hoteltype/edit/(:id)', $authCheck, function($id) use ($app) {
    $hotel = Model::factory('SprHoteltype')->find_one($id);
    if (! $hotel instanceof SprHoteltype) {
        $app->notFound();
    }
    
    $hotel->name     = $app->request()->post('name');
    $hotel->active   = $app->request()->post('active');
    $hotel->save();
    
    $app->redirect('/admin/hoteltype');
});

// Admin Delete.
$app->get('/admin/hoteltype/delete/(:id)', $authCheck, function($id) use ($app) {
    $hotel = Model::factory('SprHoteltype')->find_one($id);
    if ($hotel instanceof SprHoteltype) {
        $hotel->delete();
    }
    $app->redirect('/admin/hoteltype');
});



// hotel city

$app->get('/admin/hotelcity', $authCheck, function() use ($app) {
    $hotelcitys = Model::factory('SprCitycountry')
                    ->order_by_desc('active')
                    ->find_many();
                    
    return $app->render('hotel/hotelcity.twig', array('hotelcitys' => $hotelcitys));
});

// Admin Add.
$app->get('/admin/hotelcity/add', $authCheck, function() use ($app) {
    return $app->render('hotel/hotelcity_input.twig', 
            array('action_name' => 'Add', 'action_url' => '/admin/hotelcity/add')
        );
}); 

// Admin Add - POST.
$app->post('/admin/hotelcity/add', $authCheck, function() use ($app) {
    $hotel            = Model::factory('SprCitycountry')->create();
    $hotel->name      = $app->request()->post('name');
    $hotel->active    = $app->request()->post('active');
    $hotel->save();
    
    $app->redirect('/admin/hotelcity');
});

// Admin Edit.
$app->get('/admin/hotelcity/edit/(:id)', $authCheck, function($id) use ($app) {
    $hotelcity = Model::factory('SprCitycountry')->find_one($id);
    if (! $hotelcity instanceof SprCitycountry) {
        $app->notFound();
    }   
    
    return $app->render('hotel/hotelcity_input.twig', array(
        'action_name'   =>  'Edit', 
        'action_url'    =>  '/admin/hotelcity/edit/' . $id,
        'hotelcity'     =>  $hotelcity
    ));
});

// Admin Edit - POST.
$app->post('/admin/hotelcity/edit/(:id)', $authCheck, function($id) use ($app) {
    $hotel = Model::factory('SprCitycountry')->find_one($id);
    if (! $hotel instanceof SprCitycountry) {
        $app->notFound();
    }
    
    $hotel->name     = $app->request()->post('name');
    $hotel->active   = $app->request()->post('active');
    $hotel->save();
    
    $app->redirect('/admin/hotelcity');
});

// Admin Delete.
$app->get('/admin/hotelcity/delete/(:id)', $authCheck, function($id) use ($app) {
    $hotel = Model::factory('SprCitycountry')->find_one($id);
    if ($hotel instanceof SprCitycountry) {
        $hotel->delete();
    }
    $app->redirect('/admin/hotelcity');
});
