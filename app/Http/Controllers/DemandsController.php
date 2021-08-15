<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\DemandProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandedproducts = DemandProduct::all();

        foreach ($demandedproducts as $item)
        {
            $products[$item->demand_id][$item->product_id] = Product::where('id', '=', $item->product_id)->get();
            $quantities[$item->demand_id][$item->product_id] = $item->quantity ;
        }
        
        if(isset($products) && isset($quantities) ) return view('demands.index',compact('products','quantities'));
        else return view('demands.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = [];
        $quantities = [];

        $data = request()->validate([
            'details' => 'required'
        ]);

        $demandedProducts = $request->session()->get('demand');

        if ($demandedProducts != null){
            //Inseret the demands table
            $demand = Demand::create($data);

            //Inseret the demand_product table
            foreach ($demandedProducts as $id=>$quantity)
            {
                DemandProduct::create([
                    'demand_id' => $demand->id,
                    'product_id' => $id,
                    'quantity' => $quantity
                ]);
                foreach (DemandProduct::all() as $item)
                {
                    $products[$item->demand_id][$item->product_id] = Product::where('id', '=', $item->product_id)->get();
                    $quantities[$item->demand_id][$item->product_id] = $item->quantity ;
                }
            }
            //dd($products, $quantities);
        }
        $request->session()->forget('demand');

        return view('demands.index',compact('products','quantities'));
    }


    public function handle($id)
    {
        $demand = Demand::findOrFail($id);
        
        if ( request()->input('handle') == 'accept')
        {
            $demand->update(['state'=>'Aprouver']);
        }
        else $demand->update(['state'=>'Refuser']);

        return redirect('/demands');
    }

    public function approved()
    {
        $aprouveddemands = Demand::where('state', '=', 'Aprouver')->get();
        
        $demandedproducts = DemandProduct::all();

        foreach ($demandedproducts as $item)
        {
            $products[$item->demand_id][$item->product_id] = Product::where('id', '=', $item->product_id)->get();
            $quantities[$item->demand_id][$item->product_id] = $item->quantity ;
        }
        
        return view('demands.approved',compact('aprouveddemands','products','quantities'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demand = Demand::findOrFail($id);
        $products = [];
        $quantities =[];
        foreach (DemandProduct::where('demand_id', '=', $demand->id)->get() as $demandedproduct)
        {
            $products[$demandedproduct->product_id] = Product::where('id', '=', $demandedproduct->product_id)->get();
            $quantities[$demandedproduct->product_id] = $demandedproduct->quantity ;
        }

        return view('demands.show', compact('demand','products','quantities'));
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

    public function AddDemandProducts()
    {
        $products = Product::take(12)->get();
        return view('demands.demand_products', compact('products'));
    }

    public function StoreDemandProducts()
    {
        $inputs = request()->input('quantity');
        $products = [] ;
        foreach ($inputs as $id=>$quantity){
            $quantity=(int)$quantity;
            if($quantity > 0){
                $newInputs[$id] = $quantity;
                $products[$id] = Product::where('id', '=', $id)->get();
            }
        }
        request()->session()->put('demand',$newInputs);
        return view('demands.create',compact('newInputs','products'));
    }
}
