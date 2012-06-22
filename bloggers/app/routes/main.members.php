<?php

$app->get('/members(/:page)', function($page = 1) use ($app, $db) {

   $MonthNames=array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");

    $finalists = $db->dbFetchAll("SELECT bbfin.*, 
                                    tc_user.user_login, tc_user.user_profile_name, tc_user.user_profile_avatar
                                    FROM bb_fin_users as bbfin
                                    LEFT JOIN tc_user ON (bbfin.user_id = tc_user.user_id) 
                                    ORDER BY bbfin.mounth ASC
                                  ");

    foreach ($finalists as $key =>$value) {
        $finalists[$key]['mounth'] = $MonthNames[$finalists[$key]['mounth']];
    }
    
    $onpage = 15;
    $page = (int) $page;
    //собираем кол-во страниц, для пагинации
    $pages = $db->dbRowCount("users_ext", "users_ext.participate = '1' ORDER BY conkurs_rate DESC");
    $pages = ceil($pages / $onpage);
    $arrpage =  array();
    for ($i=0; $i < $pages; $i++) {
        $arrpage[$i]['id'] = $i+1;
        $arrpage[$i]['current'] = ($page == $i+1) ? 1 : 0;
    }

    $offset = $onpage * ($page-1);

    $bloggers = $db->dbFetchAll("SELECT * 
                                  FROM tc_user
                                  LEFT JOIN users_ext ON (users_ext.id = tc_user.user_id) 
                                  WHERE users_ext.participate = '1'
                                  ORDER BY conkurs_rate DESC 
                                  LIMIT {$offset}, {$onpage}
                                ");

    $data = array('currentpage' => 'members',
                  'bloggers'    => $bloggers,
                  'finalists'   => $finalists,
                  'pagination'  => $arrpage 
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

    // создал
    $sql_blogs_created = "SELECT blog_id as id, blog_title as title, blog_url as url
                          FROM tc_blog
                          WHERE 
                            user_owner_id = {$id}
                            AND
                            blog_type<>'personal' ";
    $blogs_created = $db->dbFetchALL($sql_blogs_created);

    // вступил
    $sql_blogs_joined = "SELECT tc_blog.blog_id as id, tc_blog.blog_title as title, tc_blog.blog_url as url
                          FROM tc_blog
                          JOIN tc_blog_user ON (tc_blog.blog_id = tc_blog_user.blog_id) 
                          WHERE 
                            tc_blog_user.user_id = {$id}
                            AND
                            tc_blog.blog_type<>'personal' ";
    $blogs_joined = $db->dbFetchALL($sql_blogs_joined);

    //echo json_encode($blogs_created);

    $data = array('currentpage' => 'members',
                  'blogger'    => $blogger,
                  'blogger_friends' => $blogger_friends,
                  'blogs_created' => $blogs_created,
                  'blogs_joined' => $blogs_joined,
                  'ROOT_URL' => ROOT_URL
                  );

    return $app->render('front/blogger.twig', $data);
});