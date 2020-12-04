<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Rooms;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = DB::table('rooms')->get();
        return view('dashboard.rooms.index', ['rooms' => $rooms]);
    }

    public function create()
    {
        return view('dashboard.rooms.create');
    }

    public function edit($id)
    {
        $room = DB::table('rooms')->where('id', $id)->first();
        return view('dashboard.rooms.edit')->with(['room' => $room]);
    }

    public function store(Request $request)
    {
        $room = new Rooms;
        $room->Number = $request->Number;
        $room->roomtypes_id = $request->roomtypes_id;
        $room->save();

        return redirect()->route('dashboard.rooms.index');
    }

    public function update(Request $request, $id)
    {
        $room = Rooms::where('id', $id)->first();
        $room->Number = $request->Number;
        $room->roomtypes_id = $request->roomtypes_id;
        $room->save();

        return redirect()->route('dashboard.rooms.index');
    }
}
