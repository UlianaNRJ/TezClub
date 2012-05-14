<?php

// добавление комментария в топик

$app->post('/topic/comment', function() use ($app) {
    // находим топик за который голосовали
    $topic_id = $app->request()->post('topic-id');
    $topic = Model::factory('SprTopic')->where('active', 1)->find_one($topic_id);
    if (! $topic instanceof SprTopic) {
        echo '{"status":0,"errors":"Нет такого топика"}';
    }

    $user_id = $app->request()->post('user-id');
    $user = Model::factory('TcUser')->where('user_id', $user_id)->find_one();
    if (! $user instanceof TcUser) {
        echo '{"status":0,"errors":"Нет такого пользователя"}';
    }
    // подменяем аватарку
    $user->user_profile_avatar = str_replace('100x100', '24x24', $user->user_profile_avatar);

    $topic->count_comments = $topic->count_comments + 1;
    $topic->save();

    // добавляем блогеру написавшему этот пост рейтинг:
    $comment = Model::factory('SprComment')->create();
    $comment->topic_id = $topic_id;
    $comment->user_id = $user_id;
    $comment->text = $app->request()->post('comment_text');
    $comment->save();

    $html = '<div class="comment-wrapper" >
                    <div class="comment" >
                        <ul class="info">
                            <li class="com_avatar">
                                <a href="http://tezclub.local/profile/"'.$user->user_login.'"/"><img alt="avatar" src="'.$user->user_profile_avatar.'"></a>
                            </li>
                            <li class="username"><a href="http://tezclub.local/profile/'.$user->user_login.'/">'.$user->user_login.'</a></li>
                            <li class="date">'.rdate('d M Y, H:i', time()).'</li>
                        </ul>
                        <div class="content" >'.$comment->text.'</div>
                    </div>
                </div>';
    echo json_encode(array('status'=>1,'html'=>$html));
});