<?php
class SprHotel extends Model
{
    public function topics() {
        // в таблице spr_topic  ключ для отеля зовётся - hotel_id, а не spr_hotel_id
        return $this->has_many('SprTopic', 'hotel_id');
    }

    public function city() {
        // в таблице spr_citycountry  ключ для отеля зовётся - cc_id, а не spr_city_country_id
        return $this->has_one('SprCitycountry', 'cc_id');
    }

    public function hoteltypes() {
        return $this->has_many_through('SprHoteltype','SprHotelHoteltype', 'hotel_id', 'htype_id');
    }

    public function bloggers() {
        return $this->has_many_through('SprBlogger','SprHotelBlogger','hotel_id','blogger_id');
    }
}


class SprHotelHoteltype extends Model
{
    
}

class SprHoteltype extends Model
{
    public function hotels() {
        return $this->has_many_through('SprHotel','SprHotelHoteltype', 'htype_id', 'hotel_id');
    }
}

class SprCitycountry extends Model
{
    public function hotels() {
        // в таблице spr_citycountry  ключ для отеля зовётся - cc_id, а не spr_city_country_id
        return $this->has_many('SprHotel', 'cc_id');
    }
}

class SprHotelBlogger extends Model
{
    
}
