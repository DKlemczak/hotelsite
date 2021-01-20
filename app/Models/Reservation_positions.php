<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_positions extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'reservation_positions';

    public function rooms()
    {
    	return $this->belongsTo(Rooms::class, 'rooms_id', 'id');
    }

    public function reservations()
    {
    	return $this->belongsTo(Reservation::class, 'reservation_id', 'id');
    }
}
