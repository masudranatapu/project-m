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
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Masud</td>
                                        <td>Rana</td>
                                        <td>Tapu</td>
                                        <td>Price</td>
                                        <td>Action</td>
                                    </tr>
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