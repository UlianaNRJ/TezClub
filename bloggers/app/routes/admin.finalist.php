<?php

$app->get('/admin/finalist', $authCheck, function() use ($app, $db) {

    $finalists = $db->dbFetchAll("SELECT * 
                                  FROM bb_fin_users
                                  LEFT JOIN tc_user ON (bb_fin_users.user_id = tc_user.user_id) 
                                  ORDER BY mounth DESC 
                                ");

    $data = array('finalists' => $finalists );

    return $app->render('back/finalists/finalists.twig', $data);

});


// Admin Add.
$app->get('/admin/finalist/add', $authCheck, function() use ($app, $db) {

    $users = $db->dbFetchAll("SELECT * 
                                FROM tc_user
                                LEFT JOIN users_ext ON (users_ext.id = tc_user.user_id) 
                                WHERE users_ext.participate = '1'
                                ORDER BY conkurs_rate DESC 
                                LIMIT 20
                            ");

    $data = array(
                'action_name' => 'Add',
                'action_url' => '/admin/finalist/add',
                'users' => $users
                );
    return $app->render('back/finalists/finalists_input.twig', $data);
}); 

// Admin Add - POST.
$app->post('/admin/finalist/add', $authCheck, function() use ($app, $db) {
    
    $sql = "INSERT INTO bb_fin_users 
                (mounth, user_id, conkurs_rate, date_add, active)
            VALUES
                (
                 '".$app->request()->post('mounth')."', 
                 '".$app->request()->post('user_id')."', 
                 '".$app->request()->post('conkurs_rate')."', 
                 '".date('Y-m-d H:i:s')."',
                 '".$app->request()->post('active')."'
                 )";
    $finalist = $db->dbExecute($sql);

    $app->redirect('/admin/finalist');
});

// Admin Edit.
$app->get('/admin/finalist/edit/(:id)', $authCheck, function($id) use ($app, $db) {

    $finalist = $db->dbFetchObject("SELECT * 
                                  FROM bb_fin_users
                                  WHERE id = '{$id}'
                                ");

    $users = $db->dbFetchAll("SELECT * 
                              FROM tc_user
                              LEFT JOIN users_ext ON (users_ext.id = tc_user.user_id) 
                              WHERE users_ext.participate = '1'
                              ORDER BY conkurs_rate DESC 
                            ");

    return $app->render('back/finalists/finalists_input.twig', array(
        'action_name'   =>  'Edit', 
        'action_url'    =>  '/admin/finalist/edit/' . $id,
        'finalist'       =>  $finalist,
        'users'       =>  $users,
        'server_name' =>'http://'.$_SERVER['SERVER_NAME'].'/'
    ));
});

// Admin Edit - POST.
$app->post('/admin/finalist/edit/(:id)', $authCheck, function($id) use ($app, $db) {
    $finalist = Model::factory('Sprfinalist')->find_one($id);
    if (! $finalist instanceof Sprfinalist) {
        $app->notFound();
    }

    $finalist->login     = $app->request()->post('login');
    $finalist->name      = $app->request()->post('name');

    $finalist->sex      = $app->request()->post('sex');
    $finalist->date_bd      = $app->request()->post('date_bd');
    $finalist->place_bd      = $app->request()->post('place_bd');
    $finalist->about   =  strip_tags($app->request()->post('about'), '<p><a><div><br><img><iframe>');

    $finalist->active      = $app->request()->post('active');

    $finalist->timestamp = date('Y-m-d H:i:s');
    
    $finalist->save();
    
    $app->redirect('/admin/finalist');
});

// Delete.
$app->get('/admin/finalist/delete/(:id)', $authCheck, function($id) use ($app, $db) {
    $finalist = $db->dbExecute("DELETE FROM bb_fin_users WHERE id='{$id}' ");

    $app->redirect('/admin/finalist');
});
