<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Govertemplate;

class GovertemplatesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('governances.index');
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
        $data = request()->validate([
            'cab_name' => 'required|max:255',
            'cab_adress' => 'required',
            'title'=> 'required|unique:govertemplates|max:255',
            'tag'=> '',
            'description'=> 'required|'
        ]);

        Govertemplate::create($data);

        return redirect('/govertemplates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $template
     * @return \Illuminate\Http\Response
     */
    public function show($govertemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Govertemplate $govertemplate)
    {
        return view('governances.edit',compact('govertemplate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $govertemplates
     * @return \Illuminate\Http\Response
     */
    public function update(Govertemplate $govertemplate)
    {
        $data = request()->validate([
            'cab_name' => 'required|max:255',
            'cab_adress' => 'required',
            'title'=> 'required|max:255',
            'tag'=> '',
            'description'=> 'required'
        ]);

        $govertemplate->update($data);

        return redirect('/govertemplates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $govertemplates
     * @return \Illuminate\Http\Response
     */
    public function destroy($govertemplate)
    {
        //
    }
}
