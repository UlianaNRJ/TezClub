<?php
$app->get('/prize', function() use ($app, $db) {

    $data = array();

    return $app->render('front/prize.twig', $data);
});
