<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    //
    function show()
    {
    	$data= Article::all();
    	return view('loisarticle',['articles'=>$data]);
    }
}
