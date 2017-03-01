<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function showChangeProfileForm(){
      return view('changeprofile');
    }

    public function change() {
      $avatar = request()->file('avatar');
      $ext = $avatar->guessClientExtension(); // = $file->extension();

      $avatar->storeAs('avatar/'. Auth::user()->id, 'avatar.'. $ext);

      return redirect('/home');
    }
}
