<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Vat;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $title = "Checkout";
        $divisions = Division::latest()->get();
        $vatamounts = Vat::latest()->first();
        return view('customer.checkout', compact('title', 'divisions', 'vatamounts'));
    }
    // for billing informaiton
    public function getDivDisBilling($billing_div_id)
    {
        // return $billing_div_id;
        $bill_districts = District::where('division_id', $billing_div_id)->latest()->get();
        // return $bill_districts;

        $bill_divisions = Division::findOrFail($billing_div_id);
        $bill_divCharge = $bill_divisions->charge;
        // return $divCharge;
        return $data = [$bill_districts, $bill_divCharge];
    }

    // for shipping informaiton
    public function getDivDisShipping($shipping_div_id)
    {
        // return $shipping_div_id;
        $shipping_districts = District::where('division_id', $shipping_div_id)->latest()->get();
        // return $shipping_districts;

        $shipping_divisions = Division::findOrFail($shipping_div_id);
        $shipping_divCharge = $shipping_divisions->charge;
        // return $shipping_divCharge;
        return $data = [$shipping_districts, $shipping_divCharge];
    }
}