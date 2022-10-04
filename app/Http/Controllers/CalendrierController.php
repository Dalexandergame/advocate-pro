<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\UserAuthController;
use Auth;
use Redirect;
use Request as requestid;


class CalendrierController extends Controller
{
     public function indexCal()
    {
        return view('calendrier');
    }

    public function search()
    {
       $search_text = $_GET['search'];
       $users = User::where('name', 'LIKE', $search_text)->get();

       $users1 = User::all();

       $today = Carbon::now()->format('Y-m-d').'%';
       $tache = Tache::where('users.name', 'LIKE', $search_text)
                            ->where('type','!=','audiance')
                            ->where('etat','!=','finis')
                            ->whereDate('dateecheance', 'like', $today)
                            ->join('users', 'taches.assigned_user_id', '=', 'users.id')
                            ->count();

        $audiance = Tache::where('users.name', 'LIKE', $search_text)
                            ->where('type','=','audiance')
                            ->whereDate('dateaudiance', 'like', $today)
                            ->join('users', 'taches.assigned_user_id', '=', 'users.id')
                            ->count();
        $taches= Tache::where('type','=','audiance')->get();

       return view('calendrier.calendriersearch',compact('users','users1','tache','audiance','taches'));
    }

    public function filteradmin()
    {

       $users = User::all();

       $user = Auth::id();

       $search_text = $_GET['search'];

        if ( $search_text == 'admin')
                        {
                            $taches = Tache::where('user_id', 'LIKE', $user )
                            ->where('type','=','audiance')
                            ->get();

                         return view('calendrier',compact('users','taches'));
                        }

                        else {

                           $taches= Tache::where('type','=','audiance')->get();
                         return view('calendrier',compact('taches','users'));
                        }
    }

     public function view($id)

    {
        $data1= User::find($id);
        $today = Carbon::now()->format('Y-m-d').'%';
        $data= Tache::where('assigned_user_id', $id)
                            ->where('type','=','audiance')
                            ->whereDate('dateaudiance', 'like', $today)
                            ->get();

        return view('calendrier.calendrierview',compact('data1','data'));
    }

       public function showcal()
    {
          $taches= Tache::where('type','=','audiance')->get();
           $users = User::all();
        return view('calendrier',compact('taches','users'));
    }

    public function recap(Request $request)
    {
        $tasks = $request->input('data');  //here tasks is the input array param

        foreach ($tasks as $row) {
            $task = Tache::find($row['id']);
            $task->mesures = $row['mesures'];
            $task->remarque = $row['remarque'];

            if ($row['remarque'] == null || $row['mesures'] == null) {
                $task->update(['etat' => 'en attente']);
            } else {

                $task->update(['etat' => 'finis']);
            }

            $task->save();

        }

        return Redirect::back();
    }


     public function getid(id $id){
        return $id;
    }

}
