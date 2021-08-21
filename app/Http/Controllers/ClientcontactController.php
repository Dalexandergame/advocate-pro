<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientcontact;
use Illuminate\Support\Facades\DB;

class ClientcontactController extends Controller
{
     public function index(){

      $listcontacts = Clientcontact::all();

      return view('clientcontact.index', ['clientcontacts' => $listcontacts]);
    }

    public function create(){

      return view('clientcontact.create');
    }

    public function store(Request $request){
      
      $clientcontact = new Clientcontact();

        $clientcontact->nom_contact = $request->input('nom_contact');
    	$clientcontact->adresse = $request->input('adresse');
    	$clientcontact->tagwords = $request->input('tagwords');
    	$clientcontact->ville = $request->input('ville');
    	$clientcontact->mail = $request->input('mail');
    	$clientcontact->tel = $request->input('tel');
    	$clientcontact->dossier_lier = $request->input('dossier_lier');

    	$clientcontact->save();

        return redirect('clientcontacts');

    }

    public function edit($id){
        $clientcontact = Clientcontact::find($id);

        return view('clientcontact.edit', ['clientcontact' => $clientcontact]);
    }

    public function update(Request $request, $id){
        $clientcontact = Clientcontact::find($id);

        $clientcontact->nom_contact = $request->input('nom_contact');
    	$clientcontact->adresse = $request->input('adresse');
    	$clientcontact->tagwords = $request->input('tagwords');
    	$clientcontact->ville = $request->input('ville');
    	$clientcontact->mail = $request->input('mail');
    	$clientcontact->tel = $request->input('tel');
    	$clientcontact->dossier_lier = $request->input('dossier_lier');

    	$clientcontact->save();

        return redirect('clientcontacts');
    }

    public function destroy(Request $request, $id){


    	$clientcontact = Clientontact::find($id);
    	$clientcontact-> delete();
    	return redirect('clientcontacts');
    }
}
