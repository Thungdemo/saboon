<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $guarded = [];

    public function quantityUnit()
    {
    	return $this->belongsTo(QuantityUnit::class);
    }
    
    public function getRatePerUnitAttribute()
    {
    	return 'Rs '.$this->rate.'/'.$this->quantityUnit->name;
    }
}
