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
                        <div class="card-header bg-info">
                            <h4 class="text-white">Your Wishlist Product List</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">#SL</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Name </th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <!-- product -->
                                <tbody>
                                    @foreach($wishlists as $key => $wishlist)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>
                                                <img class="wishlist_image" src="{{ asset($wishlist['product']['thambnail'] ) }}" alt="">
                                            </td>
                                            <td>{{ $wishlist['product']['name'] }}</td>
                                            <td>{{ $wishlist['product']['sell_price'] }}</td>
                                            <td>
                                                <a href="{{ route('add_to_cart', $wishlist->product_id) }}" class="btn btn-lg btn-info add_to_cart_size">
                                                    <i class="fa fa-cart-plus mr-2"></i>
                                                </a>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#view_for_add_to_cart_{{$key}}">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button title="Remove Wishlist" class="btn btn-danger waves-effect" type="button" onclick="deleteData({{ $wishlist->id }})">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <form id="delete-form-{{ $wishlist->id }}" action="{{ route('customer.wishlist.destroy', $wishlist->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </td>
                                            <div class="modal fade" id="view_for_add_to_cart_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4>{{ $wishlist['product']['name'] }}</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="text-center mb-2">
                                                                    <img class="wishlist_image_view" src="{{ asset($wishlist['product']['thambnail'] ) }}" alt="">
                                                                </div>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-md-4"><div class="float-left"><h5>Product Name</h5></div></div>
                                                                            <div class="col-md-2"><div class="text-center"><h5> : </h5></div></div>
                                                                            <div class="col-md-6"><div class="float-right"><h5>{{ $wishlist['product']['name'] }}</h5></div> </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-md-4"><div class="float-left"><h5>Stock Status</h5></div></div>
                                                                            <div class="col-md-2"><div class="text-center"><h5> : </h5></div></div>
                                                                            <div class="col-md-6"><div class="float-right"><h5>@if($wishlist['product']['availability'] == 1) <span class="badge text-white bg-success">Available</span> @else <span class="badge text-whtie bg-danger">Available</span>   @endif</h5></div> </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-md-4"><div class="float-left"><h5>Product Price </h5></div></div>
                                                                            <div class="col-md-2"><div class="text-center"><h5> : </h5></div></div>
                                                                            <div class="col-md-6"><div class="float-right"><h5>{{ $wishlist['product']['sell_price'] }}</h5></div> </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="card-footer">
                                                                <form action="{{ route('buynow') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" value="{{ $wishlist->product_id }}">
                                                                    <button type="submit" class="btn btn-lg btn-success add_to_cart_size">
                                                                        <i class="fa fa-shopping-bag mr-2"></i>
                                                                        Buy Now
                                                                    </button>
                                                                </form>
                                                                <a href="{{ route('add_to_cart', $wishlist->product_id) }}" class="btn btn-lg btn-success add_to_cart_size float-right">
                                                                    <i class="fa fa-cart-plus mr-2"></i>
                                                                    Add To Cart
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                confirmButtonText: 'Yes, remove it!',
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