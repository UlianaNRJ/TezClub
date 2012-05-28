<?php
class SprTopic extends Model
{
    public function comments() {
        // в таблице spr_topic  ключ для блогера зовётся - bl_id, а не spr_blogger_id
        return $this->has_many('SprComment', 'topic_id');
    }

    public function insertintomothersite(){
        /*
        ALTER TABLE `spr_topic` ADD `toppage` TINYINT( 1 ) NOT NULL DEFAULT '0' AFTER `active` 
        ALTER TABLE `tc_topic` ADD `hotelstopicid` INT( 10 ) NULL AFTER `topic_text_hash`
        */
        // создаём топик
        $link = "link";
        $url = "http://".$_SERVER["SERVER_NAME"]."/blog/view/".$this->id;
        
        $tctopic = Model::factory('TcTopic')
                        ->where('hotelstopicid', $this->id)
                        ->find_one();
        // если топика не существует, создаём его
        if (!$tctopic instanceof TcTopic) {
            $tctopic = Model::factory('TcTopic')->create();
            $tctopic->blog_id = 20358;
            $tctopic->user_id  = 2; // TezTour
            $tctopic->topic_type = $link;
            $tctopic->topic_date_add = date('Y-m-d H:i:s');
            $tctopic->hotelstopicid = $this->id;
            $tctopic->topic_publish_draft  = 1; 
            $tctopic->topic_publish_index  = 1; 
        }

        $tctopic->topic_title = $this->title; 
        $tctopic->topic_tags = $this->tags; 
        $tctopic->topic_date_edit = date('Y-m-d H:i:s'); 
        $tctopic->topic_publish = $this->active; 
        // так hash сохраняет LS
        // $oTopic->setTextHash(md5($oTopic->getType().$oTopic->getText().$oTopic->getLinkUrl()));
        $tctopic->topic_text_hash = md5($link.$this->title.$url); 
        $tctopic->save();

        // содержимое топика
        $tctopiccontent = Model::factory('TcTopicContent')
                        ->where('topic_id', $tctopic->topic_id)
                        ->find_one();
        if (!$tctopiccontent instanceof TcTopicContent) {
            $tctopiccontent = Model::factory('TcTopicContent')->create();
            $tctopiccontent->topic_id = $tctopic->topic_id;
            // контект токика забивем
            $extra = array('url' => $url, 'count_jump' => 0);
            $tctopiccontent->topic_extra = serialize($extra);
        }
        
        $tctopiccontent->topic_text = $this->summary;
        $tctopiccontent->topic_text_short = $this->summary;
        $tctopiccontent->topic_text_source = $this->summary;

        $tctopiccontent->save();

    }

     public function updateintomothersite() {
        $tctopic = Model::factory('TcTopic')
                        ->where('hotelstopicid', $this->id)
                        ->find_one();
        // если топик уже существует
        if ($tctopic instanceof TcTopic) {
            //print_r($tctopic); exit;
            // тот-же признак видимости, что и у топика на разделе отелей
            $tctopic->topic_publish = 0;
            $tctopic->save();
        }
    }
}

class SprComment extends Model
{

}

// класс для работы с таблицей топиков тезтура
class TcTopic extends Model
{
    public static $_id_column = 'topic_id';
}


// класс для работы с таблицей контентом топиков тезтура
class TcTopicContent extends Model
{
    public static $_id_column = 'topic_id';
}