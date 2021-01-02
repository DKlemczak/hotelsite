<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Rooms;
use App\Models\RoomTypes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index()
    {
        $rooms = Rooms::get();
        return view('dashboard.rooms.index', ['rooms' => $rooms]);
    }

    public function create()
    {
        $roomtypes = RoomTypes::get();
        return view('dashboard.rooms.create')->with(['roomtypes' => $roomtypes]);
    }

    public function edit($id)
    {
        $room = Rooms::where('id', $id)->first();
        $roomtypes = RoomTypes::get();
        return view('dashboard.rooms.edit')->with(['room' => $room,'roomtypes' => $roomtypes]);
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
