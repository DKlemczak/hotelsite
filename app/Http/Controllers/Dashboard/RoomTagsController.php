<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Roomtags;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomtagsController extends Controller
{
    public function index()
    {
        $roomtags = DB::table('roomtags')->get();
        return view('dashboard.roomtags.index', ['roomtags' => $roomtags]);
    }

    public function create()
    {
        return view('dashboard.roomtags.create');
    }

    public function edit($id)
    {
        $roomtag = DB::table('roomtags')->where('id', $id)->first();
        return view('dashboard.roomtags.edit')->with(['roomtag' => $roomtag]);
    }

    public function store(Request $request)
    {
        $roomtag = new Roomtags;
        $roomtag->Name = $request->Name;
        $roomtag->save();

        return redirect()->route('dashboard.roomtags.index');
    }

    public function update(Request $request, $id)
    {
        $roomtag = Roomtags::where('id', $id)->first();
        $roomtag->Name = $request->Name;
        $roomtag->save();

        return redirect()->route('dashboard.roomtags.index');
    }
}
