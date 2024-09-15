<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationCoordinatesModel extends Model
{
    //
    protected $fillable = ['x', 'y', 'z', 'destination_id', 'time', 'longitude', 'latitude'];
}
