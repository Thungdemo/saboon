<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Purchase;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseStore;
use App\Http\Requests\PurchaseUpdate;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchase.index',[
            'purchases' => Purchase::latest()->paginate(config('soap.pagination')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase.create',[
            'ingredients' => Ingredient::all()->pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseStore $request)
    {
        Purchase::create([
            'ingredient_id' => $request->ingredient_id,
            'rate' => $request->rate,
            'quantity' => $request->quantity,
            'total_cost' => $request->rate * $request->quantity,
            'purchase_date' => $request->purchase_date,
            'batch' => $request->batch,
        ]);

        return redirect()->route('purchase.index')->with('alert.success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('purchase.edit',[
            'ingredientPurchase' => $purchase,
            'ingredients' => Ingredient::all()->pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseUpdate $request, Purchase $purchase)
    {
        $purchase->ingredient_id = $request->ingredient_id;
        $purchase->rate = $request->rate;
        $purchase->quantity = $request->quantity;
        $purchase->total_cost = $request->rate * $request->quantity;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->batch = $request->batch;
        $purchase->update();

        return redirect()->back()->with('alert.success','Successfully Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->back()->with('alert.success','Successfully deleted');
    }

    public function rate(Request $request)
    {
        return Ingredient::find($request->ingredient_id);
    }
}
