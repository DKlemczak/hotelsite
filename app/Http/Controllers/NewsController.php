<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Comment;
use Carbon\Carbon;
use Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::get();
        return view('news.index', ['news' => $news]);
    }

    public function details($id)
    {
        $new = News::where('id', $id)->first();

        return view('news.details',['new' => $new]);
    }

    public function storecomment(Request $request, $id)
    {
        $user = Auth::user();
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->news_id = $id;
        $comment->created_at = date('Y-m-d');
        $comment->user_id = $user->id;
        $comment->save();

        return redirect()->route('news.details', ['id' => $id]);
    }

    public function destroycomment($comment_id)
    {
        $comment = Comment::find($comment_id);
        $id = $comment->news_id;
        $comment->delete();

        return redirect()->route('news.details', ['id' => $id]);
    }
}
