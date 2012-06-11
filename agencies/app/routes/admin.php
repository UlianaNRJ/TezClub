<?php
// Admin Home.
$app->get('/admin', $authCheck, function() use ($app) {

	$app->redirect('/admin/office');

});
