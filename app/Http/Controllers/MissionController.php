<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\User;
use App\Http\Controllers\UserAuthController;
use Auth;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('ordremission');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
            'titre' => 'required',
            'description' => 'required',
            'destination' => 'required',
            'datecreation' => 'required|date_format:Y-m-d',
            'dateecheance' => 'required',
            'cout' => 'required',
        ]);
        
        $mission = new Mission();
        
        $mission->titre = $request->input('titre');
        $mission->description = $request->input('description');
        $mission->destination = $request->input('destination');
        $mission->datecreation = date('d-m-Y', strtotime($request->input('datecreation')));
        $mission->dateecheance = date('d-m-Y', strtotime($request->input('dateecheance')));
        $mission->cout = $request->input('cout');
        $mission->user_id = Auth::user()->id;
        
        $mission->save();
        return redirect('/ordre-de-mission'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
          $data= Mission::where('status','=','none')->get();
        return view('ordremission',['missions'=>$data]);
    }

     public function approved()
    {
          $data= Mission::where('status','=','Aprouver')->get();
        return view('ordremission.approved',['missions'=>$data]);
    }

    public function declined()
    {
          $data= Mission::where('status','=','Refuser')->get();
        return view('ordremission.declined',['missions'=>$data]);
    }

    public function attente()
    {
          $data= Mission::where('status','=','En attente')->get();
        return view('ordremission.attente',['missions'=>$data]);
    }


    // public function view($id)
    
    // {
    //     $data= Mission::find($id);
    //     return view('ordremission',compact('data'));
    // }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $mission = Mission::find($id);
         $users = User::all();
        return view('ordremission.editmission',compact('mission','users'));
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
        $mission = Mission::find($id);

        $mission->titre = $request->input('titre');
        $mission->description = $request->input('description');
        $mission->destination = $request->input('destination');
        $mission->dateecheance = date('d-m-Y', strtotime($request->input('dateecheance')));
        $mission->cout = $request->input('cout');
        $mission->user_id = $request->input('user_id');
        
        $mission->save();

        return redirect('/ordre-de-mission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $mission = Mission::find($id);
        $result = $mission->delete();
        return redirect('/ordre-de-mission')->with('result', 'deleted');
    }

    public function deleteCheckedMissions(Request $request)
    {
      $ids = $request->ids;
      Mission::whereIn('id',$ids)->delete();
      return response()->json(['success'=>'all deleted']);
    }


    public function status($id)
    {
        $mission = Mission::findOrFail($id);
        
        if ( request()->input('status') == 'accepter')
            {
             $mission->update(['status'=>'Aprouver']);
             return  redirect('/ordre-de-mission/approved');
            }
        elseif ( request()->input('status') == 'refuser')
            {
             $mission->update(['status'=>'Refuser']);
             return  redirect('/ordre-de-mission/declined');
            }
        elseif ( request()->input('status') == 'enattente')
            {
             $mission->update(['status'=>'En attente']);
             return  redirect('/ordre-de-mission/attente');
            }

        
    }


}
