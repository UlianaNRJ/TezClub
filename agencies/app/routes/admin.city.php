<?php
// Admin City.
$app->get('/admin/city', $authCheck, function() use ($app) {

	$cities = getCities();
                    
    return $app->render('back/city.twig', array('cities' => $cities));

});

// Add GET
$app->get('/admin/city/add', $authCheck, function() use ($app) {

    return $app->render('back/city_input.twig', 
            array('action_name' => 'Добавить', 
                  'action_url' => '/admin/city/add'
                  )
        );

});

// Add POST
$app->post('/admin/city/add', $authCheck, function() use ($app) {

	if ($app->request()->post('cancel'))
		$app->redirect('/admin/city');

    addCity(array("city"=>$app->request()->post('city')));

    $app->redirect('/admin/city');

});

// Edit GET
$app->get('/admin/city/edit/(:id)', $authCheck, function($id) use ($app) {

	$city = getCity($id);
    if (empty($city)) {
        $app->notFound();
    }

    return $app->render('back/city_input.twig', 
            array('action_name' => 'Редактировать', 
                  'action_url' => '/admin/city/edit/' . $id,
                  'city' => $city
                  )
        );

});

// Edit POST
$app->post('/admin/city/edit/(:id)', $authCheck, function($id) use ($app) {

	if ($app->request()->post('cancel'))
		$app->redirect('/admin/city');

    updateCity(array("id"=>$id,"city"=>$app->request()->post('city')));

    $app->redirect('/admin/city');

});

// Delete GET
$app->get('/admin/city/delete/(:id)', $authCheck, function($id) use ($app) {

	deleteCity($id);
    
    $app->redirect('/admin/city');

});
