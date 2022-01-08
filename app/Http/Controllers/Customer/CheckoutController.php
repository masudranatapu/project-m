<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $title = "Checkout";
        $divisions = Division::latest()->get();
        return view('customer.checkout', compact('title', 'divisions'));
    }
}
