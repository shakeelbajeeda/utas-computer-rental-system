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
        $this->call([
            ProductSeeder::class,
        ]);
        DB::table('users')->insert([
            'name' => 'waheed',
            'email'=> 'waheed@nodesol.com',
            'password' => \Hash::make('123456789'),
            'role'=> 'Web Manager',
            'total_money' => 45,
            'phone' => '786765676',
            'address' => 'lahore',
            'city' => 'lahore',

        ]);
    }
}
