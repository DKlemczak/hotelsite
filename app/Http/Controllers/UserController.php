<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Reservation;

class UserController extends Controller
{
    public function index()
    {
        $loguser = Auth::user();
        $user = User::find($loguser->id);
        $reservation = Reservation::where('user_id', $user->id)->where('status', '!=', 0)->get();
        return view('user.index', ['reservations' => $reservation]);
    }
}
