<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('correspondence');
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
            'title'=> 'required|unique:templates|max:255',
            'tag'=> '',
            'description'=> 'required'
        ]);

        Template::create($data);

        return redirect('/correspondence');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $template
     * @return \Illuminate\Http\Response
     */
    public function show($template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        return view('templates.edit',compact('template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Template $template)
    {
        $data = request()->validate([
            'title'=> 'required|unique:templates|max:255',
            'tag'=> '',
            'description'=> 'required'
        ]);

        $template->update($data);

        return redirect('/correspondence');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy($template)
    {
        //
    }
}
