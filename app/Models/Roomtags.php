<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtags extends Model
{
    public function roomtypes()
    {
        return $this->belongsToMany('App\Models\Roomtypes','tagstoroomtype');
    }
}
