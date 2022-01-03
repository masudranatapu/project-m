<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ViewController extends Controller
{
    //
    public function category($slug)
    {
        return $slug;
    }
    public function productDetails($slug)
    {
        return $slug;
    }
}
