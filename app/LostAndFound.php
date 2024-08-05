<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LostAndFound extends Model
{
    //
    protected $fillable = ['title', 'description', 'image',  'user_id', 'name', 'avatar'];
    protected $table = "lost_and_found";

}
