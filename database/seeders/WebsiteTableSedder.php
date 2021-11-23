<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;

class WebsiteTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Website::insert([
            'name' => 'Demo Site Name',
            'address' => 'demo Address',
            'email' => 'demo@gmail.com',
            'phone'=> '01711111111',
        ]);
    }
}
