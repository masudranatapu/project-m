<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\VatAndGift;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $title = "Checkout";
        $divisions = Division::latest()->get();
        $vatsgifts = VatAndGift::latest()->first();
        return view('customer.checkout', compact('title', 'divisions', 'vatsgifts'));
    }
    // get district id for cehcktout 
    public function divisionDistrict($id)
    {
        $data = District::where('division_id', $id)->latest()->get();
        return json_encode($data);
    }
}
