<?php
// проверяем автологин пользователя
if ( !empty($_COOKIE['key']) ){
    // получаем пользователя
    $session = $db->dbFetchObject("SELECT * FROM tc_session
                                      WHERE session_key = '" . $_COOKIE['key'] . "'");
    if ( !empty($session) ) {
        // достаём пользователя
        $user = $db->dbFetchObject("SELECT * FROM tc_user
                                      LEFT JOIN users_ext ON (users_ext.id = tc_user.user_id) 
                                      WHERE tc_user.user_id = '" . $session->user_id . "'");
        if (!empty($user)) {
            $user->user_profile_avatar = str_replace('100x100', '48x48', $user->user_profile_avatar);
            $app->view()->setData('userCurrent', $user);
        }
    }
    // session_security_key
    if (!empty($_COOKIE['tezclub'])) {
        $app->view()->setData('security_ls_key', md5($_COOKIE['tezclub'].'livestreet_security_key'));
    }
}

// index page
$app->get('/', function() use ($app, $db) {
        
    $bloggers = $db->dbFetchAll("SELECT * 
                                    FROM tc_user
                                    LEFT JOIN users_ext ON (users_ext.id = tc_user.user_id) 
                                    WHERE users_ext.participate = '1'
                                    ORDER BY tc_user.user_rating DESC 
                                    LIMIT 5
                                  ");

    $data = array('currentpage' => '/',
                  'bloggers'    => $bloggers
                  );

    return $app->render('front/index.twig', $data);
});

$app->get('/about', function() use ($app, $db) {

    $data = array('currentpage' => 'about');

    return $app->render('front/about.twig', $data);
});

