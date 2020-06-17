<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoapIngredient extends Model
{
    protected $guarded = [];

    public function ingredient()
    {
    	return $this->belongsTo(Ingredient::class);
    }
}
