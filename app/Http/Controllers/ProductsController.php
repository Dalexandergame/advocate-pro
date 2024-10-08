<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceStock;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;

class ProductsController extends Controller
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
    public function create($id)
    {
        $category = Category::findOrFail($id);
        
        return view('products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $data = request()->validate([
            'name' => 'required|unique:products',
            'price' => 'required|numeric|between:0.00,99999.99',
            'alert_en_stock' => 'required|integer|between:20,250',
            'photo' => 'required|image',
            'description' => 'required',    
        ]);

        $imagePath = request('photo')->store('uploads', 'public');
        //dd($imagePath);

        Product::create([
            'category_id' => $id,
            'name' => $data['name'],
            'price' => $data['price'],
            'alert_en_stock' => $data['alert_en_stock'],
            'photo' => $imagePath,
            'description' => $data['description'],
        ]);

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(640, 480);
        $image->save();

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('stock')->findOrFail($id);
        //dd($product->stock);
        if($product->stock != Null)
        {
            $stockInvoice = InvoiceStock::where('stock_id', $product->stock->id)->latest()->first();
            if($stockInvoice != Null) $invoice = Invoice::where('id', $stockInvoice->invoice_id)->latest()->first();
            else $invoice = Null;
        }
        else {$invoice = Null; $stockInvoice = Null; }
        return view('products.show', compact('product','invoice','stockInvoice'));
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
