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
        .wishlist_image {
            width: 60px;
            height: 60px;
        }
        .wishlist_image_view {
            width: 300px;
            height: 300px;
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
                        <img class="card-img-top" src=" @if(Auth::user()->image) {{ asset(Auth::user()->image) }} @else {{ asset('demomedia/demoprofile.png') }} @endif" alt="Card image cap">
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
                        <div class="card-header bg-info">
                            <h4 class="text-white">Your Order List</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>Order Code</th>
                                    <th>Date</th>
                                    <th>Pyment Method</th>
                                    <th>Price</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key => $order)
                                        <tr class="@if($order->order_status == 'Canceled') text-danger @endif">
                                            <td>{{ $order->order_code }}</td>
                                            <td>{{ $order->created_at->format('d M Y h:i A') }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->total }} TK</td>
                                            <td>{{ $order->order_status }}</td>
                                            <td>
                                                <a href="{{ route('customer.order.view', $order->id) }}" class="btn btn-success" title="Order View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @if($order->order_status == "Pending")
                                                    <button title="Cancle Order" class="btn btn-danger" type="button" onclick="deleteData({{ $order->id }})">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $order->id }}" action="{{ route('customer.order.cancel', $order->id) }}" method="get" style="display: none;">
                                                        @csrf
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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