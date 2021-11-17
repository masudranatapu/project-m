<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
            'role_id'=> '1',
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::insert([
            'role_id'=> '2',
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
