<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SerialNumber;
use App\Models\ProductSerialNumber;
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
    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view('stocks.create',compact('product'));
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
            'quantity' => ['Nullable', 'integer'],
            'serial_number1' => ['Nullable', 'integer' , 'between:1000000,9999999'],
            'serial_number2' => ['Nullable','integer' , 'between:1000000,9999999','gt:serial_number1']
        ]);

        $quantity = (int)request()->input('quantity');
        $first = (int)request()->input('serial_number1');
        $last = (int)request()->input('serial_number2');

        if( $first != 0  && $last != 0  )
        {
            //dd($first,$last);
            for ($i = $first ; $i<= $last ; $i++)
            {
                SerialNumber::create([
                    'serial_number' => $i
                ]);

                ProductSerialNumber::create([
                    'product_id' => $id,
                    'serial_number' => $i,
                ]);
            }
            if( Stock::where('product_id','=',$id)->exists() )
            {
                Stock::where('product_id','=',$id)->increment('quantity', $last-$first+1);
            }
            else Stock::create([
                'product_id' => $id,
                'quantity' => $last-$first+1
            ]);
        }
        else
        {
            if( Stock::where('product_id','=',$id)->exists() )
            {
                Stock::where('product_id','=',$id)->increment('quantity', $quantity);
            }
            else Stock::create([
                'product_id' => $id,
                'quantity' => $quantity,
            ]);
        }
        return redirect()->route('products.show', $id)->with('status','Stock has been updated');
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
