<?php
// Admin City.
$app->get('/admin/metro', $authCheck, function() use ($app) {

    $metros = getMetros();

    return $app->render('back/metro.twig', array('metros' => $metros));

});

// Add GET
$app->get('/admin/metro/add', $authCheck, function() use ($app) {

    $cities = getCities();

    return $app->render('back/metro_input.twig', 
            array('action_name' => 'Добавить', 
                  'action_url' => '/admin/metro/add',
                  'cities' => $cities
                  )
        );

});

// Add POST
$app->post('/admin/metro/add', $authCheck, function() use ($app) {

	  if ($app->request()->post('cancel'))
		    $app->redirect('/admin/metro');

	  addMetro(
        array(
            "metro"=>$app->request()->post('metro'),
            "city_id"=>$app->request()->post('city')
        )
    );

    $app->redirect('/admin/metro');

});

// Edit GET
$app->get('/admin/metro/edit/(:id)', $authCheck, function($id) use ($app) {

	  $metro = getMetro($id);
    if (empty($metro)) {
        $app->notFound();
    }
    
    $cities = getCities();

    return $app->render('back/metro_input.twig', 
            array('action_name' => 'Редактировать', 
                  'action_url' => '/admin/metro/edit/' . $id,
                  'metro' => $metro,
                  'cities' => $cities
                  )
        );

});

// Edit POST
$app->post('/admin/metro/edit/(:id)', $authCheck, function($id) use ($app) {

	  if ($app->request()->post('cancel'))
		    $app->redirect('/admin/metro');

	  updateMetro(
        array( 
            "id"=>$id,
            "metro"=>$app->request()->post('metro'),
            "city_id"=>$app->request()->post('city')
        )
    );

    $app->redirect('/admin/metro');

});

// Delete GET
$app->get('/admin/metro/delete/(:id)', $authCheck, function($id) use ($app) {

	  deleteMetro($id);
    
    $app->redirect('/admin/metro');

});
