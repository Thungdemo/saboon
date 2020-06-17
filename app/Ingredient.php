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

    public function purchases()
    {
    	return $this->hasMany(Purchase::class);
    }

    public function consumption()
    {
    	return $this->hasMany(Consumption::class);
    }

    public function soap()
    {
    	return $this->belongsTo(Soap::class);
    }

    public function getQuantityPurchased()
    {
    	return $this->purchases->sum('quantity');
    }

    public function getQuantityConsumed()
    {
    	return $this->consumption->sum('quantity');
    }

    public function getQuantityAvailable()
    {
    	return $this->getQuantityPurchased() - $this->getQuantityConsumed();
    }
}
