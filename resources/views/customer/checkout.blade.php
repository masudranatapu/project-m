@extends('layouts.frontend.app')

@section('title')
    {{$title}}
@endsection

@section('meta')

@endsection

@push('css')
    <style>
        .checkout_image_size {
            width: 50px;
            height: 50px;
        }
        hr {
            margin: 2px 0;
            border-bottom: 1px solid #bbbcbf;
        }
    </style>
@endpush

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area commun_bread py-3 grey-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul class="text-capitalize">
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>{{ $title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="our_services bg-white">
        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h4>Billing Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Your Name</label>
                                        <input type="text" value="" placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Your Email</label>
                                        <input type="email"  placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="">Area / District/ City</label>
                                        <select name="" id="">
                                            <option value="" disabled selected>Select One</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Zone / Thana / </label>
                                        <select name="" id="">
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Thana Code</label>
                                        <input type="text"  placeholder="Thana Code">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Phone Number</label>
                                        <input type="text"  placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="">Your Address</label>
                                        <textarea name="" id="" cols="30" rows="3" placeholder="Your Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <a href="javascript:;" class="shippingInformation">
                                <div class="card-header bg-info text-white">
                                    <h4>Shipping Information</h4>
                                </div>
                            </a>
                            <div class="card-body" id="shippingDisplay" style="display: none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Your Name</label>
                                        <input type="text" value="" placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Your Email</label>
                                        <input type="email"  placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="">Area / District/ City</label>
                                        <select name="" id="">
                                            <option value="" disabled selected>Select One</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Zone / Thana / </label>
                                        <select name="" id="">
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Thana Code</label>
                                        <input type="text"  placeholder="Thana Code">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Phone Number</label>
                                        <input type="text"  placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="">Your Address</label>
                                        <textarea name="" id="" cols="30" rows="3" placeholder="Your Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h4>Checkout Summary</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="10%">Image</th>
                                            <th width="50%">Name</th>
                                            <th width="20%">Price</th>
                                            <th width="20%">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $total = 0;
                                        @endphp
                                        @if(session('cart'))
                                            @foreach(session('cart') as $key => $checkoutDetails)
                                                @php
                                                    $total += $checkoutDetails['price'] * $checkoutDetails['quantity'];
                                                @endphp
                                                <tr>
                                                    <th class="text-center">
                                                        <img class="checkout_image_size" src="{{asset($checkoutDetails['image'])}}" alt="">
                                                    </th>
                                                    <td>
                                                        {{ $checkoutDetails['name'] }} X {{ $checkoutDetails['quantity'] }}
                                                        <br>
                                                        @if($checkoutDetails['size_id'])
                                                            @php
                                                                $size = App\Models\Size::findOrFail($checkoutDetails['size_id']);
                                                            @endphp
                                                            <b class="badge text-success">Size : {{$size->name}}</b>
                                                            <hr>
                                                        @endif
                                                        @if($checkoutDetails['color_id'])
                                                            @php
                                                                $color = App\Models\Color::findOrFail($checkoutDetails['color_id']);
                                                            @endphp
                                                            <b class="badge text-info">Color: {{ $color->name }}</b>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">{{ $checkoutDetails['price'] }} Tk</td>
                                                    <td class="text-center">{{ $checkoutDetails['price'] * $checkoutDetails['quantity'] }} Tk</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Sub Total
                                        <span class="pull-right">{{ $total }} Tk</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Gift Wrapping
                                        <span class="pull-right">0 TK</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Delivery Charge
                                        <span class="pull-right"> 0 Tk</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Vat
                                        <span class="pull-right">0 Tk</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Grand Total
                                        <span class="pull-right">{{ $total + 0 }} Tk</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header bg-info text-white">
                                <h4>Payment Method</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(".shippingInformation").click(function(){
            $("#shippingDisplay").slideToggle();
        });
    </script>
@endpush