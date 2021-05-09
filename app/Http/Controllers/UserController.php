<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;


class UserController extends Controller
{
    public function __construct( User $user)
    {
        $this->user = $user;
    }

    public function getCustomers() {
        $users = $this->user->where('role', 'CUSTOMER')->get();
        
        return view('customers/listing')->withUsers($users);
    }

    public function getProfile()
    {
        $user = Auth::user();

        return view('profiles.profile')->withUser($user);
    }
}
