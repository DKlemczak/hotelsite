<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class StaticController extends Controller
{
    public function index()
    {
        return view('statics.index');
    }
}
