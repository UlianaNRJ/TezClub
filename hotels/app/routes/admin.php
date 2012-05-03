<?php
// Admin Home.
$app->get('/admin', $authCheck, function() use ($app) {
    return $app->render('admin.twig');
});
