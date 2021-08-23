<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\UserAuthController;
use Auth;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('personalprofilview',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user= user::find($id);

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();
        return redirect('profile')->with('success','Informations bien changé !');
    }

    public function updatepass(Request $request, $id)
    {
        $user= user::find($id);
        
        if($request->password != null){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect('profile')->with('successe','Mot de passe changé !');
    }

}
