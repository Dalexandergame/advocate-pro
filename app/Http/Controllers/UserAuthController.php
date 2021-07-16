<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserAuthController extends Controller
{
    function login(){
        return view('auth/login');
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email','=', $request->email)->first();
        if($user){
            if($request->password && $user->password){
                    $request->session()->put('LoggedUser', $user->id);
                    return redirect('/dashboard');
            }else{
                return back()->with('fail','mot de passe incorrecte !');
            }
        }else{
            return back()->with('fail','pas de compte pour ce Email !');
        }
    }

}
