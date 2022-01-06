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
                            <h5 class="text-white">Your profile informaiton</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="float-left">
                                                <h5>Your Name </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <h5> : </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <h5>{{ Auth::user()->name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="float-left">
                                                <h5>Your Email </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <h5> : </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <h5>{{ Auth::user()->email }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="float-left">
                                                <h5>Phone Number </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <h5> : </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <h5>{{ Auth::user()->phone }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="float-left">
                                                <h5>Address </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <h5> : </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <h5>{{ Auth::user()->address }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>         
    </div>
@endsection

@push('js')

@endpush