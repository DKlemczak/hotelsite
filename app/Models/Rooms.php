<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    public $timestamps = false;
    protected $table = 'rooms';

    public function roomtypes()
    {
    	return $this->belongsTo(Roomtypes::class, 'roomtypes_id', 'id');
    }
}
