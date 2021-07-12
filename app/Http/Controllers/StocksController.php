<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceStock;
use App\Models\Stock;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::with('product')->get();
        return view('stocks.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('products')->get();

        return view('stocks.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $id = request()->product;        

        $data = request()->validate([
            'quantity' => ['required', 'integer'],
            'invoice'  => ['required', 'image']
        ]);

        $quantity = (int)request()->input('quantity');
        $invoicePath = request('invoice')->store('uploads/invoices','public');
        //dd($invoicePath);


        if( Stock::where('product_id','=',$id)->exists() )
        {
            $stock = Stock::where('product_id','=',$id)->increment('quantity', $quantity);
        }
        else $stock = Stock::create([
            'product_id' => $id,
            'quantity' => $quantity,
        ]);

        $invoice = Invoice::create([
            'invoice_number' => $invoicePath
        ]);

        InvoiceStock::create([
            'stock_id' => $stock->id,
            'invoice_id' => $invoice->id
        ]);

        return redirect()->route('products.show', $id)->with('status','Stock has been updated',['invoice' => $invoice]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
