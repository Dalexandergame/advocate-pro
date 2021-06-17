<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('loisarticle');
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
        //
        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
        ]);
        
        $art = new Article;
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets',$filename);
        $art->file=$filename;
        
        $art->nom = $request->input('fname');
        $art->type = $request->input('lname');
        
        $art->save();
        return redirect('/lois-et-articles')->with('success', 'Data Saved');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data= Article::all();
        return view('loisarticle',['articles'=>$data]);
    }
    
    public function view($id)
    
    {
        $data= Article::find($id);
        return view('loisarticleview',compact('data'));
    }
    
    
    public function download(Request $request, $file)
    
    {
        return response()->download(public_path('assets/'.$file));
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
