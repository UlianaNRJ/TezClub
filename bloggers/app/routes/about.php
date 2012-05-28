<?php 
$app->get('/about', function() use ($app, $db) {

    $data = array();

    return $app->render('front/about.twig', $data);
});
