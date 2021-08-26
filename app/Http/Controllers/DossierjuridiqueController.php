<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserAuthController;
use App\Models\Clientcompte;
use App\Models\Dossierjuridique;
use App\Models\Tache;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

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
        $dossierjuridique->tribunal_number = $request->input('tribunal_number');
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
        $dossierjuridique->tribunal_number = $request->input('tribunal_number');
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
    public function vue(Request $request)
    {
            $users = User::all();
            $today = Carbon::now()->format('Y-m-d').'%';

            $file_number = $request->route('file_number');
            $taches = Dossierjuridique::where('taches.dossier_num', 'LIKE', $file_number)
                            ->where('etat','!=','finis')
                            ->where('type','!=','audiance')
                            ->join('taches', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->count();
            $audiance = Dossierjuridique::where('taches.dossier_num', 'LIKE', $file_number)
                            ->where('etat','=','ouvert')
                            ->where('type','=','audiance')
                            ->whereDate('taches.dateaudiance', '>=', $today)
                            ->join('taches', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->join('users', 'taches.user_id', '=', 'users.id')
                            ->first();
            $audiancehes = Dossierjuridique::where('taches.dossier_num', 'LIKE', $file_number)
                            ->where('type','=','audiance')
                            ->whereDate('taches.dateaudiance', '<=', $today)
                            ->join('taches', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->join('users', 'taches.user_id', '=', 'users.id')
                            ->get();
            $lasttache = Dossierjuridique::where('taches.dossier_num', 'LIKE', $file_number)
                            ->join('taches', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->join('users', 'taches.user_id', '=', 'users.id')
                            ->join('comments', 'comments.commentable_id', '=', 'taches.id')
                            ->first();
            $comments = Dossierjuridique::where('taches.dossier_num', 'LIKE', $file_number)
                            ->join('taches', 'dossierjuridiques.file_number', '=', 'taches.dossier_num')
                            ->join('users', 'taches.user_id', '=', 'users.id')
                            ->join('comments', 'comments.commentable_id', '=', 'taches.id')
                            ->get();
            $clientcomptes = Clientcompte::all();
            $dossierjuridiques = Dossierjuridique::all(); 
            $id = $request->route('id');
            foreach ($dossierjuridiques as $dossierjuridique) {
                if($dossierjuridique->id == $id) {
                           return view('dossierjuridique.vue', compact('users','audiance','comments','audiancehes','taches','lasttache','dossierjuridiques','clientcomptes'));

                        }
            }

                    
   }

            public function getid(id $id){
        return $id;
    }

      public function getfile_number(file_number $file_number){
        return $file_number;
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
        // $data5= Tache::where('type','=','tache bureau')->where('taches.dossier_num', $number)->count();
        // $data6= Tache::where('type','=','rendez-vous')->where('taches.dossier_num', $number)->count();
        // $data7= Tache::where('type','=','audiance')->where('taches.dossier_num', $number)->count();
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
}
