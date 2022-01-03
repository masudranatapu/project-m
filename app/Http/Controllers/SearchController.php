<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;

class SearchController extends Controller
{
    //
    public function searching(Request $request)
    {
        // return $request;
        $title = $request->search_product;
        $searching = $request->search_product;
        $create_url = "search_product=".$searching;
        if(isset($searching)) {
            $searchProducts = Product::where('name', 'LIKE', '%'.$searching.'%')->orWhere('slug', 'LIKE', '%'.$searching.'%')->latest()->get();
        }else {
            $searchProducts = "";
            Toastr::warning('You have no name for search product:-)','warning');
            return redirect()->back();
        }
		Toastr::success('Yoru searching products is !', 'success');
        return view('pages.searchproduct', compact('title', 'searchProducts'));
    }
}
