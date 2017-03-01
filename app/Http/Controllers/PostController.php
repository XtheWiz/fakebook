<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;

class PostController extends Controller
{
    public function like($id) {
      $post = Post:find($id);
      $post->likes = $post->likes + 1;

      $post->save();

      return back();
    }

    public function post(Request $request) {
      $post = new Post();
      $post->ownerID = Auth::user()->id;
      $post->body = $request->body();

      $post->save();

      return back();
    }
}
