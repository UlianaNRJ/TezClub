<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/

/**
 * Русский языковой файл.
 * Содержит все текстовки движка.
 */
return array(
	/**
	 * Обсуждения
	 */
	'blogs' => 'Обсуждения',
	'blogs_title' => 'Название и смотритель',
	'blogs_readers' => 'Читателей',
	'blogs_rating' => 'Рейтинг',
	'blogs_owner' => 'Смотритель',
	'blogs_personal_title' => 'Обсуждение ',
	'blogs_personal_description' => 'Размышления',
	'blog_closed' => 'Закрытое обсуждение',

	'blog_no_topic' => 'Сюда еще никто не успел написать',
	'blog_rss' => 'RSS лента',
	'blog_rating' => 'Рейтинг',
	'blog_vote_count' => 'голосов',
	'blog_about' => 'Подробнее',
	/**
	 * Популярные обсуждения
	 */
	'blog_popular' => 'Популярные обсуждения',
	'blog_popular_rating' => 'Рейтинг',
	'blog_popular_all' => 'все обсуждения',
	/**
	 * Участники
	 */
	'blog_user_count' => 'участников',
	'blog_user_administrators' => 'Администраторы',
	'blog_user_moderators' => 'Команда',
	'blog_user_moderators_empty' => '',
	'blog_user_readers' => 'Читатели',
	'blog_user_readers_all' => 'Все участники обсуждения',
	'blog_user_readers_empty' => 'Обсуждение без читателей',
	/**
	 * Голосование за обсуждение
	 */
	'blog_vote_up' => 'нравится',
	'blog_vote_down' => 'не нравится',
	'blog_vote_count_text' => 'всего проголосовавших:',
	'blog_vote_error_already' => 'Вы уже голосовали за это обсуждение!',
	'blog_vote_error_self' => 'Вы не можете голосовать за свое обсуждение!',
	'blog_vote_error_acl' => 'У вас не хватает рейтинга для голосования!',
	'blog_vote_error_close' => 'Вы не можете голосовать за закрытое обсуждение',
	'blog_vote_ok' => 'Ваш голос учтен',
	/**
	 * Вступление и выход из обсуждение
	 */
	'blog_join' => 'присоедениться к обсуждению',
	'blog_join_ok' => 'Вы присоеденились к обсуждению',
	'blog_join_error_invite' => 'Присоединиться к этому обсуждению можно только по приглашению!',
	'blog_join_error_self' => 'Вы - создатель обсуждения!',
	'blog_leave' => 'покинуть обсуждение',
	'blog_leave_ok' => 'Вы покинули обсуждение',
	'blog_join_leave' => 'Вступить/Покинуть',
	/**
	 * Меню обсуждений
	 */
	'blog_menu_all' => 'Все',
	'blog_menu_all_good' => 'Хорошие',
	'blog_menu_all_new' => 'Новые',
	'blog_menu_all_list' => 'Все обсуждения',
	'blog_menu_collective' => 'По рейтингу',
	'blog_menu_collective_good' => 'Хорошие',
	'blog_menu_collective_new' => 'Новые',
	'blog_menu_collective_bad' => 'Плохие',
	'blog_menu_personal' => ' ',
	'blog_menu_personal_good' => 'Хорошие',
	'blog_menu_personal_new' => 'Новые',
	'blog_menu_personal_bad' => 'Плохие',
	'blog_menu_top' => 'ТОП',
	'blog_menu_top_blog' => 'Обсуждения',
	'blog_menu_top_topic' => 'Главное',
	'blog_menu_top_comment' => 'Комментарии',
	'blog_menu_top_period_24h' => 'За 24 часа',
	'blog_menu_top_period_7d' => 'За 7 дней',
	'blog_menu_top_period_30d' => 'За 30 дней',
	'blog_menu_top_period_all' => 'За все время',
	'blog_menu_create' => 'Создать обсуждение',
	/**
	 * Создание/редактирование обсуждения
	 */
	'blog_edit' => 'Редактировать',
	'blog_delete' => 'Удалить',
	'blog_create' => 'Создание нового обсуждения',
	'blog_create_acl' => 'Вы еще не достаточно окрепли, чтобы создавать свои обсуждения',
	'blog_create_title' => 'Название обсуждения',
	'blog_create_title_notice' => 'Название обсуждения должно быть наполнено смыслом, чтобы можно было понять, Чему оно посвящено.',
	'blog_create_title_error' => 'Название обсуждения должно быть от 2 до 200 символов',
	'blog_create_title_error_unique' => 'Обсуждение с таким названием уже существует',
	'blog_create_url' => 'URL обсуждения',
	'blog_create_url_notice' => 'URL обсуждения, по которому он будет доступен. Может содержать только буквы латинского алфавита, цифры, дефис; пробелы будут заменены на "_". По смыслу URL  должен совпадать с названием обсуждения, после его создания редактирование этого параметра будет недоступно',
	'blog_create_url_error' => 'URL обсуждения должен быть от 2 до 50 символов и только на латинице + цифры и знаки "-", "_"',
	'blog_create_url_error_badword' => 'URL обсуждения должен отличаться от:',
	'blog_create_url_error_unique' => 'Обсуждение с таким URL уже существует',
	'blog_create_description' => 'Описание обсуждения',
	'blog_create_description_notice' => 'Можно использовать html-теги',
	'blog_create_description_error' => 'Текст описания обсуждения должен быть от 10 до 3000 символов',
	'blog_create_type' => 'Тип обсуждения',
	'blog_create_type_open' => 'Открытое',
	'blog_create_type_close' => 'Закрытое',
	'blog_create_type_open_notice' => 'Открытое — к этому обсуждению может присоединиться любой желающий, топики видны всем',
	'blog_create_type_close_notice' => 'Закрытое — присоединиться можно только по приглашению администрации обсуждения, топики видят только подписчики',
	'blog_create_type_error' => 'Неизвестный тип обсуждения',
	'blog_create_rating' => 'Ограничение по рейтингу',
	'blog_create_rating_notice' => 'Рейтинг, который необходим пользователю, чтобы участвовать в этом обсуждении',
	'blog_create_rating_error' => 'Значение ограничения рейтинга должно быть числом',
	'blog_create_avatar' => 'Аватар',
	'blog_create_avatar_error' => 'Не удалось загрузить аватар',
	'blog_create_avatar_delete' => 'удалить',
	'blog_create_submit' => 'Сохранить',
	'blog_create_submit_notice' => 'После нажатия на кнопку «Сохранить» обсуждение будет создано',
	/**
	 * Управление обсуждением
	 */
	'blog_admin' => 'Управление обсуждением',
	'blog_admin_not_authorization' => 'Для того, чтобы изменить обсуждение, сначала нужно войти под своим аккаунтом.',
	'blog_admin_profile' => 'Профиль',
	'blog_admin_users' => 'Пользователи',
	'blog_admin_users_administrator' => 'администратор',
	'blog_admin_users_moderator' => 'команда',
	'blog_admin_users_reader' => 'читатель',
	'blog_admin_users_bun' => 'забаненный',
	'blog_admin_users_current_administrator' => 'это вы &mdash; настоящий администратор!',
	'blog_admin_users_empty' => 'в обсуждении никто не участвует',
	'blog_admin_users_submit' => 'сохранить',
	'blog_admin_users_submit_notice' => 'После нажатия на кнопку «Сохранить» права пользователей будут сохранены',
	'blog_admin_users_submit_ok' => 'Права сохранены',
	'blog_admin_users_submit_error' => 'Что-то не так',

	'blog_admin_delete_confirm' => 'Вы уверены, что хотите удалить обсуждение?',
	'blog_admin_delete_move' => 'Переместить топики в обсуждение',
	'blog_delete_clear' => 'Удалить топики',
	'blog_admin_delete_success' => 'Обсуждение успешно удалено',
	'blog_admin_delete_not_empty' => 'Вы не можете удалить обсуждение с записями. Предварительно удалите из обсуждения все записи.',
	'blog_admin_delete_move_error' => 'Не удалось переместить топики из удаляемого обсуждения',
	'blog_admin_delete_move_personal' => 'Нельзя перемещать топики в персональные размышления',

	'blog_admin_user_add_label' => 'Пригласить пользователей:',
	'blog_admin_user_invited' => 'Список приглашенных:',
	'blog_close_show' => 'Это закрытое обсуждение, у вас нет прав на просмотр контента',
	'blog_user_invite_add_self' => 'Нельзя отправить инвайт самому себе',
	'blog_user_invite_add_ok' => 'Пользователю %%login%% отправлено приглашение',
	'blog_user_already_invited' => 'Пользователю %%login%% уже отправлен инвайт',
	'blog_user_already_exists' => 'Пользователь %%login%% уже участвует в обсуждении',
	'blog_user_already_reject' => 'Пользователь %%login%% отклонил инвайт',
	'blog_user_invite_title' => "Приглашение стать участником обсуждения  '%%blog_title%%'",
	'blog_user_invite_text' => "Пользователь %%login%% приглашает вас стать участником закрытого обсуждения '%%blog_title%%'.<br/><br/><a href='%%accept_path%%'>Принять</a> - <a href='%%reject_path%%'>Отклонить</a>",
	'blog_user_invite_already_done' => 'Вы уже являетесь участником обсуждения',
	'blog_user_invite_accept' => 'Приглашение принято',
	'blog_user_invite_reject' => 'Приглашение отклонено',
	'blog_user_invite_readd' => 'повторить',

	/**
	 * Топики
	 */
	'topic_title' => 'Топики',
	'topic_read_more' => 'Читать дальше',
	'topic_date' => 'дата',
	'topic_user' => 'авторский текст',
	'topic_time_limit' => 'Вам нельзя создавать топики слишком часто',
	'topic_comment_read' => 'читать комментарии',
	'topic_comment_add' => 'Оставить комментарий',
	'topic_comment_add_title' => 'написать комментарий',
	'topic_comment_add_text_error' => 'Текст комментария должен быть от 2 до 3000 символов и не содержать разного рода каку',
	'topic_comment_acl' => 'Ваш рейтинг слишком мал для написания комментариев',
	'topic_comment_limit' => 'Вам нельзя писать комментарии слишком часто',
	'topic_comment_notallow' => 'Автор топика запретил добавлять комментарии',
	'topic_comment_spam' => 'Стоп! Спам!',
	'topic_unpublish' => 'топик находится в черновиках',
	'topic_favourite_add' => 'добавить в избранное',
	'topic_favourite_add_ok' => 'Топик добавлен в избранное',
	'topic_favourite_add_no' => 'Этого топика нет в вашем избранном',
	'topic_favourite_add_already' => 'Этот топик уже есть в вашем избранном',
	'topic_favourite_del' => 'удалить из избранного',
	'topic_favourite_del_ok' => 'Топик удален из избранного',
	'error_favorite_topic_is_draft' => 'Топик из черновиков нельзя добавить в избранное',
	'block_stream_comments_all' => 'Весь эфир',
	'block_stream_topics_all' => 'Весь эфир',
	'comments_all' => 'Горячие обсуждения',
	/**
	 * Меню топиков
	 */
	'topic_menu_add' => 'Новые',
	'topic_menu_add_topic' => 'Топик',
	'topic_menu_add_question' => 'Опрос',
	'topic_menu_add_link' => 'Ссылка',
         'topic_menu_add_photoset' => 'Фотоальбом',
	'topic_menu_saved' => 'Черновики',
	'topic_menu_published' => 'Опубликованные',
	/**
	 * Создание топика
	 */
	'topic_topic_create' => 'Создание топика',
	'topic_topic_edit' => 'Редактирование топика',
	'topic_create' => 'написать',
	'topic_create_blog' => 'В какое обсуждение публикуем?',
	'topic_create_blog_personal' => 'мои персональные размышления',
	'topic_create_blog_error_unknown' => 'Пытаетесь запостить топик в неизвестное обсуждение?',
	'topic_create_blog_error_nojoin' => 'Вы не участвуете в этом обсуждении!',
	'topic_create_blog_error_noacl' => 'Вы еще недостаточно окрепли, чтобы постить в это обсуждение',
	'topic_create_blog_error_noallow' => 'Вы не можете писать в это обсуждение',
	'topic_create_title' => 'Заголовок',
	'topic_create_title_notice' => 'Заголовок должен быть наполнен смыслом, чтобы можно было понять, о чем будет топик.',
	'topic_create_title_error' => 'Название топика должно быть от 2 до 200 символов',
	'topic_create_text' => 'Текст',
	'topic_create_text_notice' => 'Доступны html-теги',
	'topic_create_text_error' => 'Текст топика должен быть от 2 до 15000 символов',
	'topic_create_text_error_unique' => 'Вы уже писали топик с таким содержанием',
	'topic_create_tags' => 'Метки',
	'topic_create_tags_notice' => 'Метки нужно разделять запятой. Например: tez tour, рейтинг, султанахмет, фото, стамбул.',
	'topic_create_tags_error_bad' => 'Проверьте правильность меток',
	'topic_create_tags_error' => 'Метки топика должны быть от 2 до 50 символов с общей длиной не более 500 символов',
	'topic_create_forbid_comment' => 'запретить комментировать',
	'topic_create_forbid_comment_notice' => 'Если отметить эту галку, то нельзя будет оставлять комментарии к топику',
	'topic_create_publish_index' => 'принудительно вывести на главную',
	'topic_create_publish_index_notice' => 'Если отметить эту галку, то топик сразу попадёт на главную страницу (опция доступна только администраторам)',
	'topic_create_submit_publish' => 'опубликовать',
	'topic_create_submit_save' => 'сохранить в черновиках',
	'topic_create_submit_preview' => 'предпросмотр',
	'topic_create_submit_notice' => 'Если нажать кнопку «Сохранить в черновиках», текст топика будет виден только Вам, а рядом с его заголовком будет отображаться замочек. Чтобы топик был виден всем, нажмите «Опубликовать».',
	'topic_create_notice' => 'Не забывайте: тег <cut> сокращает длинные записи, скрывая их целиком или частично под ссылкой («читать дальше»). Скрытая часть не видна в обсуждениях, но доступна в полной записи на странице топика.',
	'topic_create_error' => 'Возникли технические неполадки при добавлении топика. Пожалуйста, повторите позже.',

	'topic_edit' => 'Редактировать',
	'topic_delete' => 'Удалить',
	'topic_delete_confirm' => 'Вы действительно хотите удалить топик?',
	/**
	 * Топик-ссылка
	 */
	'topic_link' => 'топик-ссылка',
	'topic_link_title' => 'Ссылки',
	'topic_link_title_edit' => 'Редактирование ссылки',
	'topic_link_title_create' => 'Добавление ссылки',
	'topic_link_create' => 'Создание топика-ссылки',
	'topic_link_edit' => 'Редактирование топика-ссылки',
	'topic_link_count_jump' => 'переходов по ссылке',
	'topic_link_create_url' => 'Ссылка',
	'topic_link_create_url_notice' => 'Например, http://livestreet.ru/blog/dev_livestreet/113.html',
	'topic_link_create_url_error' => 'Ссылка должна быть от 2 до 200 символов',
	'topic_link_create_text' => 'Краткое описание (максимум 500 символов, HTML-теги запрещены)',
	'topic_link_create_text_notice' => 'HTML-теги запрещены',
	'topic_link_create_text_error' => 'Описание ссылки должно быть от 10 до 500 символов',
	/**
	 * Топик-опрос
	 */
	'topic_question_title' => 'Опросы',
	'topic_question_title_edit' => 'Редактирование опроса',
	'topic_question_title_create' => 'Добавление опроса',
	'topic_question_vote' => 'голосовать',
	'topic_question_vote_ok' => 'Ваш голос учтен.',
	'topic_question_vote_already' => 'Ваш голос уже учтен!',
	'topic_question_vote_result' => 'Проголосовало',
	'topic_question_abstain' => 'воздержаться',
	'topic_question_abstain_result' => 'Воздержалось',
	'topic_question_create' => 'Создание топика-опроса',
	'topic_question_edit' => 'Редактирование топика-опроса',
	'topic_question_create_title' => 'Вопрос',
	'topic_question_create_title_notice' => 'Вопрос должен быть наполнен смыслом, чтобы можно было понять, о чем будет опрос.',
	'topic_question_create_title_error' => 'Вопрос должен быть от 2 до 200 символов',
	'topic_question_create_answers' => 'Варианты ответов',
	'topic_question_create_answers_add' => 'Добавить вариант',
	'topic_question_create_answers_delete' => 'Удалить',
	'topic_question_create_answers_error' => 'Ответ должен быть от 1 до 100 символов',
	'topic_question_create_answers_error_min' => 'Вариантов ответа должно быть как минимум два',
	'topic_question_create_answers_error_max' => 'Максимально возможное число вариантов ответа 20',
	'topic_question_create_text' => 'Краткое описание (максимум 500 символов, HTML-теги запрещены)',
	'topic_question_create_text_notice' => 'HTML-теги запрещены',
	'topic_question_create_text_error' => 'Описание опроса должно быть не более 500 символов',
	/**
	 * Голосование за топик
	 */
	'topic_vote_up' => 'нравится',
	'topic_vote_down' => 'не нравится',
	'topic_vote_error_already' => 'Вы уже голосовали за этот топик!',
	'topic_vote_error_self' => 'Вы не можете голосовать за свой топик!',
	'topic_vote_error_guest' => 'для голосования необходимо авторизоваться',
	'topic_vote_error_time' => 'Срок голосования за топик истёк!',
	'topic_vote_error_acl' => 'У вас не хватает рейтинга для голосования!',
	'topic_vote_no' => 'пока никто не голосовал',
	'topic_vote_ok' => 'Ваш голос учтен',
	'topic_vote_ok_abstain' => 'Вы воздержались для просмотра рейтинга топика',
	'topic_vote_count' => 'всего проголосовало',
    
        /**
         * Фотосет
         */
         'topic_photoset_create' => 'Создание фотосета',
         'topic_photoset_edit' => 'Редактирование фотосета',
         'topic_photoset_upload_title' => 'Загрузка изображений',
         'topic_photoset_upload_choose' => 'Загрузить фото',
         'topic_photoset_upload_close' => 'Закрыть',
         'topic_photoset_upload_rules' => 'Доступна загрузка изображений в формат JPG, PNG, GIF<br />Размер изображений не должен превышать %%SIZE%% Kб<br />Максимальное число загружаемых изображений: %%COUNT%%',
         'topic_photoset_choose_image' => 'Выберите изображение для загрузки',
         'topic_photoset_is_preview' => 'Отмечено как превью к топику',
         'topic_photoset_mark_as_preview' => 'Отметить как превью',
         'topic_photoset_show_all' => 'Показать все %%COUNT%% фото',
         'topic_photoset_count_images' => 'изображение;изображения;изображений',
         'topic_photoset_show_more' => 'Показать ещё фото',
         'topic_photoset_error_count_photos' => 'В топике может быть от %%MIN%% до %%MAX%% фото',
         'topic_photoset_error_size' => 'У изображения слишком большое разрешение',
         'topic_photoset_title' => 'Фотосет',
         'topic_photoset_photo_deleted' => 'Фото удалено',
         'topic_photoset_photo_deleted_error_last' => 'Нельзя удалить последню фотографию',
         'topic_photoset_photo_delete' => 'Удалить',
         'topic_photoset_photo_delete_confirm' => 'Удалить фото?',
         'topic_photoset_photo_added' => 'Фото добавлено',
         'topic_photoset_error_too_much_photos' => 'Топик может содержать не более %%MAX%% фото',
         'topic_photoset_title_edit' => 'Редактирование фотосета',
         'topic_photoset_title_create' => 'Создание фотосета',
         'topic_photoset_error_bad_filesize' => 'Размер фото должен быть не более %%MAX%% Кб',
         'topic_photoset_photos' => 'фото',
                 
            
	/**
	 * Комментарии
	 */
	'comment_title' => 'Комментарии',
	'comment_collapse' => 'свернуть',
	'comment_expand' => 'развернуть',
	'comment_goto_parent' => 'Ответ на',
	'comment_goto_child' => 'Обратно к ответу',
	'comment_bad_open' => 'раскрыть комментарий',
	'comment_answer' => 'Ответить',
	'comment_delete' => 'Удалить',
	'comment_delete_ok' => 'Комментарий удален',
	'comment_repair' => 'Восстановить',
	'comment_repair_ok' => 'Комментарий восстановлен',
	'comment_was_delete' => 'комментарий был удален',
	'comment_add' => 'добавить',
	'comment_preview' => 'предпросмотр',
	'comment_unregistered' => 'Только зарегистрированные и авторизованные пользователи могут оставлять комментарии.',
	/**
	 * Голосование за комментарий
	 */
	'comment_vote_error' => 'Попробуйте проголосовать позже',
	'comment_vote_error_value' => 'Голосовать можно только +1 либо -1!',
	'comment_vote_error_acl' => 'У вас не хватает рейтинга для голосования!',
	'comment_vote_error_already' => 'Вы уже голосовали за этот комментарий!',
	'comment_vote_error_time' => 'Срок голосования за комментарий истёк!',
	'comment_vote_error_self' => 'Вы не можете голосовать за свой комментарий!',
	'comment_vote_error_noexists' => 'Вы голосуете за несуществующий комментарий!',
	'comment_vote_ok' => 'Ваш голос учтен',

	'comment_favourite_add' => 'добавить в избранное',
	'comment_favourite_add_ok' => 'Комментарий добавлен в избранное',
	'comment_favourite_add_no' => 'Этого комментария нет в вашем избранном',
	'comment_favourite_add_already' => 'Этот комментарий уже есть в вашем избранном',
	'comment_favourite_del' => 'удалить из избранного',
	'comment_favourite_del_ok' => 'Комментарий удален из избранного',


	/**
	 * Люди
	 */
	'people' => 'Люди',


	/**
	 * Пользователь
	 */
	'user' => 'Пользователь',
	'user_list' => 'Пользователи',
	'user_list_new' => 'Новые пользователи',
	'user_list_online_last' => 'Недавно были на сайте',
	'user_good' => 'Позитивные',
	'user_bad' => 'Негативные',
	'user_privat_messages' => 'Личные сообщения',
	'user_privat_messages_new' => 'У вас есть новые сообщения',
	'user_settings' => 'Настройки',
	'user_settings_profile' => 'профиля',
	'user_settings_tuning' => 'сайта',
	'user_login' => 'Логин или эл. почта',
	'user_login_submit' => 'Войти',
	'user_login_remember' => 'Запомнить меня',
	'user_login_bad' => 'Что-то не так! Вероятно, неправильно указан логин (e-mail) или пароль.',
	'user_password' => 'Пароль',
	'user_password_reminder' => 'Напомнить пароль',
	'user_exit_notice' => 'Обязательно приходите еще.',
	'user_authorization' => 'Авторизация',
	'user_registration' => 'Регистрация',
	'user_write_prvmsg' => 'Написать письмо',

	'user_friend_add' => 'Добавить в друзья',
	'user_friend_add_ok' => 'У вас появился новый друг',
	'user_friend_add_self' => 'Ваш друг - это вы!',
	'user_friend_del' => 'Удалить из друзей',
	'user_friend_del_ok' => 'У вас больше нет этого друга',
	'user_friend_del_no' => 'Друг не найден!',
	'user_friend_offer_reject' => 'Заявка отклонена',
	'user_friend_offer_send' => 'Заявка отправлена',
	'user_friend_already_exist' => 'Пользователь уже является вашим другом',
	'user_friend_offer_title' => 'Пользователь %%login%% приглашает вас дружить',
	'user_friend_offer_text' => "Пользователь %%login%% желает добавить вас в друзья.<br/><br/>%%user_text%%<br/><br/><a href='%%accept_path%%'>Принять</a> - <a href='%%reject_path%%'>Отклонить</a>",
	'user_friend_add_deleted' => 'Этот пользователь отказался с вами дружить',
	'user_friend_add_text_label' => 'Представьтесь:',
	'user_friend_add_submit' => 'Отправить',
	'user_friend_add_cansel' => 'Отмена',
	'user_friend_offer_not_found' => 'Заявка не найдена',
	'user_friend_offer_already_done' => 'Заявка уже обработана',
	'user_friend_accept_notice_title' => 'Ваша заявка одобрена',
	'user_friend_accept_notice_text' => 'Пользователь %%login%% согласился с вами дружить',
	'user_friend_reject_notice_title' => 'Ваша заявка отклонена',
	'user_friend_reject_notice_text' => 'Пользователь %%login%% отказался с вами дружить',
	'user_friend_del_notice_title' => 'Вас удалили из друзей',
	'user_friend_del_notice_text' => 'У вас больше нет друга %%login%%',

	'user_rating' => 'Рейтинг',
	'user_skill' => 'Сила',
	'user_date_last' => 'Последний визит',
	'user_date_registration' => 'Дата регистрации',
	'user_empty' => 'нет таких',
	'user_stats' => 'Статистика',
	'user_stats_all' => 'Всего пользователей',
	'user_stats_active' => 'Активные',
	'user_stats_noactive' => 'Заблудившиеся',
	'user_stats_sex_man' => 'Мужчины',
	'user_stats_sex_woman' => 'Женщины',
	'user_stats_sex_other' => 'Пол не указан',

	'user_not_found' => 'Пользователь <b>%%login%%</b> не найден',
	'user_not_found_by_id' => 'Пользователь <b>#%%id%%</b> не найден',

	/**
	 * Меню профиля пользователя
	 */
	'people_menu_users' => 'Пользователи',
	'people_menu_users_all' => 'Все',
	'people_menu_users_online' => 'Онлайн',
	'people_menu_users_new' => 'Новые',

	/**
	 * Регистрация
	 */
	'registration_invite' => 'Регистрация по приглашению',
	'registration_invite_code' => 'Код приглашения',
	'registration_invite_code_error' => 'Неверный код приглашения',
	'registration_invite_check' => 'Проверить код',
	'registration_activate_ok' => 'Поздравляем! Ваш аккаунт успешно активирован.',
	'registration_activate_error_code' => 'Неверный код активации!',
	'registration_activate_error_reactivate' => 'Ваш аккаунт уже активирован',
	'registration_confirm_header' => 'Активация аккаунта',
	'registration_confirm_text' => 'Вы почти зарегистрировались, осталось только активировать аккаунт. Инструкции по активации отправлены по электронной почте на адрес, указанный при регистрации.',
	'registration' => 'Регистрация',
	'registration_is_authorization' => 'Вы уже зарегистрированы у нас и даже авторизованы!',
	'registration_login' => 'Логин',
	'registration_login_error' => 'Неверный логин, допустим от 3 до 30 символов',
	'registration_login_error_used' => 'Этот логин уже занят',
	'registration_login_notice' => 'Может состоять только из букв (A-Z a-z), цифр (0-9). Знак подчеркивания (_) лучше не использовать. Длина логина не может быть меньше 3 и больше 30 символов.',
	'registration_mail' => 'Электропочта',
	'registration_mail_error' => 'Неверный формат e-mail',
	'registration_mail_error_used' => 'Этот e-mail уже используется',
	'registration_mail_notice' => 'Для проверки регистрации и в целях безопасности нам нужен адрес вашей электропочты.',
	'registration_password' => 'Пароль',
	'registration_password_error' => 'Неверный пароль, допустим от 5 символов',
	'registration_password_error_different' => 'Пароли не совпадают',
	'registration_password_notice' => 'Должен содержать не менее 5 символов и не может совпадать с логином. Не используйте простые пароли, будьте разумны.',
	'registration_password_retry' => 'Повторите пароль',
	'registration_captcha' => 'Введите цифры и буквы',
	'registration_captcha_error' => 'Неверный код',
	'registration_submit' => 'Зарегистрироваться',
	'registration_ok' => 'Поздравляем! Регистрация прошла успешно',

	/**
	 * Голосование за пользователя
	 */
	'user_vote_up' => 'нравится',
	'user_vote_down' => 'не нравится',
	'user_vote_error_already' => 'Вы уже голосовали за этого пользователя!',
	'user_vote_error_self' => 'Вы не можете голосовать за себя!',
	'user_vote_error_guest' => 'для голосования необходимо авторизоваться',
	'user_vote_error_acl' => 'У вас не хватает рейтинга для голосования!',
	'user_vote_ok' => 'Ваш голос учтен',
	'user_vote_count' => 'голосов',

	/**
	 * Меню профиля пользователя
	 */
	'user_menu_profile' => 'Профиль',
	'user_menu_profile_whois' => 'Whois',

	'user_menu_profile_favourites' => 'Избранные топики',
	'user_menu_profile_favourites_comments' => 'Избранные комментарии',

	'user_menu_profile_tags' => 'Метки',
	'user_menu_publication' => 'Публикации',
	'user_menu_publication_blog' => 'Обсуждения',
	'user_menu_publication_comment' => 'Комментарии',
	'user_menu_publication_comment_rss' => 'RSS лента',

	/**
	 * Профиль
	 */
	'profile_privat' => 'Личное',
	'profile_sex' => 'Пол',
	'profile_sex_man' => 'мужской',
	'profile_sex_woman' => 'женский',
	'profile_birthday' => 'Дата рождения',
	'profile_place' => 'Местоположение',
	'profile_about' => 'О себе',
	'profile_site' => 'Сайт',
	'profile_activity' => 'Активность',
	'profile_friends' => 'Друзья',
	'profile_friends_self' => 'В друзьях у',
	'profile_invite_from' => 'Пригласил',
	'profile_invite_to' => 'Приглашенные',
	'profile_blogs_self' => 'Создал',
	'profile_blogs_join' => 'Состоит в',
	'profile_blogs_moderation' => 'Модерирует',
	'profile_blogs_administration' => 'Администрирует',
	'profile_date_registration' => 'Зарегистрирован',
	'profile_date_last' => 'Последний визит',
	'profile_social_contacts' => 'Контакты и социальные сервисы',

        /**
         * UserFields
         */
        'user_field_admin_title' => 'Поля контактов пользователей',
        'user_field_add' => 'Добавить',
        'user_field_cancel' => 'Отмена',
        'user_field_added' => 'Поле успешно добавлено',
        'user_field_update' => 'Изменить',
        'user_field_updated' => 'Поле успешно изменено',
        'user_field_delete' => 'Удалить',
        'user_field_delete_confirm' => 'Удалить поле?',
        'user_field_deleted' => 'Поле удалено',
        'userfield_form_name' => 'Имя',
        'userfield_form_title' => 'Заголовок',
        'userfield_form_pattern' => 'Шаблон (значение подставляется в токен {*})',
        'user_field_error_add_no_name' => 'Необходимо указать название поля',
        'user_field_error_add_no_title' => 'Необходимо указать заголовок поля',
        'user_field_error_name_exists' => 'Поле с таким именем уже существует',


	/**
	 * Настройки
	 */
	'settings_profile_edit' => 'Изменение профиля',
	'settings_profile_name' => 'Имя',
	'settings_profile_name_notice' => 'Длина имени не может быть меньше 2 и больше 20 символов.',
	'settings_profile_mail' => 'E-mail',
	'settings_profile_mail_error' => 'Неверный формат e-mail',
	'settings_profile_mail_error_used' => 'Этот емайл уже занят',
	'settings_profile_mail_notice' => 'Ваш реальный почтовый адрес, на него будут приходить уведомления',
	'settings_profile_sex' => 'Пол',
	'settings_profile_sex_man' => 'мужской',
	'settings_profile_sex_woman' => 'женский',
	'settings_profile_sex_other' => 'не скажу',
	'settings_profile_birthday' => 'Дата рождения',
	'settings_profile_country' => 'Страна',
	'settings_profile_city' => 'Город',
	'settings_profile_icq' => 'ICQ',
	'settings_profile_site' => 'Сайт',
	'settings_profile_site_url' => 'URL сайта',
	'settings_profile_site_name' => 'название сайта',
	'settings_profile_about' => 'О себе',
	'settings_profile_password_current' => 'Текущий пароль',
	'settings_profile_password_current_error' => 'Неверный текущий пароль',
	'settings_profile_password_new' => 'Новый пароль',
	'settings_profile_password_new_error' => 'Неверный пароль, допустим от 5 символов',
	'settings_profile_password_confirm' => 'Еще раз новый пароль',
	'settings_profile_password_confirm_error' => 'Пароли не совпадают',
	'settings_profile_avatar' => 'Аватар',
	'settings_profile_avatar_error' => 'Не удалось загрузить аватар',
	'settings_profile_avatar_delete' => 'удалить',
	'settings_profile_foto' => 'Фото',
	'settings_profile_foto_error' => 'Не удалось загрузить фото',
	'settings_profile_foto_delete' => 'удалить',
	'settings_profile_submit' => 'сохранить профиль',
	'settings_profile_submit_ok' => 'Профиль успешно сохранён',
	'settings_invite' => 'Управление приглашениями',
	'settings_invite_available' => 'Доступно',
	'settings_invite_available_no' => 'У вас пока нет доступных инвайтов',
	'settings_invite_used' => 'Использовано',
	'settings_invite_mail' => 'Пригласить по e-mail адресу',
	'settings_invite_mail_error' => 'Неверный формат e-mail',
	'settings_invite_mail_notice' => 'На этот e-mail будет выслано приглашение для регистрации',
	'settings_invite_many' => 'много',
	'settings_invite_submit' => 'отправить приглашение',
	'settings_invite_submit_ok' => 'Приглашение отправлено',
	'settings_tuning' => 'Настройки сайта',
	'settings_tuning_notice' => 'Уведомления на e-mail',
	'settings_tuning_notice_new_topic' => 'при новом топике в обсуждениии',
	'settings_tuning_notice_new_comment' => 'при новом комментарии в топике',
	'settings_tuning_notice_new_talk' => 'при новом личном сообщении',
	'settings_tuning_notice_reply_comment' => 'при ответе на комментарий',
	'settings_tuning_notice_new_friend' => 'при добавлении вас в друзья',
	'settings_tuning_submit' => 'сохранить настройки',
	'settings_tuning_submit_ok' => 'Настройки успешно сохранены',


	/**
	 * Меню настроек
	 */
	'settings_menu' => 'Настройки',
	'settings_menu_profile' => 'Профиль',
	'settings_menu_tuning' => 'Тюнинг',
	'settings_menu_invite' => 'Инвайты',

	/**
	 * Восстановление пароля
	 */
	'password_reminder' => 'Восстановление пароля',
	'password_reminder_email' => 'Ваш e-mail',
	'password_reminder_submit' => 'Получить ссылку на изменение пароля',
	'password_reminder_send_password' => 'Новый пароль отправлен на ваш адрес электронной почты.',
	'password_reminder_send_link' => 'Ссылка для восстановления пароля отправлена на ваш адрес электронной почты.',
	'password_reminder_bad_code' => 'Неверный код на восстановление пароля.',
	'password_reminder_bad_email' => 'Пользователь с таким e-mail не найден',

	/**
	 * Панель
	 */
	'panel_b' => 'жирный',
	'panel_i' => 'курсив',
	'panel_u' => 'подчеркнутый',
	'panel_s' => 'зачеркнутый',
	'panel_url' => 'вставить ссылку',
	'panel_url_promt' => 'Введите ссылку',
	'panel_image_promt' => 'Введите ссылку на изображение',
	'panel_code' => 'код',
	'panel_video' => 'видео',
	'panel_video_promt' => 'Введите ссылку на видео',
	'panel_image' => 'изображение',
	'panel_cut' => 'кат',
	'panel_quote' => 'цитировать',
	'panel_list' => 'Список',
	'panel_list_ul' => 'UL LI',
	'panel_list_ol' => 'OL LI',
	'panel_list_li' => 'пункт списка',
	'panel_title' => 'Заголовок',
	'panel_title_h4' => 'H4',
	'panel_title_h5' => 'H5',
	'panel_title_h6' => 'H6',
	'panel_clear_tags' => 'очистить от тегов',
	'panel_user' => 'вставить пользователя',
	'panel_user_promt' => 'Введите логин пользователя',

	/**
	 * Блоки
	 */
	'block_city_tags' => 'Города',
	'block_country_tags' => 'Страны',
	'block_blog_info' => 'Описание обсуждения',
	'block_blog_info_note' => 'Заметка',
	'block_blog_info_note_text' => '<strong>Тег &lt;cut&gt; сокращает длинные записи</strong>, скрывая их целиком или частично под ссылкой («читать дальше»). Скрытая часть не видна в обсуждении, но доступна в полной записи на странице топика.',
	'block_blogs' => 'Обсуждения',
	'block_blogs_top' => 'Топ',
	'block_blogs_join' => 'Подключенные',
	'block_blogs_join_error' => 'Вы не участвуете в обсуждениях',
	'block_blogs_self' => 'Мои',
	'block_blogs_self_error' => 'У вас нет своих обсуждений',
	'block_blogs_all' => 'Все обсуждния',
	'block_stream' => 'Горячие обсуждения',
	'block_stream_topics' => 'Публикации',
	'block_stream_topics_no' => 'Нет топиков.',
	'block_stream_comments' => 'Комментарии',
	'block_stream_comments_no' => 'Нет комментариев.',
	'block_stream_comments_all' => 'Весь эфир',

	'block_friends' => 'Друзья',
	'block_friends_check' => 'Отметить всех',
	'block_friends_uncheck' => 'Снять отметку',
	'block_friends_empty' => 'Список ваших друзей пуст',

	'site_history_back' => 'Вернуться назад',
	'site_go_main' => 'перейти на главную',

	/**
	 * Поиск
	 */
	'search' => 'Поиск',
	'search_submit' => 'Найти',
	'search_results' => 'Результаты поиска',
	'search_results_empty' => 'Удивительно, но поиск не дал результатов',
	'search_results_count_topics' => 'топиков',
	'search_results_count_comments' => 'комментариев',

	/**
	 * Почта
	 */
	'talk_menu_inbox' => 'Почтовый ящик',
	'talk_menu_inbox_list' => 'Переписка',
	'talk_menu_inbox_create' => 'Новое письмо',
	'talk_menu_inbox_favourites' => 'Избранное',
	'talk_inbox' => 'Почтовый ящик',
	'talk_inbox_target' => 'Адресаты',
	'talk_inbox_title' => 'Тема',
	'talk_inbox_date' => 'Дата',
	'talk_inbox_delete' => 'Удалить переписку',
	'talk_inbox_delete_confirm' => 'Действительно удалить переписку?',
	'talk_comments' => 'Переписка',
	'talk_comment_add_text_error' => 'Текст комментария должен быть от 2 до 3000 символов',
	'talk_create' => 'Новое письмо',
	'talk_create_users' => 'Кому',
	'talk_create_users_error' => 'Необходимо указать, кому вы хотите отправить сообщение',
	'talk_create_users_error_not_found' => 'У нас нет пользователя с логином',
	'talk_create_title' => 'Заголовок',
	'talk_create_title_error' => 'Заголовок сообщения должен быть от 2 до 200 символов',
	'talk_create_text' => 'Сообщение',
	'talk_create_text_error' => 'Текст сообщения должен быть от 2 до 3000 символов',
	'talk_create_submit' => 'Отправить',
	'talk_time_limit' => 'Вам нельзя отправлять инбоксы слишком часто',

	'talk_favourite_inbox' => 'Избранные письма',
	'talk_favourite_add' => 'добавить в избранное',
	'talk_favourite_add_ok' => 'Письмо добавлено в избранное',
	'talk_favourite_add_no' => 'Этого письма нет в вашем избранном',
	'talk_favourite_add_already' => 'Это письмо уже есть в вашем избранном',
	'talk_favourite_del' => 'удалить из избранного',
	'talk_favourite_del_ok' => 'Письмо удалено из избранного',
	'talk_favourite_empty' => 'Нет писем в избранном',

	'talk_filter_title' => 'Фильтровать',
	'talk_filter_erase' => 'Сбросить фильтр',
	'talk_filter_erase_form' => 'Очистить форму',
	'talk_filter_label_sender' => 'Отправитель',
	'talk_filter_label_keyword' => 'Искать в заголовке',
	'talk_filter_label_date' => 'Ограничения по дате',
	'talk_filter_notice_sender' => 'Укажите логин отправителя',
	'talk_filter_notice_keyword' => 'Введите одно или несколько слов',
	'talk_filter_notice_date' => 'Дата вводится в формате 25.12.2008',
	'talk_filter_submit' => 'Отфильтровать',
	'talk_filter_error' => 'Ошибка фильтрации',
	'talk_filter_error_date_format' => 'Указан неверный формат даты',
	'talk_filter_result_count' => 'Найдено писем: %%count%%',
	'talk_filter_result_empty' => 'По вашим критериям писем не найдено',

	'talk_user_in_blacklist' => 'Пользователь <b>%%login%%</b> не принимает от вас писем',
	'talk_blacklist_title' => 'Не принимать писем от:',
	'talk_blacklist_empty' => 'Принимать от всех',
	'talk_balcklist_add_label' => 'Добавить пользователей',
	'talk_balcklist_add_notice' => 'Введите один или несколько логинов',
	'talk_balcklist_add_submit' => 'Не принимать',
	'talk_blacklist_add_ok' => 'Пользователь <b>%%login%%</b> успешно добавлен',
	'talk_blacklist_user_already_have' => 'Пользователь <b>%%login%%</b> есть в вашем black list`е',
	'talk_blacklist_delete_ok' => 'Пользователь <b>%%login%%</b> успешно удален',
	'talk_blacklist_user_not_found' => 'Пользователя <b>%%login%%</b> нет в вашем black list`е',
	'talk_blacklist_add_self' => 'Нельзя добавлять в black list себя',

	'talk_speaker_title' => 'Участники разговора',
	'talk_speaker_add_label' => 'Добавить пользователя',
	'talk_speaker_delete_ok' => 'Участник <b>%%login%%</b> успешно удален',
	'talk_speaker_user_not_found' => 'Пользователь <b>%%login%%</b> не участвует в разговоре',
	'talk_speaker_user_already_exist' => ' <b>%%login%%</b> уже участник разговора',
	'talk_speaker_add_ok' => 'Участник <b>%%login%%</b> успешно добавлен',
	'talk_speaker_delete_by_self' => 'Участник <b>%%login%%</b> удалил этот разговор',
	'talk_speaker_add_self' => 'Нельзя добавлять в участники себя',

	'talk_not_found' => 'Разговор не найден',

    /**
     * Userfeed
     */
    'userfeed_block_blogs_title' => 'Обсуждения',
    'userfeed_block_users_title' => 'Люди',
    'userfeed_block_users_append' => 'Добавить',
    'userfeed_block_users_friends' => 'Друзья',
    'userfeed_subscribes_already_subscribed' => 'Вы уже подписаны на топики этого пользователя',
    'userfeed_subscribes_updated' => 'Настройки ленты сохранены',
    'userfeed_get_more' => 'Получить ещё топики',
	
	'userfeed_title' => 'Лента',
	
    'userfeed_settings_note_follow_blogs' => 'Выберите обсуждения в которых вы хотели бы участвовать',
    'userfeed_settings_note_follow_user' => 'Добавьте людей, топики которых вы хотели бы читать',
    'userfeed_settings_note_follow_friend' => 'Выберите друзей, топики которых вы хотели бы читать',
    
    'userfeed_no_subscribed_users' => 'Вы ещё не подписались на пользователей, чьи топики хотите видеть',
    'userfeed_no_blogs' => 'Вы не вступили ни в одино обсуждение',
    'userfeed_error_subscribe_to_yourself' => 'Вы не можете подписаться на себя',

    /**
     * Stream
     */
    'stream_block_config_title' => 'Настройка событий',
    'stream_block_users_title' => 'Люди',
    'stream_block_config_append' => 'Добавить',
    'stream_block_users_friends' => 'Друзья',
    'stream_subscribes_already_subscribed' => 'Вы уже подписаны на этого пользователя',
    'stream_subscribes_updated' => 'Настройки ленты сохранены',
    'stream_get_more' => 'Получить ещё события',
    'stream_event_type_add_topic' => 'Добавление топика',
    'stream_event_type_add_comment' => 'Добавление комментария',
    'stream_event_type_add_blog' => 'Добавление обсуждения',
    'stream_event_type_vote_topic' => 'Голосование за топик',
    'stream_event_type_vote_comment' => 'Голосование за комментарий',
    'stream_event_type_vote_blog' => 'Голосование за обсуждения',
    'stream_event_type_vote_user' => 'Голосование за пользователя',
    'stream_event_type_add_friend' => 'Добавление в друзья',
    'stream_event_type_join_blog' => 'Вступление в обсуждение',
    'stream_no_subscribed_users' => 'Вы ещё не подписались на пользователей, чью активность хотите видеть',
    'stream_no_events' => 'Лента активности пуста',
    'stream_error_subscribe_to_yourself' => 'Вы не можете подписаться на себя',

    'stream_list_user' => 'Пользователь',
    'stream_list_event_add_topic' => 'добавил новый топик',
    'stream_list_event_add_blog' => 'добавить новое обсуждение',
    'stream_list_event_add_comment' => 'прокомментировал топик',
    'stream_list_event_vote_topic' => 'оценил топик',
    'stream_list_event_vote_blog' => 'оценил обсуждение',
    'stream_list_event_vote_user' => 'оценил пользователя',
    'stream_list_event_vote_comment' => 'оценил комментарий к топику',
    'stream_list_event_join_blog' => 'вступил в обсуждение',
    'stream_list_event_add_friend' => 'добавил в друзья пользователя',
	
    'stream_personal_title' => 'Активность',
	
    'stream_settings_note_filter' => 'Выберите действия которые будут отслеживаться',
    'stream_settings_note_follow_user' => 'Добавьте людей за активностью которых вы хотели бы следить',
    'stream_settings_note_follow_friend' => 'Выберите друзей за активностью которых вы хотели бы следить',
    
    'admin_list_plugins' => 'Управление плагинами',
    'admin_list_userfields' => 'Настройка пользовательских полей',
    'admin_list_restorecomment' => 'Перестроение дерева комментариев',

	/**
	 * Рейтинг TOP
	 */
	'top' => 'Рейтинг',
	'top_blogs' => 'ТОП обсуждений',
	'top_topics' => 'ТОП топиков',
	'top_comments' => 'ТОП комментариев',

	/**
	 * Поиск по тегам
	 */
	'tag_title' => '',

	/**
	 * Постраничность
	 */
	'paging_next' => 'следующая',
	'paging_previos' => 'предыдущая',
	'paging_last' => 'последняя',
	'paging_first' => 'первая',
	'paging' => 'Страницы',

	/**
	 * Загрузка изображений
	 */
	'uploadimg' => 'Вставка изображения',
	'uploadimg_file' => 'Файл',
	'uploadimg_file_error' => 'Невозможно обработать файл, проверьте тип и размер файла',
	'uploadimg_url' => 'Ссылка на изображение',
	'uploadimg_url_error_type' => 'Файл не является изображением',
	'uploadimg_url_error_read' => 'Невозможно прочитать внешний файл',
	'uploadimg_url_error_size' => 'Размер файла превышает максимальный в 500кБ',
	'uploadimg_url_error' => 'Невозможно обработать внешний файл',
	'uploadimg_align' => 'Выравнивание',
	'uploadimg_align_no' => 'нет',
	'uploadimg_align_left' => 'слева',
	'uploadimg_align_right' => 'справа',
	'uploadimg_align_center' => 'по центру',
	'uploadimg_submit' => 'Загрузить',
	'uploadimg_cancel' => 'Отмена',
	'uploadimg_title' => 'Описание',

	/**
	 * Уведомления
	 */
	'notify_subject_comment_new' => 'К вашему топику оставили новый комментарий',
	'notify_subject_comment_reply' => 'Вам ответили на ваш комментарий',
	'notify_subject_topic_new' => 'Новый топик в обсуждении',
	'notify_subject_registration_activate' => 'Регистрация',
	'notify_subject_registration' => 'Регистрация',
	'notify_subject_invite' => 'Приглашение на регистрацию',
	'notify_subject_talk_new' => 'У вас новое письмо',
	'notify_subject_talk_comment_new' => 'У вас новый комментарий к письму',
	'notify_subject_user_friend_new' => 'Вас добавили в друзья',
	'notify_subject_blog_invite_new' => 'Вас пригласили вступить в обсуждение',
	'notify_subject_reminder_code' => 'Восстановление пароля',
	'notify_subject_reminder_password' => 'Новый пароль',

	/**
	 * Админка
	 */
	'admin_title' => 'Админка',
	'admin_comment_restore_tree' => 'Дерево комментариев перестроенно',
	
	/**
	 * Страница администрирования плагинов
	 */
	'plugins_administartion_title' => 'Администрирование плагинов',
	'plugins_plugin_name' => 'Название',
	'plugins_plugin_author' => 'Автор',
	'plugins_plugin_version' => 'Версия',
	'plugins_plugin_action' => '',
	'plugins_plugin_activate' => 'Активировать',
	'plugins_plugin_deactivate' => 'Деактивировать',
	'plugins_plugin_settings' => 'Страница настройки',
	'plugins_unknown_action' => 'Указано неизвестное действие',
	'plugins_action_ok' => 'Успешно выполнено',
	'plugins_activation_overlap' => 'Конфликт с активированным плагином. Ресурс %%resource%% переопределен на %%delegate%% плагином %%plugin%%.',
	'plugins_activation_overlap_inherit' => 'Конфликт с активированным плагином. Ресурс %%resource%% используется как наследник в плагине %%plugin%%.',
	'plugins_activation_file_not_found' => 'Файл плагина не найден',
	'plugins_activation_file_write_error' => 'Файл плагина не доступен для записи',
	'plugins_activation_version_error' => 'Для работы плагина необходимо ядро LiveStreet версии не ниже %%version%%',
	'plugins_activation_requires_error' => 'Для работы плагина необходим активированный плагин <b>%%plugin%%</b>',
	'plugins_submit_delete' => 'Удалить плагины',
	'plugins_delete_confirm' => 'Вы уверены, что желаете удалить указанные плагины?',


	'system_error_event_args' => 'Некорректное число аргументов при добавлении евента',
	'system_error_event_method' => 'Добавляемый метод евента не найден',
	'system_error_404' => 'К сожалению, такой страницы не существует. Вероятно, она была удалена с сервера, либо ее здесь никогда не было.',
	'system_error_module' => 'Не найден класс модуля',
	'system_error_module_no_method' => 'В модуле нет необходимого метода',
	'system_error_cache_type' => 'Неверный тип кеширования',
	'system_error_template' => 'Не найден шаблон',
	'system_error_template_block' => 'Не найден шаблон подключаемого блока',

	'error' => 'Ошибка',
	'attention' => 'Внимание',
	'system_error' => 'Системная ошибка, повторите позже',
	'exit' => 'выход',
	'need_authorization' => 'Необходимо авторизоваться!',
	'or' => 'или',
	'window_close' => 'закрыть',
	'not_access' => 'Нет доступа',
	'install_directory_exists' => 'Для работы с сайтом удалите директорию /install.',
	'login' => 'Вход на сайт',
	'delete' => 'Удалить',
	'date_day' => 'день',
	'date_month' => 'месяц',

	'month_array' => array(
		1=>array('январь','января','январе'),
		2=>array('февраль','февраля','феврале'),
		3=>array('март','марта','марте'),
		4=>array('апрель','апреля','апреле'),
		5=>array('май','мая','мае'),
		6=>array('июнь','июня','июне'),
		7=>array('июль','июля','июле'),
		8=>array('август','августа','августе'),
		9=>array('сентябрь','сентября','сентябре'),
		10=>array('октябрь','октября','октябре'),
		11=>array('ноябрь','ноября','ноябре'),
		12=>array('декабрь','декабря','декабре'),
	),

	'date_year' => 'год',

	'date_now' => 'Только что',
	'date_today' => 'Сегодня в',
	'date_yesterday' => 'Вчера в',
	'date_tomorrow' => 'Завтра в',
	'date_minutes_back' => '%%minutes%% минута назад; %%minutes%% минуты назад; %%minutes%% минут назад',
	'date_minutes_back_less' => 'Менее минуты назад',
	'date_hours_back' => '%%hours%% час назад; %%hours%% часа назад; %%hours%% часов назад',
	'date_hours_back_less' => 'Менее часа назад',
);

?>