<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    public $timestamps = false;
    protected $table = 'rooms';

    public function RoomTags()
    {
    	return $this->belongsTo(RoomTags::class);
    }
}
