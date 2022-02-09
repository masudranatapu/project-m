<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Review;

class ViewController extends Controller
{
    //
    public function category($slug)
    {
        $findCategory = Category::where('slug', $slug)->first();
        $title =  $findCategory->name;
        $products = Product::where('category_id', $findCategory->id)->orWhere('subcategory_id', $findCategory->id)->orWhere('subsubcategory_id', $findCategory->id)->latest()->get();
        $categories = Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->get();
        $subcategories = Category::where('parent_id', '!=', NULL)->where('child_id', NULL)->latest()->get();
        $subsubcategories = Category::where('parent_id', '!=', NULL)->where('child_id', '!=', NULL)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        return view('pages.categoryproduct', compact('title', 'products', 'categories', 'subcategories', 'subsubcategories', 'brands'));
    }
    
    public function brand($slug)
    {
        $findBrands = Brand::where('slug', $slug)->first();
        $title =  $findBrands->name;
        $products = Product::where('brand_id', $findBrands->id)->latest()->get();
        $categories = Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->get();
        $subcategories = Category::where('parent_id', '!=', NULL)->where('child_id', NULL)->latest()->get();
        $subsubcategories = Category::where('parent_id', '!=', NULL)->where('child_id', '!=', NULL)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        return view('pages.categoryproduct', compact('title', 'categories', 'subcategories', 'subsubcategories', 'brands', 'products'));
    }
    
    public function priceProduct(Request $request)
    {
        $title = "Price By Products";
        $categories = Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->get();
        $subcategories = Category::where('parent_id', '!=', NULL)->where('child_id', NULL)->latest()->get();
        $subsubcategories = Category::where('parent_id', '!=', NULL)->where('child_id', '!=', NULL)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        $products = Product::whereBetween('sell_price', [$request->min_price, $request->max_price])->get();
        return view('pages.categoryproduct', compact('title', 'categories', 'subcategories', 'subsubcategories', 'brands', 'products'));
    }

    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $title = $product->name;
        $bestdeals = Product::where('product_type', 'Best Deals')->where('status', 1)->latest()->get();
        // reviews area 
        $reviews = Review::where('product_id', $product->id)->latest()->get();
        $fiveStarReviews = Review::where('product_id', $product->id)->where('rating', 5)->latest()->get();
        $fourStarReviews = Review::where('product_id', $product->id)->where('rating', 4)->latest()->get();
        $threeStarReviews = Review::where('product_id', $product->id)->where('rating', 3)->latest()->get();
        $twoStarReviews = Review::where('product_id', $product->id)->where('rating', 2)->latest()->get();
        $oneStarReviews = Review::where('product_id', $product->id)->where('rating', 1)->latest()->get();

        return view('pages.productdetails', compact('title', 'product', 'reviews', 'fiveStarReviews', 'fourStarReviews', 'threeStarReviews', 'twoStarReviews', 'oneStarReviews'));
    }
}
