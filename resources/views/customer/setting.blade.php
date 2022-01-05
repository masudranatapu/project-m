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
        .profile_image_view {
            width: 100px;
            height: 100px;
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
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item {{ Route::is('customer.dashboard') ? 'active' : '' }}">
                                <a class="{{ Route::is('customer.dashboard') ? 'text-white' : '' }}" href="{{ route('customer.dashboard') }}">My Profile</a>
                            </li>
                            <li class="list-group-item {{ Route::is('customer.order') ? 'active' : '' }}">
                                <a class="{{ Route::is('customer.order') ? 'text-white' : '' }}" href="{{ route('customer.order') }}">Orders</a>
                            </li>
                            <li class="list-group-item {{ Route::is('customer.wishlist') ? 'active' : '' }}">
                                <a class="{{ Route::is('customer.wishlist') ? 'text-white' : '' }}" href="{{ route('customer.wishlist') }}">Wishlist</a>
                            </li>
                            <li class="list-group-item {{ Route::is('customer.profile') ? 'active' : '' }}">
                                <a class="{{ Route::is('customer.profile') ? 'text-white' : '' }}" href="{{ route('customer.profile') }}">Setting</a>
                            </li>
                        </ul>
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
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item mr-2">
                                    <a class="nav-link active" id="pills-profile-update-tab" data-toggle="pill" href="#pills-profile-update" role="tab" aria-controls="pills-profile-update" aria-selected="true">Profile Update</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-change-password-tab" data-toggle="pill" href="#pills-change-password" role="tab" aria-controls="pills-change-password" aria-selected="false">Change Password</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-profile-update" role="tabpanel" aria-labelledby="pills-profile-update-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('customer.profile.update', Auth::user()->id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Name </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ Auth::user()->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Email Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ Auth::user()->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Profile Image</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="image" class="form-control" onChange="profileUpdate(this)">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Old Profile Image</label>
                                                    <div class="col-sm-9">
                                                        <img class="profile_image_view" src=" @if(Auth::user()->image) {{ asset(Auth::user()->image) }} @else {{ asset('demomedia/demoprofile.png') }} @endif" id="profileShow" alt="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Phone Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ Auth::user()->phone }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="address" class="form-control" cols="30" rows="3" placeholder="Your Address">{{ Auth::user()->address }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-change-password" role="tabpanel" aria-labelledby="pills-change-password-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('customer.password.update', Auth::user()->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Old Password </label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="oldpassword" class="form-control" placeholder="Old Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">New Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="password" class="form-control" placeholder="New Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="password_confirmation" class="form-control" placeholder="New Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"></label>
                                                    <div class="col-sm-9">
                                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
    <script>
        function profileUpdate(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profileShow').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush