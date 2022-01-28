@extends('layouts.backend.app')

@section('title')
    {{$title}}
@stop

@push('css')
    <style>
        .my_order_image_size {
            width: 60px;
            height: 60px;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Order View</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-success">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="@if($orders->order_status == 'Canceled') text-danger @endif">Order View <small>( {{ $orders->order_code }} )</small> </h4>
                                </div>
                                @if($orders->order_status == 'Canceled')
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9 text-right">
                                                <h5 class="text-danger">This order was canceled</h5>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @if($orders->order_status == 'Successed')
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9 text-right">
                                                <h4>Successed</h4>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-8"></div>
                                                <div class="col-md-4 text-right">
                                                    <form action="{{ route('admin.orders.status') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="order_id" value="{{ $orders->id }}">
                                                        <select name="order_status" id="" class="form-control" onchange="this.form.submit()">
                                                            <option value="">Select One</option>
                                                            <option @if($orders->order_status == 'Pending') selected @endif value="Pending">Pending</option>
                                                            <option @if($orders->order_status == 'Confirmed') selected @endif value="Confirmed">Confirmed</option>
                                                            <option @if($orders->order_status == 'Processing') selected @endif value="Processing">Processing</option>
                                                            <option @if($orders->order_status == 'Delivered') selected @endif value="Delivered">Delivered</option>
                                                            <option @if($orders->order_status == 'Successed') selected @endif value="Successed">Successed</option>
                                                            <option @if($orders->order_status == 'Canceled') selected @endif value="Canceled">Canceled</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Billing Information</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Name
                                            <span class="text-right">{{ $billinginfo->billing_name }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Email
                                            <span class="text-right">
                                                <a href="mailto:{{ $billinginfo->billing_email }}">
                                                    {{ $billinginfo->billing_email }}
                                                </a>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Phone
                                            <span class="text-right">
                                                <a href="tel:{{ $billinginfo->billing_phone }}">
                                                    {{ $billinginfo->billing_phone }}
                                                </a>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Address
                                            <span class="text-right">{{ $billinginfo->billing_address }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4>Shipping Information</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Name
                                            <span class="text-right">{{ $shippinginfo->shipping_name }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Email
                                            <span class="text-right">
                                                <a href="mailto:{{ $shippinginfo->shipping_email }}">
                                                    {{ $shippinginfo->shipping_email }}
                                                </a>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Phone
                                            <span class="text-right">
                                                <a href="tel:{{ $shippinginfo->shipping_phone }}">
                                                    {{ $shippinginfo->shipping_phone }}
                                                </a>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Address
                                            <span class="text-right">{{ $shippinginfo->shipping_address }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-success">
                                            Payment Method
                                            <span class="text-right">{{ $orders->payment_method }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-info">
                                            Payment Status
                                            <span class="text-right">{{ $orders->status }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10%">Photo</th>
                                        <th class="text-center" width="40%">Product Name</th>
                                        <th class="text-center" width="12.5%">Size</th>
                                        <th class="text-center" width="12.5%">Color</th>
                                        <th class="text-center" width="5%">Quantity</th>
                                        <th class="text-center" width="10%">Price</th>
                                        <th class="text-center" width="10%">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $product_id = explode(',', $orders->product_id);
                                        $size_id = explode(',', $orders->size_id);
                                        $color_id = explode(',', $orders->color_id);
                                        $quantity = explode(',', $orders->quantity);
                                        $i = 1;
                                    @endphp
                                    @foreach($product_id as $key => $product_id)
                                        @php
                                            $products = App\Models\Product::findOrFail($product_id);
                                        @endphp
                                        <tr>
                                            <td>
                                                <img class="my_order_image_size" src="{{ asset($products->thambnail) }}" alt="">
                                            </td>
                                            <td>
                                                {{ $products->name }}
                                            </td>
                                            <td>
                                                @if(!(count($size_id) < $i) && !($orders->size_id  == NULL) )
                                                    @php
                                                        $sizes = App\Models\Size::findOrFail($size_id[$key]);
                                                    @endphp
                                                    {{ $sizes->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if(!(count($color_id) < $i) && !($orders->color_id  == NULL))
                                                    @php
                                                        $colors = App\Models\Color::findOrFail($color_id[$key]);
                                                    @endphp
                                                    {{ $colors->name }}
                                                @endif
                                            </td>
                                            <td>{{ $quantity[$key] }} </td>
                                            <td>{{ $products->sell_price }} TK</td>
                                            <td>{{ $products->sell_price * $quantity[$key] }} TK</td>
                                        </tr>
                                        @php 
                                            $i++;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="text-right">Vat</td>
                                        <td colspan="2" class="text-right">{{$orders->vat_amount}} TK</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Shippiing Amount</td>
                                        <td colspan="2" class="text-right">{{$orders->shipping_amount}} TK</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Sub Total</td>
                                        <td colspan="2" class="text-right">{{$orders->sub_total}} TK</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">Grand Total</td>
                                        <td colspan="2" class="text-right">{{$orders->total}} TK</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                @if($orders->order_status == "Canceled")
                                    <div class="col-md-6">
                                        <h5 class="text-danger">This order was canceled</h5>
                                    </div>
                                @else
                                    @if($orders->order_status == 'Successed')
                                        <div class="col-md-12 text-right">
                                            <h4 class="badge bg-success text-white">Order Successed</h4>
                                        </div>
                                    @else
                                        <div class="col-md-12 text-right">
                                            <h5>Take order management forward</h5>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush