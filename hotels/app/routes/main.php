<?php
// index page
$app->get('/', $authCheck, function() use ($app) {

    $bloggers = Model::factory('SprBlogger')
                    ->where('active', 1)
                    ->order_by_desc('timestamp')
                    ->find_many();

    $hotels = Model::factory('SprHotel')
                    ->where('active', 1)
                    ->order_by_desc('count_topic')
                    ->limit(7)
                    ->find_many();

    $topics = Model::factory('SprTopic')
                    ->where('active', 1)
                    ->order_by_desc('count_bals')
                    ->limit(3)
                    ->find_many();

    foreach ($topics as $key => $value) {
        $value->summary = trim(strip_tags($value->summary));
        $value->timestamp = rdate('d M Y, H:i', strtotime($value->timestamp));
    }

    return $app->render('index.twig', array('topics' => $topics,
                                            'hotels' => $hotels,
                                            'bloggers' => $bloggers,
                                            'currentpage' => '/'
                                            )
                        );
});
require 'main.bloggers.php';
require 'main.blog.php';
require 'main.hotels.php';
require 'main.comment.php';
require 'main.votes.php';
// about
$app->get('/about', function() use ($app) {
    return $app->render('about.twig', array('currentpage' => 'page'));
});
