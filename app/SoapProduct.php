<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Mutator;

class SoapProduct extends Model
{
	use Mutator;

	protected $datable = ['mfg_date'];

	public function soap()
	{
		return $this->belongsTo(Soap::class);
	}

	public function ingredients()
	{
		return $this->hasMany(Consumption::class,'soap_product_id');
	}

	public function delete()
	{
		DB::beginTransaction();
		$this->ingredients()->delete();
		parent::delete();
		DB::commit();
	}
}
