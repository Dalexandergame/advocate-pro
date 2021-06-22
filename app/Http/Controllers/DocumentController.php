<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Document;

class DocumentController extends Controller
{
    public function store(Request $request) 
    {
        $data=new Document();
        
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets',$filename);
        $data->file=$filename;
        $data->title=$request->title;
        $data->desc=$request->desc;

        $data->save();
        return redirect()->back();
    }

    public function show()
    {
        $data=document::all();
        return view('documents',compact('data'));
    }
}
