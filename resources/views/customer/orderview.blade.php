@extends('layouts.frontend.app')

@section('title')
    {{$title}}
@endsection

@section('meta')

@endsection

@push('css')
    <style>
        .card-img-top {
            height: 220px;
        }
        .my_order_image_size {
            width: 60px;
            height: 60px;
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
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="@if(Auth::user()->image) {{ asset(Auth::user()->image) }} @else {{ asset('demomedia/demoprofile.png') }} @endif" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                        </div>
                        <div class="list-group">
                            <a href="{{ route('customer.dashboard') }}" class="list-group-item list-group-item-action {{ Route::is('customer.dashboard') ? 'active' : '' }}">
                                My Profile
                            </a>
                            <a href="{{ route('customer.order') }}" class="list-group-item list-group-item-action {{ Route::is('customer.order') ? 'active' : '' }}">
                                Orders
                            </a>
                            <a href="{{ route('customer.wishlist') }}" class="list-group-item list-group-item-action {{ Route::is('customer.wishlist') ? 'active' : '' }}">
                                Wishlist
                            </a>
                            <a href="{{ route('customer.profile') }}" class="list-group-item list-group-item-action {{ Route::is('customer.profile') ? 'active' : '' }}">
                                Setting
                            </a>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('home') }}" class="card-link btn btn-success">Home</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="card-link btn btn-danger float-right">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h4 class="@if($orders->order_status == 'Canceled') text-danger @endif">Order View <small>( {{ $orders->order_code }} )</small> </h4>
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
                                        <li class="list-group-item d-flex justify-content-between align-items-center active">
                                            Payment Method
                                            <span class="text-right">{{ $orders->payment_method }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center active">
                                            Payment Status
                                            <span class="text-right">{{ $orders->status }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
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
                                <div class="col-md-6">
                                    @if($orders->order_status == "Canceled")
                                        <h5 class="text-danger">This order was canceled</h5>
                                    @else
                                        @if($orders->order_status == 'Successed')
                                            <h4 class="badge bg-success text-white">Order Successed</h4>
                                        @else
                                        
                                        @endif
                                    @endif
                                </div>
                                <div class="col-md-6 text-right">
                                    @if($orders->order_status == "Pending")
                                        <button title="Cancle Order" class="btn btn-danger" type="button" onclick="deleteData({{ $orders->id }})">
                                        Cancle Order
                                        </button>
                                        <form id="delete-form-{{ $orders->id }}" action="{{ route('customer.order.cancel', $orders->id) }}" method="get" style="display: none;">
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('massage/sweetalert/sweetalert.all.js') }}"></script>
    <script type="text/javascript">
        function deleteData(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancle order!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    // event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your wishlist is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush