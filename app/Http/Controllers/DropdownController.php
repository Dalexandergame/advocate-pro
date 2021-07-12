<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    public function selectCategory() 
    {
        $cat_id = request()->input('cat_id');
        $products = DB::table('products')->where('category_id','=',$cat_id)->get();
        return response()->json($products);
    }

    public function selectProduct()
    {
        $product_id = request()->input('product_id');
        $product = Product::where('id','=',$product_id)->get()->load('stock');       

        return response()->json($product);
    }
}
