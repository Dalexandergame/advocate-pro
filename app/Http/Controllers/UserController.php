<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        $data=user::all();
        return view('users/userview',compact('data'));
    }
}
