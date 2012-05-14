<?php
// index page
$app->get('/', function() use ($app, $db) {

    $data = array();

    return $app->render('front/index.twig', $data);
});
