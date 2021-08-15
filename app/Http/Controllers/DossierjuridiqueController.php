<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dossierjuridique;

class DossierjuridiqueController extends Controller
{
    
    public function index(){
        
        $listdossierjuridique = Dossierjuridique::all();

        return view('dossierjuridique.index', ['dossierjuridiques' => $listdossierjuridique]);
    }

    public function create(){
       return view('dossierjuridique.create');
    }

    public function store(Request $request){
    	
    	$dossierjuridique = new Dossierjuridique();

    	$dossierjuridique->file_number = $request->input('file_number');
    	$dossierjuridique->date_creation = $request->input('date_creation');
    	$dossierjuridique->tagwords = $request->input('tagwords');
    	$dossierjuridique->type_dossier = $request->input('type_dossier');
    	$dossierjuridique->for = $request->input('for');
    	$dossierjuridique->against = $request->input('against');
    	$dossierjuridique->client_direct = $request->input('client_direct');
    	$dossierjuridique->client_indirect = $request->input('client_indirect');
    	$dossierjuridique->comments = $request->input('comments');
    	$dossierjuridique->tribunal_number = $request->input('tribunal_number');

    	$dossierjuridique->save();

        return redirect('dossierjuridiques');

    }
    public function edit($id){
        $dossierjuridique = Dossierjuridique::find($id);

        return view('dossierjuridique.edit', ['dossierjuridique' => $dossierjuridique]);
    }
    public function update(Request $request, $id){
        $dossierjuridique = Dossierjuridique::find($id);

        $dossierjuridique->file_number = $request->input('file_number');
        $dossierjuridique->date_creation = $request->input('date_creation');
        $dossierjuridique->tagwords = $request->input('tagwords');
        $dossierjuridique->type_dossier = $request->input('type_dossier');
        $dossierjuridique->for = $request->input('for');
        $dossierjuridique->against = $request->input('against');
        $dossierjuridique->client_direct = $request->input('client_direct');
        $dossierjuridique->client_indirect = $request->input('client_indirect');
        $dossierjuridique->comments = $request->input('comments');
        $dossierjuridique->tribunal_number = $request->input('tribunal_number');
        $dossierjuridique->save();

        return redirect('dossierjuridiques');

    }
    public function destroy(Request $request, $id){

        $dossierjuridique = Dossierjuridique::find($id);

        $dossierjuridique->delete();

        return redirect('dossierjuridiques');
    }

    public function search(Request $request){

        $search = $request->get('file_number');
        $searchT = $request->get('tagwords');
        $searchCD = $request->get('for');

        $dossierjuridiques = DB::table('dossierjuridiques')->where('file_number', 'like', '%'.$search.'%')->where('tagwords', 'like', '%'.$searchT.'%')->where('for', 'like', '%'.$searchCD.'%')->paginate(5);   
       
        return view('dossierjuridique.index', ['dossierjuridiques' => $dossierjuridiques]);
      
    }
}
