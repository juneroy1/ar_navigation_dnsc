<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class DestinationModel extends Model
{
    //
    protected $fillable = ['name'];
    protected $table = "destinations";
}
