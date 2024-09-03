<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationModel extends Model
{
    //
    protected $fillable = ['place_id_from', 'place_id_to'];
    protected $table = "destinations";
}
