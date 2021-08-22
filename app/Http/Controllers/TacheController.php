<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tache;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\UserAuthController;
use Auth;
use Redirect;

class TacheController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Tache::find(1)->getUsers;
        return view('taches');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        // $this->validate($request,[
        //     'type' => 'required',
        //     'description' => 'required',
        //     'etat' => 'required',
        //     'dateaudiance' => 'required',
        //     'titre' => 'required',
        //     'dateecheance' => 'required',
        // ]);
        
        $task = new Tache;
        
        $task->titre = $request->input('titre');
        $task->type = $request->input('type');
        $task->description = $request->input('description');
        $task->dateaudiance = $request->input('dateaudiance');
        $task->dateecheance = $request->input('dateaudiance');
        $task->dateecheance = $request->input('dateecheance');
        $task->dossier_num = $request->input('file_number');
        $task->assigned_user_id = $request->input('assigned_user_id');
        $task->user_id = Auth::user()->id;
        $task->etat = 'ouvert';

        $task->save();
        return Redirect::back()->with('success', 'Data Saved');
    }

    public function addUsers()
    {
        $users = User::all()->pluck('id', 'name'); // get all users

        return view('taches')->with('users', $users);
    }

    public function viewtask($id)
    
    {
        $data= Tache::find($id);
        return view('tachesdetails',compact('data',$data));
       
    }

    public function viewaudiance($id)
    
    {
        $data= Tache::find($id);
       
        return view('tache.audiancedetails',compact('data',$data));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data1= Tache::where('etat','=','ouvert')->where('type','=','tache bureau')->count();
        $data2= Tache::where('etat','=','en cours')->where('type','=','tache bureau')->count();
        $data3= Tache::where('etat','=','finis')->where('type','=','tache bureau')->count();
        $data4= Tache::where('etat','=','en attente')->where('type','=','tache bureau')->count();
        $data5= Tache::where('type','=','tache bureau')->count();
        $data6= Tache::where('type','=','rendez-vous')->count();
        $data7= Tache::where('type','=','audiance')->count();
        $users = User::all();
        $ouvert = Tache::where('etat','=','ouvert')
                         ->where('type','=','tache bureau')
                         ->get();
        $encours = Tache::where('etat','=','en cours')
                          ->where('type','=','tache bureau')
                          ->get();
        $finis = Tache::where('etat','=','finis')
                         ->where('type','=','tache bureau')
                         ->get();
        $attente = Tache::where('etat','=','en attente')
                          ->where('type','=','tache bureau')
                          ->get();
        return view('taches',compact('data1','data2','data3','data4','data5','data6','data7','users','ouvert', 'encours','finis','attente'));
    }

    public function rendezvous()
    {
        $data1= Tache::where('etat','=','ouvert')->where('type','=','rendez-vous')->count();
        $data2= Tache::where('etat','=','en cours')->where('type','=','rendez-vous')->count();
        $data3= Tache::where('etat','=','finis')->where('type','=','rendez-vous')->count();
        $data4= Tache::where('etat','=','en attente')->where('type','=','rendez-vous')->count();
        $data5= Tache::where('type','=','tache bureau')->count();
        $data6= Tache::where('type','=','rendez-vous')->count();
        $data7= Tache::where('type','=','audiance')->count();
        $users = User::all();
        $ouvert = Tache::where('etat','=','ouvert')
                         ->where('type','=','rendez-vous')
                         ->get();
        $encours = Tache::where('etat','=','en cours')
                          ->where('type','=','rendez-vous')
                          ->get();
        $finis = Tache::where('etat','=','finis')
                         ->where('type','=','rendez-vous')
                         ->get();
        $attente = Tache::where('etat','=','en attente')
                          ->where('type','=','rendez-vous')
                          ->get();
        return view('tache.rendez-vous',compact('data1','data2','data3','data4','data5','data6','data7','users','ouvert', 'encours','finis','attente'));
    }

    public function audiances()
    {
        $data1= Tache::where('etat','=','ouvert')->where('type','=','audiance')->count();
        $data2= Tache::where('etat','=','en cours')->where('type','=','audiance')->count();
        $data3= Tache::where('etat','=','finis')->where('type','=','audiance')->count();
        $data4= Tache::where('etat','=','en attente')->where('type','=','audiance')->count();
        $data5= Tache::where('type','=','tache bureau')->count();
        $data6= Tache::where('type','=','rendez-vous')->count();
        $data7= Tache::where('type','=','audiance')->count();
        $users = User::all();
        $ouvert = Tache::where('etat','=','ouvert')
                         ->where('type','=','audiance')
                         ->get();
        $encours = Tache::where('etat','=','en cours')
                          ->where('type','=','audiance')
                          ->get();
        $finis = Tache::where('etat','=','finis')
                         ->where('type','=','audiance')
                         ->get();
        $attente = Tache::where('etat','=','en attente')
                          ->where('type','=','audiance')
                          ->get();
        return view('tache.audiances',compact('data1','data2','data3','data4','data5','data6','data7','users','ouvert', 'encours','finis','attente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tache::find($id);
         $users = User::all();
        return view('tache.edittaches',compact('data','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         
        $task = Tache::find($id);
        
        $task->titre = $request->input('titre');
        $task->type = $request->input('type');
        $task->description = $request->input('description');
        $task->dateecheance = $request->input('dateecheance');
        $task->dateaudiance = $request->input('dateaudiance');
        $task->dateecheance = $request->input('dateaudiance');
        $task->dossier_num = $request->input('file_number');
        $task->assigned_user_id = $request->input('assigned_user_id');
        $task->user_id = Auth::user()->id;

        $task->save();

        if ( request()->input('type') == 'audiance')
            {
        return view("tache.audiancedetails")->with("data", $task);
            }
        else {

        return view("tachesdetails")->with("data", $task);
        }
    }
    public function recap(Request $request, $id)
        {
             
            $task = Tache::find($id);
            
            $task->remarque = $request->input('remarque');
            $task->mesures = $request->input('mesures');

            if ( request()->input('remarque') == null || request()->input('mesures') == null)
            {
                 $task->update(['etat'=>'en attente']);
             
            }
            else {
                
                $task->update(['etat'=>'finis']);
            }

            $task->save();
           
            return view("tache.audiancedetails")->with("data", $task);
                
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tache = Tache::find($id);
        $result = $tache->delete();
        return redirect('/taches')->with('result', 'deleted');
    }

    public function etat($id)
    {
        $task = Tache::findOrFail($id);
        
        if ( request()->input('etat') == 'en cours')
            {
             $task->update(['etat'=>'en cours']);
             
            }
        elseif ( request()->input('etat') == 'finis')
            {
             $task->update(['etat'=>'finis']);
             
            }
        elseif ( request()->input('etat') == 'en attente')
            {
             $task->update(['etat'=>'en attente']);
             
            }
        return  Redirect::back();
        
    }
}
