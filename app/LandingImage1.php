<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingImage1 extends Model
{
    //
    protected $fillable = ['image', 'title', 'subtitle',"is_approved","department", "user_id"];
    protected $table = "landing_images";
}
