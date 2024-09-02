<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceModel extends Model
{
    //
    protected $fillable = ['name','user_id'];
    protected $table = "places";
}
