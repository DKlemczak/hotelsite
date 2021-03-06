<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $table = 'comments';
    public function roomtypes()
    {
        return $this->belongsTo('App\Models\Roomtypes');
    }

    public function news()
    {
        return $this->belongsTo('App\Models\News');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
