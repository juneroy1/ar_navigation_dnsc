<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $fillable = ['title', 'description', 'avatar',  'user_id',  'name', 'image'];
    protected $table = "announcements";


    public static function getAllAnnouncement(){
        return self::all();
    }
   
}
