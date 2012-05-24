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
        $user->user_profile_avatar = str_replace('100x100', '48x48', $user->user_profile_avatar);

        $app->view()->setData( 'userCurrent', $user );
    }
    // session_security_key
    if (isset($_COOKIE['tezclub'])) {
        $app->view()->setData('security_ls_key', md5($_COOKIE['tezclub'].'livestreet_security_key'));
    }
}


$app->get('/prize', function() use ($app, $db) {

    $data = array();

    return $app->render('prize.twig', $data);
});

$app->get('/about', function() use ($app, $db) {

    $data = array();

    return $app->render('about.twig', $data);
});
