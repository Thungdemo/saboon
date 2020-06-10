<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->make();
        $user->name = 'Saboon master';
        $user->email = 'admin@email.com';
        $user->save();
    }
}
