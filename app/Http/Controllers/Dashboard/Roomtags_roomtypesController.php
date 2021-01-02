<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Roomtags;
use App\Models\Roomtypes;
use App\Models\Roomtags_roomtypes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Roomtags_roomtypesController extends Controller
{
    public function index($roomtype_id)
    {
        $roomtags_roomtypes = Roomtags_roomtypes::where('roomtypes_id', $roomtype_id)->get();
        return view('dashboard.roomtypes.roomtags_roomtypes.index', ['roomtags_roomtypes' => $roomtags_roomtypes, 'roomtype_id' => $roomtype_id]);
    }

    public function create($roomtype_id)
    {
        $roomtypes = Roomtypes::where('id', $roomtype_id)->first();
        $roomtags = Roomtags::get();
        $roomtags_roomtypes = Roomtags_roomtypes::where('roomtypes_id', $roomtype_id)->get();
        $tags = array();
        $key = 0;
        foreach($roomtags_roomtypes as $roomtag_roomtypes)
        {
            $tags[$key] = $roomtag_roomtypes->roomtags_id;
            $key++;
        }

        $roomtags = $roomtags->diff(Roomtags::whereIn('id',$tags)->get());

        return view('dashboard.roomtypes.roomtags_roomtypes.create',['roomtags' => $roomtags, 'roomtypes' => $roomtypes, 'roomtype_id' => $roomtype_id]);
    }

    public function store(Request $request)
    {
        $roomtags_roomtypes = new Roomtags_roomtypes;
        $roomtags_roomtypes->roomtags_id = $request->roomtags_id;
        $roomtypes = Roomtypes::where('Name',$request->roomtype_name)->first();
        $roomtags_roomtypes->roomtypes_id = $roomtypes->id;
        $roomtags_roomtypes->save();

        return redirect()->route('dashboard.roomtypes.roomtags_roomtypes.index',['roomtype_id'=> $roomtags_roomtypes->roomtypes_id]);
    }

    public function destroy($id, $roomtype_id)
    {
        $roomtags_roomtypes = Roomtags_roomtypes::find($id);
        $roomtags_roomtypes->delete();
        return redirect()->route('dashboard.roomtypes.roomtags_roomtypes.index',['roomtype_id' => $roomtype_id]);
    }
}
