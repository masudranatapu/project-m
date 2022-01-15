<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vat;
use App\Models\Gift;

class VatAndGiftAmountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Gift::insert([
            'gift_amount' => '0',
            'status' => '0',
        ]);
        Vat::insert([
            'vat_amount' => '0',
            'status' => '0',
        ]);
    }
}