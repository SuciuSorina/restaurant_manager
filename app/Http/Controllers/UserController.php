<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


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
}
