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

	Route::get('ingredient-purchase/rate','IngredientPurchaseController@rate')->name('ingredient-purchase.rate');
	Route::get('ingredient-purchase','IngredientPurchaseController@index')->name('ingredient-purchase.index');
	Route::get('ingredient-purchase/create','IngredientPurchaseController@create')->name('ingredient-purchase.create');
	Route::post('ingredient-purchase','IngredientPurchaseController@store')->name('ingredient-purchase.store');
	Route::get('ingredient-purchase/{ingredientPurchase}/edit','IngredientPurchaseController@edit')->name('ingredient-purchase.edit');
	Route::put('ingredient-purchase/{ingredientPurchase}','IngredientPurchaseController@update')->name('ingredient-purchase.update');
	Route::delete('ingredient-purchase/{ingredientPurchase}','IngredientPurchaseController@destroy')->name('ingredient-purchase.delete');

	Route::get('soap/add-ingredient','SoapController@addIngredient')->name('soap.add-ingredient');
	Route::get('soap','SoapController@index')->name('soap.index');
	Route::get('soap/create','SoapController@create')->name('soap.create');
	Route::post('soap','SoapController@store')->name('soap.store');
	Route::get('soap/{soap}/edit','SoapController@edit')->name('soap.edit');
	Route::put('soap/{soap}','SoapController@update')->name('soap.update');
	Route::delete('soap/{soap}','SoapController@destroy')->name('soap.delete');
});