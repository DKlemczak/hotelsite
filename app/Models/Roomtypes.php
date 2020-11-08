<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtypes extends Model
{
    public function roomtags()
    {
        return $this->belongsToMany('App\Models\Roomtags');
    }
}
