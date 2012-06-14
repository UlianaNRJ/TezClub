<?php


// голосовалка
// 
$app->post('/hotels/topic/vote', function() use ($app) {
    // находим топик за который голосовали
    $id = $app->request()->post('topic-id');
    $topic = Model::factory('SprTopic')->where('active', 1)->find_one($id);
    if (! $topic instanceof SprTopic) {
        $app->notFound();
    }

    $votes = Model::factory('SprVotes')->where('topic_id', $id)->count();

    $use_cookie = true; //защита от накруток
    $expires = 3600*24*31; //время жизни кук в секундах (сейчас установлено 31 день) 
    $cookie_name = 'page_'.$id;

    if($use_cookie && isset($_COOKIE[$cookie_name]) OR $votes > 0)
    {
        
        $data['status'] = 'ERR';
        $data['msg'] = 'Вы уже голосовали.';
    } else{
        $topic->count_bals = ($topic->count_bals*$topic->count_voises + floatval($app->request()->post('score')))/($topic->count_voises + 1);
        $topic->count_voises = $topic->count_voises + 1;
        $topic->save();

        $data['status'] = 'OK';
        $data['msg'] = 'Спасибо, Ваш голос учтен';
        if($use_cookie)
        {
            setcookie($cookie_name,$id,time() + $expires);
        }
        $user = $app->view()->getData('userCurrent');
        // Сохраняем что пользователь проголосовал
        $usevotes = Model::factory('SprVotes')->create();
        $usevotes->topic_id = $id;
        $usevotes->vote = $app->request()->post('score');
        $usevotes->user_id = $user->user_id;
        $usevotes->save();


        // добавляем блогеру написавшему этот пост рейтинг:
        $blogger = Model::factory('SprBlogger')->where('active', 1)->find_one($topic->bl_id);
        if ( $blogger instanceof SprBlogger) {
            $blogger->count_bals = ($blogger->count_bals*$blogger->count_voises + floatval($app->request()->post('score')))/($blogger->count_voises + 1);
            $blogger->count_voises = $blogger->count_voises + 1;
            $blogger->save();
        }
        
    }

    echo json_encode($data);
});


// 
$app->post('/hotels/blogger/vote', function() use ($app) {
    // находим топик за который голосовали
    $id = $app->request()->post('blogger-id');
    $blogger = Model::factory('SprBlogger')->where('active', 1)->find_one($id);
    if (! $blogger instanceof SprBlogger) {
        $app->notFound();
    }

    $votes = Model::factory('SprVotes')->where('blogger_id', $id)->count();

    $use_cookie = true; //защита от накруток
    $expires = 3600*24*31; //время жизни кук в секундах (сейчас установлено 31 день) 
    $cookie_name = 'blogger_'.$id;

    if($use_cookie && isset($_COOKIE[$cookie_name]) OR $votes > 0)
    {
        $data['status'] = 'ERR';
        $data['msg'] = 'Вы уже голосовали.';
    } else{
        $blogger->count_bals = ($blogger->count_bals*$blogger->count_voises + floatval($app->request()->post('score')))/($blogger->count_voises + 1);
        $blogger->count_voises = $blogger->count_voises + 1;
        $blogger->save();

        $data['status'] = 'OK';
        $data['msg'] = 'Спасибо, Ваш голос учтен';
        if($use_cookie)
        {
            setcookie($cookie_name,$id,time() + $expires);
        }
        $user = $app->view()->getData('userCurrent');
        // Сохраняем что пользователь проголосовал
        $usevotes = Model::factory('SprVotes')->create();
        $usevotes->blogger_id = $id;
        $usevotes->vote = $app->request()->post('score');
        $usevotes->user_id = $user->user_id;
        $usevotes->save();
        
    }

    echo json_encode($data);
});

