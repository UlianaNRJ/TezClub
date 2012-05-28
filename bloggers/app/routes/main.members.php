<?php

$app->get('/members', function() use ($app, $db) {

    $data = array('currentpage' => 'members');

    return $app->render('front/members.twig', $data);
});