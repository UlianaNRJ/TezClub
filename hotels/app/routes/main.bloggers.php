<?php 
// 
$app->get('/bloggers', function() use ($app) {
    $bloggers = Model::factory('SprBlogger')
                    ->where('active', 1)
                    ->order_by_desc('timestamp')
                    ->find_many();
    return $app->render('bloggers_all.twig', array('bloggers' => $bloggers,
                                                   'currentpage' => 'bloggers'
                                                   ));
});

// 
$app->get('/bloggers/:id(/:page)', 'show_blogger');
$app->post('/bloggers/:id(/:page)', 'show_blogger');

function show_blogger($id, $page = 1) {
    $app = Slim::getInstance();
    
    $blogger = Model::factory('SprBlogger')->where('active', 1)->find_one($id);
    if (! $blogger instanceof SprBlogger) {
        $app->notFound();
    }
    $blogger->soc_links = json_decode($blogger->soc_links);

    $bloggers = Model::factory('SprBlogger')
                    ->where('active', 1)
                    ->order_by_desc('timestamp')
                    ->find_many();

    $sortby = $app->request()->post('sortby');

    $onpage = 15;
    $page = (int) $page;
    //собираем кол-во страниц, для пагинации
    $pages = $blogger->topics()->count();
    $pages = ceil($pages / $onpage);
    $arrpage =  array();
    for ($i=0; $i < $pages; $i++) {
        $arrpage[$i]['id'] = $i+1;
        $arrpage[$i]['current'] = ($page == $i+1) ? 1 : 0;
    }

    $offset = $onpage * ($page-1) + $page-1;

    // ------------------- end  pagination 

    if ($sortby == "ASC") {
        $topics = $blogger->topics()
                ->order_by_asc('timestamp')
                ->limit($onpage)->offset($offset)
                ->find_many();
    } else {
        $topics = $blogger->topics()
                ->order_by_desc('timestamp')
                ->limit($onpage)->offset($offset)
                ->find_many();
    }

    $sortbyhotels = $app->request()->post('sortbyhotels');
    if ($sortbyhotels != "") {
        //собираем кол-во страниц, для пагинации
        $pages = $blogger->topics()
                ->order_by_asc('timestamp')
                ->where('hotel_id', $sortbyhotels)
                ->count();

        $pages = ceil($pages / $onpage);
        $arrpage =  array();
        for ($i=0; $i < $pages; $i++) {
            $arrpage[$i]['id'] = $i+1;
            $arrpage[$i]['current'] = ($page == $i+1) ? 1 : 0;
        }

        $offset = $onpage * ($page-1) + $page-1;

        // ------------------- end  pagination 

        $topics = $blogger->topics()
                ->order_by_asc('timestamp')
                ->where('hotel_id', $sortbyhotels)
                ->limit($onpage)->offset($offset)
                ->find_many();
        $sortby ='';
    }

    $sortbybloggers = $app->request()->post('sortbybloggers');
    if ($sortbybloggers != "") {
        return $app->redirect('/bloggers/'.$sortbybloggers);
    } 

    foreach ($topics as $key => $value) {
        $bloger = Model::factory('SprBlogger')->where('active', 1)->find_one($value->bl_id);
        $value->set('author', $bloger->name);
        $value->set('author_ava', $bloger->image);

        $hotel = Model::factory('SprHotel')->where('active', 1)->find_one($value->hotel_id);
        $value->set('hotel', $hotel->name);

        $value->tags = explode(',', $value->tags);

        $value->timestamp = rdate('d M Y, H:i', strtotime($value->timestamp));
    }


    $hotels = $blogger->hotels()->find_many();

    return $app->render('bloggers_detail.twig', array('blogger' => $blogger,
                                                      'bloggers' => $bloggers,
                                                      'sortby' => $sortby,
                                                      'topics' => $topics,
                                                      'hotels' => $hotels,
                                                      'pagination' =>$arrpage,
                                                      'current' => $page,
                                                      'currentpage' => 'bloggers'));
};