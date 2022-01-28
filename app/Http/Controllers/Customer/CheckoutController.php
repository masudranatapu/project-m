<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Auth;
use App\Models\Division;
use App\Models\District;
use App\Models\Vat;
use App\Models\Order;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $title = "Checkout";
        $divisions = Division::latest()->get();
        $vatamounts = Vat::latest()->first();
        return view('customer.checkout', compact('title', 'divisions', 'vatamounts'));
    }
    // for billing informaiton
    public function getDivDisBilling($billing_div_id)
    {
        // return $billing_div_id;
        $bill_districts = District::where('division_id', $billing_div_id)->latest()->get();
        // return $bill_districts;

        $bill_divisions = Division::findOrFail($billing_div_id);
        $bill_divCharge = $bill_divisions->charge;
        // return $divCharge;
        return $data = [$bill_districts, $bill_divCharge];
    }

    // for shipping informaiton
    public function getDivDisShipping($shipping_div_id)
    {
        // return $shipping_div_id;
        $shipping_districts = District::where('division_id', $shipping_div_id)->latest()->get();
        // return $shipping_districts;

        $shipping_divisions = Division::findOrFail($shipping_div_id);
        $shipping_divCharge = $shipping_divisions->charge;
        // return $shipping_divCharge;
        return $data = [$shipping_districts, $shipping_divCharge];
    }
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            // for billing info 
            'billing_name' => 'required',
            'billing_email' => 'required',
            'billing_division_id' => 'required',
            'billing_district_id' => 'required',
            'billing_phone' => 'required',
            'billing_address' => 'required',
            // for order info
            'product_id' => 'required',
            'quantity' => 'required',
            'shipping_amount' => 'required',
            'sub_total' => 'required',
            'payment_method' => 'required',
        ]);
        // for product id
        if($request->product_id){
            $product_id = trim(implode(',', $request->product_id), ',');
        }else {
            $product_id = NULL;
        }
        // for product quantity
        if($request->quantity) {
            $quantity = trim(implode(',', $request->quantity), ',');
        }else {
            $quantity = NULL;
        }
        // for product size
        if($request->size_id) {
            $size_id = trim(implode(',', $request->size_id), ',');
        }else {
            $size_id = NULL;
        }
        // for product color
        if($request->color_id) {
            $color_id = trim(implode(',', $request->color_id), ',');
        }else {
            $color_id = NULL;
        }
        // create order code
        $latest_id = Order::select('id')->latest()->first();
        if(isset($latest_id)) {
            $order_code = "O-".sprintf('%05d', $latest_id->id + 1);
        }else {
            $order_code = "O-".sprintf('%05d', 1);
        }
        // for product vat 
        if($request->vat_amount) {
            $vat = $request->vat_amount;
            $total = $request->sub_total + $request->shipping_amount + $vat;
        }else {
            $vat = 0;
            $total = $request->sub_total + $request->shipping_amount + $vat;
        }
        // for order submitation 
        if($request->payment_method == "Cash" ) {
            // for order info
            $order_id = Order::insertGetId([
                'user_id' => Auth::user()->id,
                'order_code' => $order_code,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'size_id' => $size_id,
                'color_id' => $color_id,
                'vat_amount' => $vat,
                'shipping_amount' => $request->shipping_amount,
                'sub_total' => $request->sub_total,
                'total' => $total,
                'payment_method' => $request->payment_method,
                'payment_mobile_number' => $request->payment_mobile_number,
                'payment_transaction_id' => $request->payment_transaction_id,
                'payment_transaction_id' => $request->payment_transaction_id,
                'created_at' => Carbon::now(),
            ]);
            // for BillingAddress info
            BillingAddress::insert([
                'user_id' => Auth::user()->id,
                'order_id' => $order_id,
                'billing_name' => $request->billing_name,
                'billing_email' => $request->billing_email,
                'billing_division_id' => $request->billing_division_id,
                'billing_district_id' => $request->billing_district_id,
                'billing_thana_code' => $request->billing_thana_code,
                'billing_phone' => $request->billing_phone,
                'billing_address' => $request->billing_address,
                'created_at' => Carbon::now(),
            ]);
            // for ShippingAddress info
            // check shipping address info
                // for s-name check 
            if($request->shipping_name) {
                $shippingName = $request->shipping_name;
            }else {
                $shippingName = $request->billing_name;
            }
            // for s-email check 
            if($request->shipping_email) {
                $shippingEmail = $request->shipping_email;
            }else {
                $shippingEmail = $request->billing_email;
            }
            // for s-div-id check 
            if($request->shipping_division_id) {
                $shippingDivisionId = $request->shipping_division_id;
            }else {
                $shippingDivisionId = $request->billing_division_id;
            }
            // for s-dis-id check 
            if($request->shipping_district_id) {
                $shippingDistrictId = $request->shipping_district_id;
            }else {
                $shippingDistrictId = $request->billing_district_id;
            }
            // for s-than-code check 
            if($request->shipping_thana_code) {
                $shippingThanaCode = $request->shipping_thana_code;
            }else {
                $shippingThanaCode = $request->billing_thana_code;
            }
            // for s-p check 
            if($request->shipping_phone) {
                $shippingPhone = $request->shipping_phone;
            }else {
                $shippingPhone = $request->billing_phone;
            }
            // for s-add chec 
            if($request->shipping_address) {
                $shippingAddress = $request->shipping_address;
            }else {
                $shippingAddress = $request->billing_address;
            }
            ShippingAddress::insert([
                'user_id' => Auth::user()->id,
                'order_id' => $order_id,
                'shipping_name' => $shippingName,
                'shipping_email' => $shippingEmail,
                'shipping_division_id' => $shippingDivisionId,
                'shipping_district_id' => $shippingDistrictId,
                'shipping_thana_code' => $shippingThanaCode,
                'shipping_phone' => $shippingPhone,
                'shipping_address' => $shippingAddress,
                'created_at' => Carbon::now(),
            ]);

            session()->forget('cart');
            Toastr::success('Order successfully done :-)','Success');
            return redirect()->route('customer.order');
        }else {
            Toastr::error('Your can not buy a product without select your payment getway :-)','error');
            return redirect()->back();
        }
    }
    public function orderCancel($id)
    {
        Order::findOrFail($id)->update([
            'order_status' => 'Canceled',
            'status' => 'Paid Canceled',
        ]);
        Toastr::warning('Order successfully cancel :-)','Success');
        return redirect()->back();
    }
}