<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Gift;
use App\Models\Vat;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $title = "Checkout";
        $divisions = Division::latest()->get();
        $vatamounts = Vat::latest()->first();
        $giftamounts = Gift::latest()->first();
        return view('customer.checkout', compact('title', 'divisions', 'vatamounts', 'giftamounts'));
    }
    public function getDivDis($billing_div_id)
    {
        return $billing_div_id;
    }
}
