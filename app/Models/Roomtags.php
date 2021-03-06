<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtags extends Model
{
    public $timestamps = false;
    protected $table = 'roomtags';

    public function roomtypes()
    {
        return $this->belongsToMany(Roomtypes::class,'tagstoroomtype');
    }
}
