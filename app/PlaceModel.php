<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DestinationModel;
class PlaceModel extends Model
{
    //
    protected $fillable = ['name','user_id'];
    protected $table = "places";

     public function destinations_from()
    {
        return $this->hasMany(DestinationModel::class,'place_id_from');
    }

     public function destinations_to()
    {
        return $this->hasMany(DestinationModel::class,'place_id_to');
    }
}
