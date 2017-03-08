<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Comment;

class CommentController extends Controller
{
  public function like($id) {
    $comment = Comment::find($id);
    $comment->likes = $comment->likes + 1;

    $comment->save();

    return back();
  }

  public function comment(Request $request, $id) {
    $comment = new Comment();
    $comment->ownerPost = $id;
    $comment->ownerUser = Auth::user()->id;
    $comment->body = $request->commentbox;

    $comment->save();

    return back();
  }
}
