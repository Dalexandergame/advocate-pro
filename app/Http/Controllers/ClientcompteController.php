<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clientcompte;
use Illuminate\Support\Facades\DB;

class ClientcompteController extends Controller
{
    public function index(){

      $listcomptes = Clientcompte::all();

      return view('clientcompte.index', ['clientcomptes' => $listcomptes]);
    }

    public function create(){

      return view('clientcompte.create');
    }

    public function store(Request $request){
      
      $clientcompte = new Clientcompte();

        $clientcompte->nom_entreprise = $request->input('nom_entreprise');
        $clientcompte->adresse = $request->input('adresse');
        $clientcompte->tagwords = $request->input('tagwords');
        $clientcompte->nom_contact = $request->input('nom_contact');
        $clientcompte->tel_contact = $request->input('tel_contact');
        $clientcompte->mail_contact = $request->input('mail_contact');
        $clientcompte->nom_contact_principal = $request->input('nom_contact_principal');
        $clientcompte->tel_contact_principal = $request->input('tel_contact_principal');
        $clientcompte->mail_contact_principal = $request->input('mail_contact_principal');
        $clientcompte->dossier_lier = $request->input('dossier_lier');

        $clientcompte->save();

        return redirect('clientcomptes');

    }

    public function edit($id){
        $clientcompte = Clientcompte::find($id);

        return view('clientcompte.edit', ['clientcompte' => $clientcompte]);
    }

    public function update(Request $request, $id){
        $clientcompte = Clientcompte::find($id);

        $clientcompte->nom_entreprise = $request->input('nom_entreprise');
        $clientcompte->adresse = $request->input('adresse');
        $clientcompte->tagwords = $request->input('tagwords');
        $clientcompte->nom_contact = $request->input('nom_contact');
        $clientcompte->tel_contact = $request->input('tel_contact');
        $clientcompte->mail_contact = $request->input('mail_contact');
        $clientcompte->nom_contact_principal = $request->input('nom_contact_principal');
        $clientcompte->tel_contact_principal = $request->input('tel_contact_principal');
        $clientcompte->mail_contact_principal = $request->input('mail_contact_principal');
        $clientcompte->dossier_lier = $request->input('dossier_lier');

        $clientcompte->save();

        return redirect('clientcomptes');
    }

    public function destroy(Request $request, $id){


        $clientcompte = Clientcompte::find($id);
        $clientcompte-> delete();
        return redirect('clientcomptes');
    }
}
