<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    //
    
    public function information()
    {
        $title = "Customer Profile";

        return view('customer.index', compact('title'));
    }
}
