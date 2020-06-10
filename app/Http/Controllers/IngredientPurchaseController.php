<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\IngredientPurchase;
use Illuminate\Http\Request;
use App\Http\Requests\IngredientPurchaseStore;
use App\Http\Requests\IngredientPurchaseUpdate;

class IngredientPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ingredient-purchase.index',[
            'ingredientPurchases' => IngredientPurchase::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredient-purchase.create',[
            'ingredients' => Ingredient::all()->pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientPurchaseStore $request)
    {
        IngredientPurchase::create([
            'ingredient_id' => $request->ingredient_id,
            'rate' => $request->rate,
            'quantity' => $request->quantity,
            'total_cost' => $request->rate * $request->quantity,
            'purchase_date' => $request->purchase_date,
            'batch' => $request->batch,
        ]);

        return redirect()->route('ingredient-purchase.index')->with('alert.success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IngredientPurchase  $ingredientPurchase
     * @return \Illuminate\Http\Response
     */
    public function show(IngredientPurchase $ingredientPurchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IngredientPurchase  $ingredientPurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(IngredientPurchase $ingredientPurchase)
    {
        return view('ingredient-purchase.edit',[
            'ingredientPurchase' => $ingredientPurchase,
            'ingredients' => Ingredient::all()->pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IngredientPurchase  $ingredientPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientPurchaseUpdate $request, IngredientPurchase $ingredientPurchase)
    {
        $ingredientPurchase->ingredient_id = $request->ingredient_id;
        $ingredientPurchase->rate = $request->rate;
        $ingredientPurchase->quantity = $request->quantity;
        $ingredientPurchase->total_cost = $request->rate * $request->quantity;
        $ingredientPurchase->purchase_date = $request->purchase_date;
        $ingredientPurchase->batch = $request->batch;
        $ingredientPurchase->update();

        return redirect()->back()->with('alert.success','Successfully Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IngredientPurchase  $ingredientPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(IngredientPurchase $ingredientPurchase)
    {
        $ingredientPurchase->delete();
        return redirect()->back()->with('alert.success','Successfully deleted');
    }

    public function rate(Request $request)
    {
        return Ingredient::find($request->ingredient_id);
    }
}
