<?php
// проверяем автологин пользователя
if ( isset($_COOKIE['key']) && $_COOKIE['key'] != ''){
    // получаем пользователя
    $session = $db->dbFetchObject("SELECT * FROM tc_session
                                      WHERE session_key = '" . $_COOKIE['key'] . "'");
    if ( isset($session) && $session != null  ) {
        // достаём пользователя
        $user = $db->dbFetchObject("SELECT * FROM tc_user
                                      WHERE user_id = '" . $session->user_id . "'");
        $user->user_profile_avatar = str_replace('100x100', '48x48', $user->user_profile_avatar);
    }
    $app->view()->setData( 'userCurrent', $user );
}

// index page
$app->get('/', function() use ($app, $db) {

    $data = array();

    return $app->render('front/index.twig', $data);
});
