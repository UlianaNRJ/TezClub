<?php

$app->get('/members', function() use ($app, $db) {

    $finalists = $db->dbFetchAll("SELECT bbfin.*, tc_user.user_login, tc_user.user_profile_name
                                    FROM bb_fin_users as bbfin
                                    LEFT JOIN tc_user ON (bbfin.user_id = tc_user.user_id) 
                                    ORDER BY bbfin.mounth ASC
                                  ");

    $bloggers = $db->dbFetchAll("SELECT * 
                                    FROM tc_user
                                    LEFT JOIN users_ext ON (users_ext.id = tc_user.user_id) 
                                    WHERE users_ext.participate = '1'
                                    ORDER BY tc_user.user_rating DESC 
                                    LIMIT 20
                                  ");

    $data = array('currentpage' => 'members',
                  'bloggers'    => $bloggers,
                  'finalists'    => $finalists
                  );

    return $app->render('front/members.twig', $data);
});