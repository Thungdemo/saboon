<?php

namespace App\Http\Controllers;

use DB;
use App\Ingredient;
use App\Soap;
use App\SoapIngredient;
use App\Http\Requests\SoapStore;
use App\Http\Requests\SoapUpdate;
use Illuminate\Http\Request;

class SoapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('soap.index',[
            'soaps' => Soap::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soap.create',[
            'ingredients' => Ingredient::all()->pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SoapStore $request)
    {
        DB::beginTransaction();

        $soap = Soap::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        foreach ($request->input('ingredient',[]) as $key => $ingredient) 
        {
            $soap->soapIngredients()->create([
                'ingredient_id' => $ingredient['ingredient_id'],
                'quantity' => $ingredient['quantity'],
            ]);
        }

        DB::commit();

        return redirect()->route('soap.index')->with('alert.success','Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Soap  $soap
     * @return \Illuminate\Http\Response
     */
    public function show(Soap $soap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Soap  $soap
     * @return \Illuminate\Http\Response
     */
    public function edit(Soap $soap)
    {
        return view('soap.edit',[
            'soap' => $soap,
            'ingredients' => Ingredient::all()->pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Soap  $soap
     * @return \Illuminate\Http\Response
     */
    public function update(SoapUpdate $request, Soap $soap)
    {
        DB::beginTransaction();

        $soap->name = $request->name;
        $soap->description = $request->description;
        $soap->save();

        $soap->soapIngredients()->delete();
        
        foreach ($request->input('ingredient',[]) as $key => $ingredient) 
        {
            $soap->soapIngredients()->create([
                'ingredient_id' => $ingredient['ingredient_id'],
                'quantity' => $ingredient['quantity'],
            ]);
        }

        DB::commit();

        return redirect()->back()->with('alert.success','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Soap  $soap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soap $soap)
    {
        $soap->delete();
        return redirect()->back()->with('alert.success','Successfully deleted');
    }

    public function addIngredient()
    {
        return view('soap.add-ingredient',[
            'rowId' => uniqid(),
            'ingredients' => Ingredient::all()->pluck('name','id')
        ]);
    }
}
