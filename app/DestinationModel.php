<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PlaceModel;
class DestinationModel extends Model
{
    //
    protected $fillable = ['place_id_from', 'place_id_to'];
    protected $table = "destinations";


     public function place_from()
    {
        return $this->belongsTo(PlaceModel::class, 'place_id_from', 'id');
    }

     public function place_to()
    {
        return $this->belongsTo(PlaceModel::class, 'place_id_to', 'id');
    }
}
