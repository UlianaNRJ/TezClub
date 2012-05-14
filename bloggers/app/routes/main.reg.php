<?php
// registration page
$app->get('/registration', function() use ($app, $db) {

    $data = array();

    return $app->render('front/reg.twig', $data);
});


$app->post('/registration', function() use ($app, $db) {

    $data = array();

    return $app->render('front/reg.twig', $data);
});

