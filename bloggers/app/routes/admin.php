<?php
// Admin Home.
$app->get('/admin', $authCheck, function() use ($app, $db) {

    return $app->render('admin.twig');

});

include "admin.finalist.php";