<?php
// Blog Homepage.
$app->get('/blog(/:page)', 'all_blogs');
$app->post('/blog(/:page)', 'all_blogs');

function all_blogs($page = 1) {
    $app = Slim::getInstance();

    $bloggers = Model::factory('SprBlogger')
                    ->where('active', 1)
                    ->order_by_desc('timestamp')
                    ->find_many();

    $hotels = Model::factory('SprHotel')
                    ->where('active', 1)
                    ->order_by_desc('count_topic')
                    ->find_many();

    $sortby = $app->request()->post('sortby');


    $onpage = 5;
    $page = (int) $page;
    //собираем кол-во страниц, для пагинации
    $pages = Model::factory('SprTopic')->where('active', 1)->order_by_asc('timestamp')->count();
    $pages = ceil($pages / $onpage);
    $arrpage =  array();
    for ($i=0; $i < $pages; $i++) {
        $arrpage[$i]['id'] = $i+1;
        $arrpage[$i]['current'] = ($page == $i+1) ? 1 : 0;
    }

    $offset = $onpage * ($page-1);

    // ------------------- end  pagination 

    if ($sortby == "ASC") {
        $topics = Model::factory('SprTopic')
                ->where('active', 1)
                ->order_by_asc('timestamp')
                ->limit($onpage)->offset($offset)
                ->find_many();
    } else {
        $topics = Model::factory('SprTopic')
                ->where('active', 1)
                ->order_by_desc('timestamp')
                ->limit($onpage)->offset($offset)
                ->find_many();
    }

    $sortbyhotels = $app->request()->post('sortbyhotels');
    if ($sortbyhotels != "") {
        //собираем кол-во страниц, для пагинации
        $pages = Model::factory('SprTopic')
                ->where('active', 1)
                ->order_by_asc('timestamp')
                ->where('hotel_id', $sortbyhotels)
                ->count();

        $pages = ceil($pages / $onpage);
        $arrpage =  array();
        for ($i=0; $i < $pages; $i++) {
            $arrpage[$i]['id'] = $i+1;
            $arrpage[$i]['current'] = ($page == $i+1) ? 1 : 0;
        }

        $offset = $onpage * ($page-1);

        // ------------------- end  pagination 

        $topics = Model::factory('SprTopic')
                ->where('active', 1)
                ->order_by_asc('timestamp')
                ->where('hotel_id', $sortbyhotels)
                ->limit($onpage)->offset($offset)
                ->find_many();
        $sortby ='';
    }
    $sortbybloggers = $app->request()->post('sortbybloggers');
    if ($sortbybloggers != "") {
        
        //собираем кол-во страниц, для пагинации
        $pages = Model::factory('SprTopic')
                ->where('active', 1)
                ->order_by_asc('timestamp')
                ->where('bl_id', $sortbybloggers)
                ->count();

        $pages = ceil($pages / $onpage);
        $arrpage =  array();
        for ($i=0; $i < $pages; $i++) {
            $arrpage[$i]['id'] = $i+1;
            $arrpage[$i]['current'] = ($page == $i+1) ? 1 : 0;
        }

        $offset = $onpage * ($page-1);

        // ------------------- end  pagination 


        $topics = Model::factory('SprTopic')
                ->where('active', 1)
                ->order_by_asc('timestamp')
                ->where('bl_id', $sortbybloggers)
                ->limit($onpage)->offset($offset)
                ->find_many();
        $sortby ='';
        $sortbyhotels='';
    } 

    foreach ($topics as $key => $value) {
        
        $bloger = Model::factory('SprBlogger')->where('active', 1)->find_one($value->bl_id);
        $value->set('author', $bloger->name);
        $value->set('author_ava', $bloger->image);

        $hotel = Model::factory('SprHotel')->where('active', 1)->find_one($value->hotel_id);
        if ($hotel) {
            $value->set('hotel', $hotel->name);
        }

        $value->tags = explode(',', $value->tags);

        $value->timestamp = rdate('d M Y, H:i', strtotime($value->timestamp));

    }

    return $app->render('blog_home.twig', array('topics' => $topics,
                                                'hotels' => $hotels,
                                                'bloggers' => $bloggers,
                                                'sortby' => $sortby,
                                                'sortbyhotels' => $sortbyhotels,
                                                'sortbybloggers' => $sortbybloggers,
                                                'pagination' =>$arrpage,
                                                'current' => $page,
                                                'currentpage' => 'blog')
                        );
};

// Blog View.
$app->get('/blog/view/(:id)', function($id) use ($app) {
    $topic = Model::factory('SprTopic')->find_one($id);
    if (! $topic instanceof SprTopic) {
        $app->notFound();
    }

    $bloggers = Model::factory('SprBlogger')
                    ->where('active', 1)
                    ->order_by_desc('timestamp')
                    ->find_many();

    $hotels = Model::factory('SprHotel')
                    ->where('active', 1)
                    ->order_by_desc('count_topic')
                    ->find_many();

    $bloger = Model::factory('SprBlogger')->where('active', 1)->find_one($topic->bl_id);
    $topic->set('author', $bloger->name);
    $topic->set('author_ava', '/'.$bloger->image);

    $hotel = Model::factory('SprHotel')->where('active', 1)->find_one($topic->hotel_id);
    if ($hotel) {
        $topic->set('hotel', $hotel->name);
        $hotel->soc_links = json_decode($hotel->soc_links);
        $topic->set('soc_links', $hotel->soc_links);
    }


    $arimage = @unserialize($topic->image);

    if (is_array($arimage)) {
        $topic->image = $arimage;
    }

    $topic->timestamp = rdate('d M Y, H:i', strtotime($topic->timestamp));

    $topic->tags = explode(',', $topic->tags);

    $topic->comments = $topic->comments()->find_many();

    foreach ($topic->comments as $key => $value) {
        $user = Model::factory('TcUser')->where('user_id', $value->user_id)->find_one();
        $user->user_profile_avatar = str_replace('100x100', '24x24', $user->user_profile_avatar);
        $value->set('user', $user);
        $value->timestamp = rdate('d M Y, H:i', strtotime($value->timestamp));
    }

    return $app->render('blog_detail.twig', array('topic' => $topic,
                                                  'hotels' => $hotels,
                                                  'bloggers' => $bloggers,
                                                  'currentpage' => 'blog'));
});
