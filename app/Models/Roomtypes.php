<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtypes extends Model
{
    public $timestamps = false;
    protected $table = 'roomtypes';

    public function roomtags()
    {
        return $this->belongsToMany(Roomtags::class);
    }

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function attachments()
    {
        return $this->hasMany(Roomtype_attachments::class);
    }
}
