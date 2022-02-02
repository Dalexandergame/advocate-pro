<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Stock;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\InvoiceStock;
use App\Models\SerialNumber;
use Illuminate\Http\Request;
use App\Models\Dossierjuridique;
use App\Models\Frais;
use App\Models\ProductSerialNumber;

class VignettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vignette = Product::where('name','vignette')->with('category')->first();
        //dd($vignette);
        if($vignette->stock != Null)
        {
            $stockInvoice = InvoiceStock::where('stock_id', $vignette->stock->id)->latest()->first();
            if($stockInvoice != Null) $invoice = Invoice::where('id', $stockInvoice->invoice_id)->latest()->first();
            else $invoice = Null;
        }
        else {$invoice = Null; $stockInvoice = Null; }

        return view('vignettes.index',compact('vignette','invoice','stockInvoice'));
    }

    public function vignetteList($id)
    {
        $user = auth()->user();
        $vignette = Product::where('name','vignette')->with('category')->first();
        $vignetteNumsTotal = ProductSerialNumber::where('product_id',$vignette->id)->get();
        // $vignetteNums = ProductSerialNumber::where('product_id',$vignette->id)->paginate(4);
        $fraisvignettes = Frais::where('name','vignette')->with('dossierjuridique')->get();
        //dd($fraisvignettes);
        foreach($fraisvignettes as $key => $fv)
        {
            $vignetteNumsTotal->forget($key)->where('serial_number',$fv->serial_number); 
        }
        $vignetteNums = $vignetteNumsTotal->slice(0,4);
        //dd($vignetteNums);
        $dossier = Dossierjuridique::findOrFail($id);
        //dd($vignette);
        return view('frais.vignetteList',compact('vignette','vignetteNums','dossier','user','vignetteNumsTotal','fraisvignettes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vignette = Product::where('name','vignette')->with('category')->first();
        return view('vignettes.create',compact('vignette'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'serial_number1' => ['required', 'integer' , 'between:1000000,9999999'],
            'serial_number2' => ['required','integer' , 'between:1000000,9999999','gt:serial_number1'],
            'invoice'  => ['required', 'image']
        ]);
        
        $invoicePath = request('invoice')->store('uploads/invoices','public');
        
        $vignette = Product::where('name','vignette')->with('category')->first();
        $first = (int)request()->input('serial_number1');
        $last = (int)request()->input('serial_number2');
        $qty = (int)request()->input('quantity');

        for ($i = $first ; $i<= $last ; $i++)
        {
            SerialNumber::create([
                'serial_number' => $i
            ]);

            ProductSerialNumber::create([
                'product_id' => $vignette->id,
                'serial_number' => $i,
            ]);
        }
        if( Stock::where('product_id','=',$vignette->id)->exists() )
        {
            Stock::where('product_id','=',$vignette->id)->increment('quantity', $qty);
        }
        else Stock::create([
            'product_id' => $vignette->id,
            'quantity' => $qty
        ]);

        $stock = Stock::where('product_id','=',$vignette->id)->first();

        $invoice = Invoice::create([
            'invoice_number' => $invoicePath
        ]);

        InvoiceStock::create([
            'stock_id' => $stock->id,
            'invoice_id' => $invoice->id
        ]);

        return redirect()->route('vignettes.index');
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
