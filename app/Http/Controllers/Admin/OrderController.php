<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Sold;
use App\Models\Product;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "All Order";
        $orders =  Order::latest()->get();
        return view('admin.order.index',compact('title', 'orders'));
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
        $title = "Order View";
        $orders = Order::where('id', $id)->latest()->first();
        $billinginfo = BillingAddress::where('order_id', $id)->latest()->first();
        $shippinginfo = ShippingAddress::where('order_id', $id)->latest()->first();
        return view('admin.order.orderdetails', compact('title', 'orders', 'billinginfo', 'shippinginfo'));
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

    // order pending 
    public function ordersPending()
    {
        //
        $title = "Pending Orders";
        $orders =  Order::where('order_status', 'Pending')->latest()->get();
        return view('admin.order.index',compact('title', 'orders'));
    }
    // order confirmed 
    public function ordersConfirmed()
    {
        //
        $title = "Confirmed Orders";
        $orders =  Order::where('order_status', 'Confirmed')->latest()->get();
        return view('admin.order.index',compact('title', 'orders'));
    }
    // order processing 
    public function ordersProcessing()
    {
        //
        $title = "Processing Orders";
        $orders =  Order::where('order_status', 'Processing')->latest()->get();
        return view('admin.order.index',compact('title', 'orders'));
    }
    // orders delivered 
    public function ordersDelivered()
    {
        //
        $title = "Delivered Orders";
        $orders =  Order::where('order_status', 'Delivered')->latest()->get();
        return view('admin.order.index',compact('title', 'orders'));
    }
    // orders successed 
    public function ordersSuccessed()
    {
        //
        $title = "Successed Orders";
        $orders =  Order::where('order_status', 'Successed')->latest()->get();
        return view('admin.order.index',compact('title', 'orders'));
    }
    // orders canceled 
    public function ordersCanceled()
    {
        //
        $title = "Canceled Orders";
        $orders =  Order::where('order_status', 'Canceled')->latest()->get();
        return view('admin.order.index',compact('title', 'orders'));
    }
    // order status with paid and delivar processing canceled pending and confirm
    public function ordersStatus(Request $request)
    {
        //
        $ordersId = $request->order_id;
        $orderStatus = $request->order_status;

        if($orderStatus == "Pending"){
            Order::findOrFail($ordersId)->update([
                'order_status' => 'Pending',
            ]);

        }elseif($orderStatus == "Confirmed") {
            Order::findOrFail($ordersId)->update([
                'order_status' => 'Confirmed',
            ]);
        }elseif($orderStatus == "Processing") {
            Order::findOrFail($ordersId)->update([
                'order_status' => 'Processing',
            ]);

        }elseif($orderStatus == "Delivered") {
            Order::findOrFail($ordersId)->update([
                'order_status' => 'Delivered',
                'status' => 'Paid',
            ]);

        }elseif($orderStatus == "Successed") {

            Order::findOrFail($ordersId)->update([
                'order_status' => 'Successed',
                'status' => 'Paid',
            ]);

            $allorders = Order::findOrFail($ordersId);

            $product_id = explode(",", $allorders->product_id);
            $myproudct_id = array_values($product_id);
            $allproducts = Product::whereIn('id', $myproudct_id)->get();
            
            $quantity = explode(",", $allorders->quantity);

            $myQuantity = array_combine($myproudct_id, $quantity);

            foreach($allproducts as $key => $allproduct){
                Sold::insert([
                    'order_id' => $ordersId,
                    'order_code' => $allorders->order_code,
                    'product_id' => $allproduct->id,
                    'product_code' => $allproduct->product_code,
                    'name' => $allproduct->name,
                    'quantity' => $myQuantity[$allproduct->id],
                    'created_at' => Carbon::now(),
                ]);
            }

        }elseif($orderStatus == "Canceled") {
            
            Order::findOrFail($ordersId)->update([
                'order_status' => 'Canceled',
                'status' => 'Return Paid',
            ]);

        }else {
            Toastr::error('Select your order status :-)','info');
            return redirect()->back();
        }
        Toastr::success('Order successfully '. $orderStatus . ' :-)','success');
        return redirect()->back();
    }
}
