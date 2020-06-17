<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
	Route::get('ingredient','IngredientController@index')->name('ingredient.index');
	Route::get('ingredient/create','IngredientController@create')->name('ingredient.create');
	Route::post('ingredient','IngredientController@store')->name('ingredient.store');
	Route::get('ingredient/{ingredient}/edit','IngredientController@edit')->name('ingredient.edit');
	Route::put('ingredient/{ingredient}','IngredientController@update')->name('ingredient.update');
	Route::delete('ingredient/{ingredient}','IngredientController@destroy')->name('ingredient.delete');

	Route::get('purchase/rate','PurchaseController@rate')->name('purchase.rate');
	Route::get('purchase','PurchaseController@index')->name('purchase.index');
	Route::get('purchase/create','PurchaseController@create')->name('purchase.create');
	Route::post('purchase','PurchaseController@store')->name('purchase.store');
	Route::get('purchase/{purchase}/edit','PurchaseController@edit')->name('purchase.edit');
	Route::put('purchase/{purchase}','PurchaseController@update')->name('purchase.update');
	Route::delete('purchase/{purchase}','PurchaseController@destroy')->name('purchase.delete');

	Route::get('soap/add-ingredient','SoapController@addIngredient')->name('soap.add-ingredient');
	Route::get('soap','SoapController@index')->name('soap.index');
	Route::get('soap/create','SoapController@create')->name('soap.create');
	Route::post('soap','SoapController@store')->name('soap.store');
	Route::get('soap/{soap}/edit','SoapController@edit')->name('soap.edit');
	Route::put('soap/{soap}','SoapController@update')->name('soap.update');
	Route::delete('soap/{soap}','SoapController@destroy')->name('soap.delete');

	Route::get('soap-product/soap-ingredients','SoapProductController@soapIngredients')->name('soap-product.soap-ingredients');
	Route::get('soap-product/add-ingredient','SoapProductController@addIngredient')->name('soap-product.add-ingredient');
	Route::get('soap-product','SoapProductController@index')->name('soap-product.index');
	Route::get('soap-product/create','SoapProductController@create')->name('soap-product.create');
	Route::post('soap-product','SoapProductController@store')->name('soap-product.store');
	Route::get('soap-product/{soapProduct}/edit','SoapProductController@edit')->name('soap-product.edit');
	Route::put('soap-product/{soapProduct}','SoapProductController@update')->name('soap-product.update');
	Route::delete('soap-product/{soapProduct}','SoapProductController@destroy')->name('soap-product.delete');

	Route::prefix('report')->name('report.')->namespace('Report')->group(function(){
		Route::get('ingredient-stock','IngredientStockController@index')->name('ingredient-stock');
	});
});