<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class ViewController extends Controller
{
    //
    public function category($slug)
    {
        return $slug;
    }
    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $title = $product->name;
        $bestdeals = Product::where('product_type', 'Best Deals')->where('status', 1)->latest()->get();
        $sliders = Slider::latest()->get();
        return view('pages.productdetails', compact('title', 'product', 'sliders'));
    }
}
