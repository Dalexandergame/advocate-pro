<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tribunal;
use Illuminate\Support\Facades\DB;

class TribunalController extends Controller
{
    
     public function index(){

      $listtribunals = Tribunal::all();

      return view('tribunal.index', ['tribunals' => $listtribunals]);
    }

    public function create(){

      return view('tribunal.create');
    }

    public function store(Request $request){
      
      $tribunal = new Tribunal();

        $tribunal->nom_tribunal = $request->input('nom_tribunal');
    	$tribunal->ville = $request->input('ville');
    	$tribunal->adresse = $request->input('adresse');
    	$tribunal->type = $request->input('type');
    	
    	$tribunal->save();

        return redirect('tribunals');

    }

    public function edit($id){
        $tribunal = Tribunal::find($id);

        return view('tribunal.edit', ['tribunal' => $tribunal]);
    }

    public function update(Request $request, $id){
        $tribunal = Tribunal::find($id);

        $tribunal->nom_tribunal = $request->input('nom_tribunal');
        $tribunal->ville = $request->input('ville');
        $tribunal->adresse = $request->input('adresse');
        $tribunal->type = $request->input('type');
        
        $tribunal->save();

        return redirect('tribunals');
    }

    public function destroy(Request $request, $id){


    	$tribunal = Tribunal::find($id);
    	$tribunal-> delete();
    	return redirect('tribunals');
    }
}
