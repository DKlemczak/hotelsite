<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Roomtypes;

class OfferController extends Controller
{
    public function index()
    {
        $rooms = DB::table('roomtypes')->get();
        return view('offer.index', ['rooms' => $rooms]);
    }

    public function details($id)
    {
        $room = Roomtypes::where('id', $id)->first();
        
        return view('offer.details',['room' => $room]);
    }
}
