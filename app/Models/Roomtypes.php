<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtypes extends Model
{
    public $timestamps = false;
    protected $table = 'roomtypes';

    public function roomtags()
    {
        return $this->belongsToMany('App\Models\Roomtags');
    }
}
