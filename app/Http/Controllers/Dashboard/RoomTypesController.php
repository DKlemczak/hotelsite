<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Roomtypes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomtypesController extends Controller
{
    public function index()
    {
        $roomtypes = Roomtypes::get();
        return view('dashboard.roomtypes.index', ['roomtypes' => $roomtypes]);
    }

    public function create()
    {
        return view('dashboard.roomtypes.create');
    }

    public function edit($id)
    {
        $roomtype = Roomtypes::where('id', $id)->first();
        return view('dashboard.roomtypes.edit')->with(['roomtype' => $roomtype]);
    }

    public function store(Request $request)
    {
        $roomtype = new Roomtypes;
        $roomtype->Name = $request->Name;
        $roomtype->DescriptionLong = $request->DescriptionLong;
        $roomtype->DescriptionShort = $request->DescriptionShort;
        $roomtype->RoomSpace = $request->RoomSpace;
        $roomtype->PricePerDay = $request->PricePerDay;
        $roomtype->save();

        return redirect()->route('dashboard.roomtypes.index');
    }

    public function update(Request $request, $id)
    {
        $roomtype = Roomtypes::where('id', $id)->first();
        $roomtype->Name = $request->Name;
        $roomtype->DescriptionLong = $request->DescriptionLong;
        $roomtype->DescriptionShort = $request->DescriptionShort;
        $roomtype->RoomSpace = $request->RoomSpace;
        $roomtype->PricePerDay = $request->PricePerDay;
        $roomtype->save();

        return redirect()->route('dashboard.roomtypes.index');
    }
}
