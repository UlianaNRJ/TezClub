<?php
class SprBlogger extends Model
{
    public function topics() {
        // в таблице spr_topic  ключ для блогера зовётся - bl_id, а не spr_blogger_id
        return $this->has_many('SprTopic', 'bl_id');
    }

    public function hotels() {
        return $this->has_many_through('SprHotel','SprHotelBlogger','blogger_id','hotel_id');
    }
}