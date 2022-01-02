@extends('layouts.frontend.app')

@section('title')
    Register
@endsection

@section('meta')

@endsection

@push('css')
    
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
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Register a new account </h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Your Name </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" required class="form-control" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" required class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="phone" required class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" required class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address </label>
                                    <div class="col-sm-9">
                                        <textarea name="address" class="form-control" id="" cols="30" rows="2" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-lg btn-success">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-9 offset-md-3">
                                <a href="{{ route('register') }}">
                                    Create an account ?
                                </a>
                                <a class="float-right" href="{{ route('password.request') }}">
                                    Forget your password ?
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush