<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsStockController extends Controller
{
    public function index() 
    {
        return view('add-product-to-stock');
    }

    public function choose() 
    {
        if ( request()->input('product') == 'vignette' ) return redirect()->route('vignettes.index');
        else return redirect()->route('stocks.create');
    }
}
