<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;


class ProfileController extends Controller
{
    public function welcome() 
    { 
        return view('welcome');
    }
    public function editUser($id) 
    {
        $user = User::find($id);

        return view('profiles.edit')->withUser($user);
    }

    public function updateUser(Request $request) 
    {
        $inputs = $request->all();
        
        $id = Auth::user()->id;
        $user = User::find($id);

        $user->update($inputs);

        return view('profiles.profile')->withUser($user);
    }
}
