<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vat;

class VatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Vat::insert([
            'vat_amount' => '0',
            'status' => '0',
        ]);
    }
}
