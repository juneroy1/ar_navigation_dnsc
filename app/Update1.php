<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update1 extends Model
{
    //
    protected $fillable = ['title', 'description', 'description_local', 'image', 'user_id', 'is_approved', "department"];
    protected $table = "updates";
}
