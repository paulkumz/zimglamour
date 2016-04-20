<?php

namespace twitter\Http\Controllers;

use Illuminate\Http\Request;
use twitter\User;
use twitter\Http\Requests;

class UserController extends Controller
{
       public function index(User $user)
       {
          return view('users.index')->withUser($user);
       }

    public function follow(Request $request, User $user)
    {
         if ($request->user()->canFollow($user)){
            $request->user()->following()->attach($user);
         }

         return redirect()->back();
    }

    public function unfollow(Request $request, User $user)
    {
    	if ($request->user()->canUnfollow($user)){
          $request->user()->following()->detach($user);
    	}
    	return redirect()->back();
    }


}
