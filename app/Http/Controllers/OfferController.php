<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Roomtypes;
use App\Models\Comment;
use Carbon\Carbon;
use Auth;

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

    public function storecomment(Request $request, $id)
    {
        $user = Auth::user();
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->roomtypes_id = $id;
        $comment->created_at = Carbon::now();
        $comment->user_id = $user->id;
        $comment->save();

        return redirect()->route('offer.details', ['id' => $id]);
    }

    public function destroycomment($comment_id)
    {
        $comment = Comment::find($comment_id);
        $id = $comment->roomtypes_id;
        $comment->delete();

        return redirect()->route('offer.details', ['id' => $id]);
    }
}
