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

$app->get('/bloggers/:id', function($id) use ($app, $db) {

    $blogger = $db->dbFetchObject("SELECT * 
                                FROM tc_user
                                LEFT JOIN users_ext ON (users_ext.id = tc_user.user_id) 
                                WHERE users_ext.participate = '1'
                                  AND tc_user.user_id = {$id}
                              ");

    $sql = "SELECT
          uf.user_from,
          uf.user_to
        FROM
          tc_friend as uf
        WHERE
          ( uf.user_from = {$id}
          OR
          uf.user_to = {$id} )
          AND
          (   uf.status_from + uf.status_to = 3
          OR
            (uf.status_from = 2 AND uf.status_to = 2 )
          )
          ";
    $aUsers=array();
    if ($aRows = $db->dbFetchAll($sql)) {
      foreach ($aRows as $aUser) {
        $aUsers[]=($aUser['user_from']==$id)
              ? $aUser['user_to']
              : $aUser['user_from'];
      }
    }
    $au_friends = implode("','", array_unique($aUsers));
    $sql_friends = "SELECT * 
                    FROM tc_user 
                    WHERE user_id in ('{$au_friends}') ";
    $blogger_friends = $db->dbFetchALL($sql_friends);

    foreach ($blogger_friends as $key => $value) {
      $blogger_friends[$key]['user_profile_avatar'] = str_replace('100x100', '24x24', $value['user_profile_avatar']);
    }

    $data = array('currentpage' => 'members',
                  'blogger'    => $blogger,
                  'blogger_friends' => $blogger_friends
                  );

    return $app->render('front/blogger.twig', $data);
});