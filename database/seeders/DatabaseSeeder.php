<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'waheed',
            'email'=> 'waheed@gmail.com',
            'password' => \Hash::make('123456789'),
            'role'=> 'admin',
            'total_money' => 45,
            'phone' => '786765676',
            'address' => 'lahore',
            'city' => 'lahore',

        ]);
    }
}
