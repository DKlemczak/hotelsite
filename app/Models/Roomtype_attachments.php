<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype_attachments extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'roomtype_attachments';

    public function roomtypes()
    {
        return $this->belongsTo(Roomtypes::class);
    }
}
