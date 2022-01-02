<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;
use Carbon\Carbon;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        About::insert([
            'name' => "About Us",
            'details' => "About Details",
            'created_at' => Carbon::now(),
        ]);
    }
}
