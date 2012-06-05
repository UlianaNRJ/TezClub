<?php
// Admin City.
$app->get('/admin/office', $authCheck, function() use ($app) {

    $offices = getOffices();

    return $app->render('back/office.twig', array('offices' => $offices));

});

// Add GET
$app->get('/admin/office/add', $authCheck, function() use ($app) {

    $cities = getCities();
    $metros = getMetros();

    return $app->render('back/office_input.twig', 
            array('action_name' => 'Добавить', 
                  'action_url' => '/admin/office/add',
                  'cities' => $cities,
                  'metros' => $metros
                  )
        );

});

// Add POST
$app->post('/admin/office/add', $authCheck, function() use ($app) {

	if ($app->request()->post('cancel'))
		$app->redirect('/admin/office');

  if ( isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != '' ) {

        $img = "images/" . time() . ".jpg";
        move_uploaded_file($_FILES["image"]["tmp_name"], $img );

        $image = new SimpleImage();
        // делаем превью
        $image->load($img);
        $image->resize(276,181);
        $image->save($img);

        $old_image = $app->request()->post('old_image');
        if(!empty($old_image))
            unlink($old_image);
    }
    else {
      $img = $app->request()->post('old_image');
    }

	addOffice(
        array(
            "title" => $app->request()->post('title'),
            "address" => $app->request()->post('address'),
            "time" => $app->request()->post('time'),
            "phones" => $app->request()->post('phones'),
            "infocenter" => $app->request()->post('infocenter'),
            "mail" => $app->request()->post('mail'),
            "skype" => $app->request()->post('skype'),
            "latlng" => $app->request()->post('latlng'),
            "image" => $img,
            "city_id" => $app->request()->post('city'),
            "metro_id" => $app->request()->post('metro')
        )
    );

    $app->redirect('/admin/office');

});

// Edit GET
$app->get('/admin/office/edit/(:id)', $authCheck, function($id) use ($app) {

    $office = getOffice($id);
    $cities = getCities();
    $metros = getMetros();

    return $app->render('back/office_input.twig', 
            array('action_name' => 'Редактировать', 
                  'action_url' => '/admin/office/edit/' . $id,
                  'cities' => $cities,
                  'metros' => $metros,
                  'office' => $office,
                  'server_name' =>'http://'.$_SERVER['SERVER_NAME'].'/'
                  )
        );

});

// Edit POST
$app->post('/admin/office/edit/(:id)', $authCheck, function($id) use ($app) {

	  if ($app->request()->post('cancel'))
		    $app->redirect('/admin/office');

    if ( isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != '' ) {

        $img = "images/" . time() . ".jpg";
        move_uploaded_file($_FILES["image"]["tmp_name"], $img );

        $image = new SimpleImage();
        // делаем превью
        $image->load($img);
        $image->resize(276,181);
        $image->save($img);

        $old_image = $app->request()->post('old_image');
        if(!empty($old_image))
            unlink($old_image);
    }
    else {
      $img = $app->request()->post('old_image');
    }

	  updateOffice(
        array(
            "id" => $id,
            "title" => $app->request()->post('title'),
            "address" => $app->request()->post('address'),
            "time" => $app->request()->post('time'),
            "phones" => $app->request()->post('phones'),
            "infocenter" => $app->request()->post('infocenter'),
            "mail" => $app->request()->post('mail'),
            "skype" => $app->request()->post('skype'),
            "latlng" => $app->request()->post('latlng'),
            "image" => $img,
            "city_id" => $app->request()->post('city'),
            "metro_id" => $app->request()->post('metro')
        )
    );

    $app->redirect('/admin/office');

});

// Delete GET
$app->get('/admin/office/delete/(:id)', $authCheck, function($id) use ($app) {

    deleteOffice($id);
    
    $app->redirect('/admin/office');

});
