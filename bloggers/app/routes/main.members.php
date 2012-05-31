<?php

$app->get('/members', function() use ($app, $db) {

    $bloggers = $db->dbFetchAll("SELECT * 
                                    FROM tc_user
                                    LEFT JOIN users_ext ON (users_ext.id = tc_user.user_id) 
                                    WHERE users_ext.participate = '1'
                                    ORDER BY tc_user.user_rating DESC 
                                    LIMIT 20
                                  ");

    $data = array('currentpage' => 'members',
                  'bloggers'    => $bloggers
                  );

    return $app->render('front/members.twig', $data);
});