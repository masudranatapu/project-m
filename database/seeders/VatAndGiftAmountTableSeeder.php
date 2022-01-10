<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VatAndGift;

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
        VatAndGift::insert([
            'vat_amount' => '0',
            'gift_amount' => '0',
            'status' => '0',
        ]);
    }
}