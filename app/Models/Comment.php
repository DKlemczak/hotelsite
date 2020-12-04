<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function roomtypes()
    {
        return $this->belongsTo('App\Models\Roomtypes');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
