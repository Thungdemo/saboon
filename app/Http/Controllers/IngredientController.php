<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\QuantityUnit;
use App\Http\Requests\IngredientStore;
use App\Http\Requests\IngredientUpdate;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ingredient.index',[
            'ingredients' => Ingredient::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredient.create',[
            'quantityUnits' => QuantityUnit::all()->pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientStore $request)
    {
        $ingredient = Ingredient::create([
            'name' => $request->name,
            'rate' => $request->rate,
            'quantity_unit_id' => $request->quantity_unit_id
        ]);

        return redirect()->route('ingredient.index')->with('alert.success','Successfully creaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredient.edit',[
            'ingredient' => $ingredient,
            'quantityUnits' => QuantityUnit::all()->pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientUpdate $request, Ingredient $ingredient)
    {
        $ingredient->name = $request->name;
        $ingredient->rate = $request->rate;
        $ingredient->quantity_unit_id = $request->quantity_unit_id;
        $ingredient->save();
        return redirect()->back()->with('alert.success','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->back()->with('alert.success','Successfully deleted');
    }
}
