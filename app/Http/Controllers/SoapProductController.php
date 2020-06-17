<?php

namespace App\Http\Controllers;

use DB;
use App\Ingredient;
use App\Soap;
use App\SoapProduct;
use App\Consumption;
use App\Http\Requests\SoapProductStore;
use Illuminate\Http\Request;

class SoapProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('soap-product.index',[
            'soapProducts' => SoapProduct::latest()->paginate(config('soap.pagination')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soap-product.create',[
            'ingredients' => Ingredient::all()->pluck('name','id'),
            'soaps' => Soap::all()->pluck('name','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SoapProductStore $request)
    {
        DB::beginTransaction();
        $soapProduct = new SoapProduct();
        $soapProduct->soap_id = $request->soap_id;
        $soapProduct->mfg_date = $request->mfg_date;
        $soapProduct->save();

        foreach ($request->ingredients as $ingredient) 
        {
            $consumption = new Consumption();
            $consumption->ingredient_id = $ingredient['ingredient_id'];
            $consumption->quantity = $ingredient['quantity'];
            $soapProduct->ingredients()->save($consumption);
        }
        DB::commit();
        return redirect()->back()->with('alert.success','Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoapProduct  $soapProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SoapProduct $soapProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoapProduct  $soapProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SoapProduct $soapProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoapProduct  $soapProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoapProduct $soapProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoapProduct  $soapProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoapProduct $soapProduct)
    {
        $soapProduct->delete();
        return redirect()->back()->with('alert.success','Successfully deleted');
    }

    public function soapIngredients(Request $request)
    {
        $soap = Soap::find($request->soap_id);
        return view('soap-product.soap-ingredients',[
            'ingredients' => Ingredient::all()->pluck('name','id'),
            'soap' => $soap
        ]);
    }

    public function addIngredient(Request $request)
    {
        return view('soap-product.add-ingredient',[
            'ingredients' => Ingredient::all()->pluck('name','id'),
            'rowId' => uniqid(),
        ]);
    }
}
