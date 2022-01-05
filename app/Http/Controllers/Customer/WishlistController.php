<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Wishlist;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Auth;

class WishlistController extends Controller
{
    //
    public function index()
    {
        $title = "My Wishlist";
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->latest()->get();
        return view('customer.wishlist', compact('title', 'wishlists'));
    }
    public function orderIndex()
    {
        $title = "Order View";
        return view('customer.order', compact('title'));
    }
    public function wishlistStore(Request $request)
    {
        $findWishlistProduct = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->latest()->first();
        if($findWishlistProduct) {
            Toastr::error('Product already exist in your wishlist :-)','Error');
            return redirect()->back();
        }else {
            Wishlist::insert([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
            ]);
            Toastr::success('Product successfully on your wishlist :-)','success');
            return redirect()->back();
        }
    }
    public function review(Request $request)
    {
        //
        $validateData = $request->validate([
            'rating'=>'required',
        ]);
        Review::insert([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'name' => $request->name,
            'opinion' => $request->opinion,
            'rating' => $request->rating,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::success('Your review successfully done :-)','success');
        return redirect()->back();
    }
    public function destroy($id)
    {
        Wishlist::findOrFail($id)->delete();
        Toastr::warning('Your product remove from wishlist :-)','success');
        return redirect()->back();
    }
}
