<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchases;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Purchase Product";
        
        $check_stock_product = Purchases::pluck('product_id')->toArray();
        $purchases = Purchases::latest()->get();
        $products = Product::whereNotIn('id', $check_stock_product)->latest()->get();

        $editproducts = Product::latest()->get();
        return view('admin.stock.index', compact('title', 'purchases', 'products', 'editproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'required',
        ]);
        Purchases::insert([
            'product_id' => $request->product_id,
            'product_code' => $request->product_code,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Purchase product save :-)','Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'required',
        ]);
        Purchases::findOrFail($id)->update([
            'product_id' => $request->product_id,
            'product_code' => $request->product_code,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::info('Purchase product update :-)','Info');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // ajax for proudct parchase 

    public function stockPurchase(Request $request)
    {
        $product_id = $request->product_id;
        // return $product_id;
        $product = Product::where('id', $product_id)->latest()->first();
        // return $product;
        $product_code = $product->product_code;
        $product_name = $product->name;
        return $data = [$product_code, $product_name];
    }
}
