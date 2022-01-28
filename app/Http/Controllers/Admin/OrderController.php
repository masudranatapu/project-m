<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
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
            Toastr::info('Order successfully pending :-)','info');
            return redirect()->back();

        }elseif($orderStatus == "Confirmed") {

            Order::findOrFail($ordersId)->update([
                'order_status' => 'Confirmed',
            ]);
            Toastr::success('Order successfully confirmed :-)','success');
            return redirect()->back();
            
        }elseif($orderStatus == "Processing") {

            Order::findOrFail($ordersId)->update([
                'order_status' => 'Processing',
            ]);
            Toastr::success('Order successfully processing done :-)','success');
            return redirect()->back();

        }elseif($orderStatus == "Delivered") {

            Order::findOrFail($ordersId)->update([
                'order_status' => 'Delivered',
                'status' => 'Paid',
            ]);
            Toastr::success('Order successfully delivered done:-)','success');
            return redirect()->back();

        }elseif($orderStatus == "Successed") {
            Order::findOrFail($ordersId)->update([
                'order_status' => 'Successed',
                'status' => 'Paid',
            ]);
            Toastr::success('Order successfully successed :-)','success');
            return redirect()->back();

        }elseif($orderStatus == "Canceled") {

            Order::findOrFail($ordersId)->update([
                'order_status' => 'Canceled',
                'status' => 'Return Paid',
            ]);
            Toastr::success('Order successfully Canceled :-)','success');
            return redirect()->back();
        }else {
            Toastr::error('Select your order status :-)','info');
            return redirect()->back();
        }
    }
}
