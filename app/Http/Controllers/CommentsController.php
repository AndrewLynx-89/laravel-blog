<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends SiteController
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'message'	=>	'required'
        ]);

        $comment = new Comment;
        $comment->text = $request->get('message');
        $comment->article_id = $request->get('article_id');
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back()->with('status', 'Ваш комментарий будет скоро добавлен!');
    }
}
