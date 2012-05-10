<?php
// Admin Home.
$app->get('/admin/blogger', $authCheck, function() use ($app) {
    $bloggers = Model::factory('SprBlogger')
                    ->order_by_desc('timestamp')
                    ->find_many();
                    
    return $app->render('blogger/index.twig', array('bloggers' => $bloggers));
});

// Admin Add.
$app->get('/admin/blogger/add', $authCheck, function() use ($app) {
    return $app->render('blogger/blogger_input.twig', 
            array('action_name' => 'Add', 'action_url' => '/admin/blogger/add')
        );
}); 

// Admin Add - POST.
$app->post('/admin/blogger/add', $authCheck, function() use ($app) {
    $blogger            = Model::factory('SprBlogger')->create();
    // ловим картинку
    if ( isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != '' ) {

        $_FILES["image"]["tmp_name"];

        $img = "upload/bloggers/" . time() . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $img );

        $image = new SimpleImage();
        // делаем превью
        $image->load($img);
        $image->resizeToWidth(25);
        $image->save($img.'.25');

        // делаем превью
        $image->load($img);
        $image->resizeToWidth(100);
        $image->save($img.'.100');

        // делаем превью
        $image->load($img);
        $image->resizeToWidth(225);
        $image->save($img.'.225');

        $hotel->image = $img;
    }

    $blogger->login     = $app->request()->post('login');
    $blogger->name      = $app->request()->post('name');

    $blogger->sex      = $app->request()->post('sex');
    $blogger->date_bd      = $app->request()->post('date_bd');
    $blogger->place_bd      = $app->request()->post('place_bd');
    $blogger->about   =  strip_tags($app->request()->post('about'), '<p><a><div><br><img><iframe>');

    $blogger->soc_links   = json_encode(
                                array(
                                  'fb'  => $app->request()->post('fb'),
                                  'vk'  => $app->request()->post('vk'),
                                  'lj'  => $app->request()->post('lj'),
                                  'tw'  => $app->request()->post('tw')
                                  )
                            );

    $blogger->active      = $app->request()->post('active');

    $blogger->timestamp = date('Y-m-d H:i:s');
    
    $blogger->save();
    
    $app->redirect('/admin/blogger');
});

// Admin Edit.
$app->get('/admin/blogger/edit/(:id)', $authCheck, function($id) use ($app) {
    $blogger = Model::factory('SprBlogger')->find_one($id);
    if (! $blogger instanceof SprBlogger) {
        $app->notFound();
    }   
    
    $blogger->soc_links = json_decode($blogger->soc_links);

    return $app->render('blogger/blogger_input.twig', array(
        'action_name'   =>  'Edit', 
        'action_url'    =>  '/admin/blogger/edit/' . $id,
        'blogger'       =>  $blogger,
        'server_name' =>'http://'.$_SERVER['SERVER_NAME'].'/'
    ));
});

// Admin Edit - POST.
$app->post('/admin/blogger/edit/(:id)', $authCheck, function($id) use ($app) {
    $blogger = Model::factory('SprBlogger')->find_one($id);
    if (! $blogger instanceof SprBlogger) {
        $app->notFound();
    }
    
    // ловим картинку
    if ( isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != '' ) {

        $_FILES["image"]["tmp_name"];

        $img = "upload/bloggers/" . time() . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $img );

        $image = new SimpleImage();
        // делаем превью
        $image->load($img);
        $image->resizeToWidth(25);
        $image->save($img.'.25');

        // делаем превью
        $image->load($img);
        $image->resizeToWidth(100);
        $image->save($img.'.100');

        // делаем превью
        $image->load($img);
        $image->resizeToWidth(225);
        $image->save($img.'.225');

        $blogger->image = $img;
    } 

    $blogger->login     = $app->request()->post('login');
    $blogger->name      = $app->request()->post('name');

    $blogger->sex      = $app->request()->post('sex');
    $blogger->date_bd      = $app->request()->post('date_bd');
    $blogger->place_bd      = $app->request()->post('place_bd');
    $blogger->about   =  strip_tags($app->request()->post('about'), '<p><a><div><br><img><iframe>');

    $blogger->soc_links   = json_encode(
                                array(
                                  'fb'  => $app->request()->post('fb'),
                                  'vk'  => $app->request()->post('vk'),
                                  'lj'  => $app->request()->post('lj'),
                                  'tw'  => $app->request()->post('tw')
                                  )
                            );

    $blogger->active      = $app->request()->post('active');

    $blogger->timestamp = date('Y-m-d H:i:s');
    
    $blogger->save();
    
    $app->redirect('/admin/blogger');
});

// Admin Delete.
$app->get('/admin/blogger/delete/(:id)', $authCheck, function($id) use ($app) {
    $blogger = Model::factory('SprBlogger')->find_one($id);
    if ($blogger instanceof SprBlogger) {
        $blogger->delete();
    }
    $app->redirect('/admin/blogger');
});
