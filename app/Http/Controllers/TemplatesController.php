<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    public function create()
    {
        return view('correspondence');
    }

    public function store()
    {
        $data = request()->validate([
            'title'=> 'required|unique:templates|max:255',
            'tag'=> '',
            'description'=> 'required'
        ]);

       Template::create($data);

       return redirect('/correspondence');
    }
}
