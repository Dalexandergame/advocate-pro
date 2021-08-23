<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jurisprudence;
use App\Http\Controllers\UserAuthController;
use Auth;

class JurisprudenceController extends Controller
{

     public function show()
     { 
         $user = Auth::user();
         $allusers = User::all();
         $data=jurisprudence::all();
         return view('jurisprudence',compact('data','user'));
     }

    public function store(Request $request)
    {
        $data=new jurisprudence();

        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets',$filename);
        $data->file=$filename;
        $data->cabinetname=$request->cabinetname;
        $data->Contencieux=$request->Contencieux;
        $data->date=$request->date;
        $data->dossiername=$request->dossiername;
        $data->dossiernumero=$request->dossiernumero;
        $data->resultat=$request->resultat;
        $data->user_id=$request->userid;
        $data->save();
        return redirect()->back();
    }

    public function download(Request $request,$file)
    {
        return response()->download(public_path('assets/'.$file));
    }

    public function view($id)
    {
        $data=jurisprudence::find($id);
        return view('/jurisprudenceview',compact('data'));
    }

    public function deleteCheckedStudents(Request $request)
    {
        $ids = $request->ids;
        Jurisprudence::whereIn('id',$ids)->delete();
        return response()->json(['success'=>"les fichiers ont été supprimés"]);
    }
}
