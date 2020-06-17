<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Mutator;

class Purchase extends Model
{
	use Mutator;

	protected $datable = ['purchase_date'];

    protected $guarded = [];

    public function ingredient()
    {
    	return $this->belongsTo(Ingredient::class);
    }
}
