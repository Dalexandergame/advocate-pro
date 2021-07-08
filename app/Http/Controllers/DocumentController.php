<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function download(Request $request,$file)
    {
        return response()->download(public_path('assets/'.$file));
    }

    public function destroy(Request $request,$id)
    {
        $data=document::find($id);
        $data->delete();
        return redirect('documents');
    }

    public function deleteCheckedStudents(Request $request)
    {
        $ids = $request->ids;
        Document::whereIn('id',$ids)->delete();
        return response()->json(['success'=>"docs have been deleted"]);
    }

    public function view($id)
    {
        $data=document::find($id);
        return view('documentview',compact('data'));
    }
}
