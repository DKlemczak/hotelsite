<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function index()
    {
        $rooms = DB::table('roomtypes')->get();
        return view('offer.index', ['rooms' => $rooms]);
    }
}
