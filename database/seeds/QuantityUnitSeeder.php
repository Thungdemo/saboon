<?php

use Illuminate\Database\Seeder;
use App\QuantityUnit;

class QuantityUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuantityUnit::insert([
        	['id' => 'kg', 'name' => 'Kg'],
        	['id' => 'l', 'name' => 'Litre'],
        	['id' => 'pc', 'name' => 'Piece']
        ]);
    }
}
