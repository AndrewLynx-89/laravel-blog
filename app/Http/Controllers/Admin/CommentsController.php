<?php

namespace App\Http\Controllers\Admin;

use  App\Comment;
use Illuminate\Http\Request;

class CommentsController extends AdminController
{
    public function __construct()
    {
        $this->template = 'admin.index';
    }

    public function index()
    {
        $comments = Comment::all();

        $this->content = view('admin.comments.index',compact('comments'))->render();
        return $this->renderOutput();
    }

    public function toggle($id)
    {
        $comment = Comment::find($id);
        $comment->toggleStatus();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::find($id)->remove();
        return redirect()->back();
    }
}
