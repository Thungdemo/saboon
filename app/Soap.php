<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Soap extends Model
{
    protected $guarded = [];

    public function soapIngredients()
    {
    	return $this->hasMany(SoapIngredient::class);
    }

    public function delete()
    {
    	DB::beginTransaction();
    	$this->soapIngredients()->delete();
    	parent::delete();
    	DB::commit();
    }
}
