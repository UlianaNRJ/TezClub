<?php
class SprTopic extends Model
{
    public function comments() {
        // в таблице spr_topic  ключ для блогера зовётся - bl_id, а не spr_blogger_id
        return $this->has_many('SprComment', 'topic_id');
    }
}

class SprComment extends Model
{

}