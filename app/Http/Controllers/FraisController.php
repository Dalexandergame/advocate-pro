<?php

namespace App\Http\Controllers;

use App\Models\Dossierjuridique;
use App\Models\Frais;
use Illuminate\Http\Request;

class FraisController extends Controller
{
    public function store_vignette_cost($id)
    {
        $data = request()->validate([
            'vSerial_number' => 'required',
            'screen' => 'required|image',
            'description' => 'required',
        ]);
        //dd($data);

        $imagePath = request('screen')->store('uploads/frais', 'public');
        Frais::create([
            'name' => 'Vignette',
            'dossier_id' => $id,
            'cost' => 600,
            'serial_number' => $data['vSerial_number'],
            'screen' => $imagePath,
            'description' => $data['description'],
        ]);

        return redirect()->route('dossierCost.vignettes.get', $id);
    }

    public function show_added_vignette($id)
    {
        $dossier = Dossierjuridique::where('id', $id)->with('user')->first();
        $FDvignette = Frais::where('dossier_id',$id)->where('name','Vignette')->first();
        $fraisvignettes = Frais::where('name','vignette')->with('dossierjuridique')->get();
        return view('frais.dossiervignette',compact('FDvignette','dossier', 'fraisvignettes'));
    }

    public function create_other_cost($id)
    {
        $dossier = Dossierjuridique::where('id', $id)->with('user')->first();
        return view('frais.otherCreate',compact('dossier'));
    }

    public function store_other_cost($id)
    {
        $data = request()->validate([
            'name' => 'required',
            'cost' => 'required|integer',
            'screen' => 'required|image',
            'description' => 'required',
        ]);
        $imagePath = request('screen')->store('uploads/frais', 'public');
        
        Frais::create([
            'name' => $data['name'],
            'dossier_id' => $id,
            'cost' => $data['cost'],
            'screen' => $imagePath,
            'description' => $data['description'],
        ]);

        return redirect()->route('dossierCost.other.details', $id);
    }

    public function show_other_cost($id)
    {
        $dossier = Dossierjuridique::where('id', $id)->with('user')->first();
        $fraisp = Frais::where('dossier_id',$id)->where('name','!=','Vignette')->first();
        return view('frais.dossierothercost',compact('fraisp','dossier'));
    }

}
