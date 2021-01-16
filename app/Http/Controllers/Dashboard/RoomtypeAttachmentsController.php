<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Roomtypes;
use App\Models\Roomtype_attachments;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomtypeAttachmentsController extends Controller
{
    public function index($roomtype_id)
    {
        $roomtypeattachments = Roomtype_attachments::where('roomtypes_id', $roomtype_id)->get();
        return view('dashboard.roomtypes.roomtype_attachments.index', ['roomtypeattachments' => $roomtypeattachments, 'roomtype_id' => $roomtype_id]);
    }

    public function create($roomtype_id)
    {
        $roomtypes = Roomtypes::where('id', $roomtype_id)->first();
        return view('dashboard.roomtypes.roomtype_attachments.create',[ 'roomtypes' => $roomtypes, 'roomtype_id' => $roomtype_id]);
    }

    public function store(Request $request)
    {
        $roomtypeattachment = new Roomtype_attachments;
        $image = $request->photo->path();
        $imageData = base64_encode(file_get_contents($image));
        $src = 'data:'.mime_content_type($image).';base64,'.$imageData;
        $roomtypeattachment->data_uri = $src;
        $roomtypes = Roomtypes::where('Name',$request->roomtype_name)->first();
        $roomtypeattachment->roomtypes_id = $roomtypes->id;
        $roomtypeattachment->save();

        return redirect()->route('dashboard.roomtypes.roomtype_attachments.index',['roomtype_id'=> $roomtypeattachment->roomtypes_id]);
    }

    public function destroy($id, $roomtype_id)
    {
        $roomtypeattachment = Roomtype_attachments::find($id);
        $roomtypeattachment->delete();
        return redirect()->route('dashboard.roomtypes.roomtype_attachments.index',['roomtype_id' => $roomtype_id]);
    }
}
