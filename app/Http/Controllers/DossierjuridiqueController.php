<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Frais;
use App\Models\Tache;
use App\Models\Clientcompte;
use Illuminate\Http\Request;
use App\Models\Dossierjuridique;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserAuthController;

class DossierjuridiqueController extends Controller
{
    
    public function index(){
        
        $listdossierjuridique = Dossierjuridique::all();
        return view('dossierjuridique.index', ['dossierjuridiques' => $listdossierjuridique]);
    }

     public function show(){
        
        $dossierjuridiques = Dossierjuridique::all();
        $clientcomptes = Clientcompte::all();
        
        return view('dossierjuridique', compact('dossierjuridiques', 'clientcomptes'));
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
        $dossierjuridique->compte_pour = $request->input('for');
        $dossierjuridique->compte_contre = $request->input('against');
        $dossierjuridique->indirect_pour = $request->input('indirect_pour');
        $dossierjuridique->indirect_contre = $request->input('indirect_contre');
        $dossierjuridique->commentaire = $request->input('commentaire');
        $dossierjuridique->user_id = Auth::user()->id;

        $dossierjuridique->save();

        return Redirect::back()->with('success', 'Data Saved');

    }
    public function sousstore(Request $request){
        
        $dossierjuridique = new Dossierjuridique();

        $dossierjuridique->file_number = $request->input('file_number');
        $dossierjuridique->date_creation = $request->input('date_creation');
        $dossierjuridique->parent = $request->input('parent');
        $dossierjuridique->type_dossier = $request->input('type_dossier');
        $dossierjuridique->compte_pour = $request->input('for');
        $dossierjuridique->compte_contre = $request->input('against');
        $dossierjuridique->indirect_pour = $request->input('indirect_pour');
        $dossierjuridique->indirect_contre = $request->input('indirect_contre');
        $dossierjuridique->tagwords = $request->input('tagwords');
        $dossierjuridique->commentaire = $request->input('commentaire');
        $dossierjuridique->user_id = Auth::user()->id;

        $dossierjuridique->save();

        return Redirect::back()->with('success', 'Data Saved');

    }
    public function edit($id){
        $dossierjuridique = Dossierjuridique::find($id);
        $clientcomptes = Clientcompte::all();
        return view('dossierjuridique.edit', compact('dossierjuridique','clientcomptes'));
    }
    public function update(Request $request, $id){
        $dossierjuridique = Dossierjuridique::find($id);

       $dossierjuridique->file_number = $request->input('file_number');
        $dossierjuridique->date_creation = $request->input('date_creation');
        $dossierjuridique->tagwords = $request->input('tagwords');
        $dossierjuridique->type_dossier = $request->input('type_dossier');
        $dossierjuridique->compte_pour = $request->input('for');
        $dossierjuridique->compte_contre = $request->input('against');
        $dossierjuridique->indirect_pour = $request->input('indirect_pour');
        $dossierjuridique->indirect_contre = $request->input('indirect_contre');
        $dossierjuridique->commentaire = $request->input('commentaire');
        $dossierjuridique->save();

        return redirect('dossier-juridiques');

    }

    public function destroy(Request $request, $id){

        $dossierjuridique = Dossierjuridique::find($id);

        $dossierjuridique->delete();

        return redirect('dossier-juridiques');
    }

    public function search(Request $request){

        $search = $request->get('file_number');
        $searchT = $request->get('tagwords');
        $searchCD = $request->get('for');

        $dossierjuridiques = DB::table('dossierjuridiques')->where('file_number', 'like', '%'.$search.'%')->where('tagwords', 'like', '%'.$searchT.'%')->where('compte_pour', 'like', '%'.$searchCD.'%')->get();   
       
        return view('dossierjuridique', ['dossierjuridiques' => $dossierjuridiques]);
      
    }
    public function vue($id)
    {
        $users = User::all();
        $today = Carbon::now()->format('Y-m-d').'%';

        $dossierjuridique= Dossierjuridique::find($id);
        $clientcomptes = Clientcompte::all();
        $frais = Frais::where('dossier_id',$id);

        $file_number= Dossierjuridique::where('id', '=', $id)->pluck('file_number');

        $taches = Dossierjuridique::where('taches.dossier_num', 'LIKE', $file_number)
                            ->where('etat','!=','finis')
                            ->where('type','!=','audiance')
                            ->join('taches', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->count();
        $sousdossiers = Dossierjuridique::where('parent', 'LIKE', $file_number)
                            ->count(); 
        $allsousdossiers = Dossierjuridique::where('parent', 'LIKE', $file_number)
                            ->get();         
        $audiance = Dossierjuridique::where('taches.dossier_num', 'LIKE', $file_number)
                            ->where('etat','=','ouvert')
                            ->where('type','=','audiance')
                            ->whereDate('taches.dateaudiance', '>=', $today)
                            ->join('taches', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->join('users', 'taches.user_id', '=', 'users.id')
                            ->join('comments', 'comments.commentable_id', '=', 'taches.id')
                            ->first();
            $audiancehes = Dossierjuridique::where('taches.dossier_num', 'LIKE', $file_number)
                            ->where('type','=','audiance')
                            ->whereDate('taches.dateaudiance', '<', $today)
                            ->join('taches', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->join('users', 'taches.user_id', '=', 'users.id')
                            ->get();
        
            $comments = Dossierjuridique::where('taches.dossier_num', 'LIKE', $file_number)
                            ->join('taches', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->join('users', 'taches.user_id', '=', 'users.id')
                            ->join('comments', 'comments.commentable_id', '=', 'taches.id')
                            ->get();

        return view('dossierjuridique.vue',compact('sousdossiers','allsousdossiers','users','audiance','comments','audiancehes','taches','dossierjuridique','clientcomptes','frais'));
                    
   }

      public function alltaches($number)
    
    {
        // $dat = Dossierjuridique::where('id','=', $id)->pluck('file_number')
        $data = Tache::where('taches.dossier_num', $number)
                            ->join('dossierjuridiques', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->join('users', 'taches.user_id', '=', 'users.id')
                            ->first();

        $users = User::all();
        $data1= Tache::where('etat','=','ouvert')->where('type','!=','audiance')->where('taches.dossier_num', $number)->count();
        $data2= Tache::where('etat','=','en cours')->where('type','!=','audiance')->where('taches.dossier_num', $number)->count();
        $data3= Tache::where('etat','=','finis')->where('type','!=','audiance')->where('taches.dossier_num', $number)->count();
        $data4= Tache::where('etat','=','en attente')->where('type','!=','audiance')->where('taches.dossier_num', $number)->count();
        $users = User::all();

        $ouvert = Tache::where('etat','=','ouvert')
                         ->where('taches.dossier_num', $number)
                         ->where('type','!=','audiance')
                         ->get();
        $encours = Tache::where('etat','=','en cours')
                          ->where('type','!=','audiance')
                          ->where('taches.dossier_num', $number)
                          ->get();
        $finis = Tache::where('etat','=','finis')
                         ->where('type','!=','audiance')
                         ->where('taches.dossier_num', $number)
                         ->get();
        $attente = Tache::where('etat','=','en attente')
                          ->where('type','!=','audiance')
                          ->where('taches.dossier_num', $number)
                          ->get();

        return view('dossierjuridique.tachedossier',compact('data','users','data1','data2','data3','data4','ouvert', 'encours','finis','attente'));
    }

    public function cost_type($id)
    {
        $user = Auth::user();
        $dossier = Dossierjuridique::findOrFail($id);
        return view('dossierjuridique.add-cost-type',compact('user','dossier'));
    }

    public function choose_cost_type($id)
    {
        if ( request()->input('product') == 'vignette' ) return redirect()->route('dossierCost.vignettes', $id);
        else return redirect()->route('dossierCost.other.create', $id) ;
    }

}
