<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtags_roomtypes extends Model
{
    public $timestamps = false;
    protected $table = 'roomtags_roomtypes';

    public function roomtypes()
    {
    	return $this->belongsTo(Roomtypes::class, 'roomtypes_id', 'id');
    }

    public function roomtags()
    {
    	return $this->belongsTo(Roomtags::class, 'roomtags_id', 'id');
    }
}
