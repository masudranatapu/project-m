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
    <form action="">
        <div class="our_services bg-white">
            <div class="container">
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
                                        <input type="text" value="{{ Auth::user()->name }}" placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Your Email</label>
                                        <input type="email" value="{{ Auth::user()->email }}"  placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="">Area / District/ City</label>
                                        <select name="bill_div_id" id="billing_div_id">
                                            <option value="" disabled selected>Select One</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Zone / Thana / </label>
                                        <select name="bill_dis_id" id="bill_dis_id">
                                            <option disabled selected> First Select Area/ District / City</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Thana Code</label>
                                        <input type="text"  placeholder="Thana Code">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" value="{{ Auth::user()->phone }}" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="">Your Address</label>
                                        <textarea name="" id="" cols="30" rows="3" placeholder="Your Address">{{ Auth::user()->address }}</textarea>
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
                                        <input type="text" value="{{ Auth::user()->name }}" placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Your Email</label>
                                        <input type="email" value="{{ Auth::user()->email }}"  placeholder="Your Email">
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
                                        <input type="text" value="{{ Auth::user()->phone }}" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="">Your Address</label>
                                        <textarea name="" id="" cols="30" rows="3" placeholder="Your Address">{{ Auth::user()->address }}</textarea>
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
                                @php 
                                    $total = 0;
                                @endphp
                                @if(session('cart'))
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
                                            @foreach(session('cart') as $key => $checkoutDetails)
                                                @php
                                                    $total += $checkoutDetails['price'] * $checkoutDetails['quantity'];
                                                @endphp
                                                <tr>
                                                    <input type="hidden" name="product_id[]" value="{{ $key }}">
                                                    <input type="hidden" name="quantity[]" value="{{ $checkoutDetails['quantity'] }}">
                                                    <input type="hidden" name="size_id[]" value="{{ $checkoutDetails['size_id'] }}">
                                                    <input type="hidden" name="color_id[]" value="{{ $checkoutDetails['color_id'] }}">
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
                                        </tbody>
                                    </table>
                                    <ul class="list-group">
                                        @if($giftamounts->status == 1)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="d-flex gap-2 align-items-center flex-wrap">
                                                    <input value="{{ $giftamounts->gift_amount }}" name="gift_amount" style="width: auto;" type="checkbox" id="gift">
                                                    <label class="mb-0 lable-cursor" for="gift">Gift Wrapping</label>
                                                </span>
                                                <span class="pull-right text-danger" id="color_gift">{{ $giftamounts->gift_amount }} TK</span>
                                            </li>
                                        @endif
                                        @if($vatamounts->status == 1)
                                            @php
                                                $vatprice = ($total * $vatamounts->vat_amount) / 100 ;
                                            @endphp
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="d-flex gap-2 align-items-center flex-wrap">
                                                    <input value="{{ $vatprice }}" name="vat_amount" style="width: auto;" type="checkbox" id="vat">
                                                    <label class="mb-0 lable-cursor" for="vat">Vat</label>
                                                    <small>( VAT will be applicable on total purchase )</small>
                                                </span>
                                                <span class="pull-right text-danger"> {{ $vatprice }} TK</span>
                                            </li>
                                        @endif
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <input type="hidden" name="shipping_amount" value="0">
                                            Delivery Charge
                                            <span class="pull-right"> 0 Tk</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <input type="hidden" class="sub_total_amount" name="sub_total" value="{{$total}}">
                                            Sub Totals
                                            <span class="pull-right"> <span id="sub_total">{{ $total }}</span> Tk</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Grand Total
                                            <span class="pull-right"><span id="grand_total">{{ $total }}</span> Tk</span>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script>
        $(".shippingInformation").click(function(){
            $("#shippingDisplay").slideToggle();
        });
    </script>
    <script>
        $('#gift').change(function(){
            var giftChecked = this.checked ? '1' : '0';
            // alert(c);
            if( giftChecked == '1') {
                var gift_amount = $("#gift").val();
                // alert(gift_amount);
                var sub_total = $("#sub_total").text();
                var grand_total = $("#grand_total").text();
                var subtotal = (parseInt(sub_total) + parseInt(gift_amount));
                $("#sub_total").empty().html(subtotal);
                $(".sub_total_amount").empty().val(subtotal);

                var grand_total = (parseInt(grand_total) + parseInt(gift_amount));
                $("#grand_total").empty().html(grand_total);
            }else {
                var gift_amount = $("#gift").val();
                // alert(gift_amount);
                var sub_total = $("#sub_total").text();
                var grand_total = $("#grand_total").text();
                var subtotal = (parseInt(sub_total) - parseInt(gift_amount));
                $("#sub_total").empty().html(subtotal);

                var grand_total = (parseInt(grand_total) - parseInt(gift_amount));
                $("#grand_total").empty().html(grand_total);
                $(".sub_total_amount").empty().val(subtotal);
            }
        });
        $('#vat').change(function(){
            var vatChecked = this.checked ? '1' : '0';
            // alert(c);
            if( vatChecked == '1') {
                var gift_amount = $("#vat").val();
                // alert(gift_amount);
                var sub_total = $("#sub_total").text();
                var grand_total = $("#grand_total").text();
                var subtotal = (parseInt(sub_total) + parseInt(gift_amount));
                $("#sub_total").empty().html(subtotal);
                $(".sub_total_amount").empty().val(subtotal);

                var grand_total = (parseInt(grand_total) + parseInt(gift_amount));
                $("#grand_total").empty().html(grand_total);
            }else {
                var gift_amount = $("#vat").val();
                // alert(gift_amount);
                var sub_total = $("#sub_total").text();
                var grand_total = $("#grand_total").text();
                var subtotal = (parseInt(sub_total) - parseInt(gift_amount));
                $("#sub_total").empty().html(subtotal);
                $(".sub_total_amount").empty().val(subtotal);

                var grand_total = (parseInt(grand_total) - parseInt(gift_amount));
                $("#grand_total").empty().html(grand_total);
            }
        });
    </script>
@endpush