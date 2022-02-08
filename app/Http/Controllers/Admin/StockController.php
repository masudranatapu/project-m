<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Sold;
use App\Models\Product;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Sold Product";
        $products = Product::latest()->get();
        $form = NULL;
        $to = NULL;
        $solds = Sold::latest()->get();
        return view('admin.sold.index', compact('title', 'products', 'solds', 'form', 'to'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function soldSearch(Request $request)
    {
        //
        $title = "Sold Search Product";
        $products = Product::latest()->get();
        $product_code = $request->product_code;
        $form = $request->formDate;
        $to = $request->toDate;
        if(isset($product_code)) {
            $solds = Sold::where('product_code', $product_code)->get();
        }
        if($form && $to) {
            $solds = Sold::whereBetween('created_at', [$form, $to])->get();
        }
        if($form && !$to){
            Toastr::error('For sold searching also select to date :-)','info');
            return redirect()->back();
        }
        if(!$form && $to){
            Toastr::error('For sold searching also select form date :-)','info');
            return redirect()->back();
        }
        if($product_code == NULL && $form == NULL && $to == NULL) {
            Toastr::error('For sold searching select product code or form and to date :-)','info');
            return redirect()->back();
        }
        return view('admin.sold.index', compact('title', 'products', 'solds', 'form', 'to'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showReport()
    {
        //
        $title = "Sold Product Report";
        $products = Product::latest()->get();
        $myproducts = Product::latest()->get();
        return view('admin.report.index', compact('title', 'products', 'myproducts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showReportSearch(Request $request)
    {
        //
        $product_code = $request->product_code;
        $title = "Sold Product Report";
        $myproducts = Product::latest()->get();
        $product_code = $request->product_code;
        if(isset($product_code)) {
            $products = Product::where('product_code', $product_code)->latest()->get();
        }else {
            Toastr::error('Select your product id for report :-)','info');
            return redirect()->back();
        }
        return view('admin.report.index', compact('title', 'products', 'myproducts'));
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
}
