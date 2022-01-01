@extends('layouts.frontend.app')

@section('title')
    {{ $title }}
@endsection

@section('meta')

@endsection
    @php
        $website = App\Models\Website::latest()->first();
    @endphp
@push('css')
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
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
    <!--breadcrumbs area end-->
    <div class="category_section  py-4 ">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="card p-1">
                        <div class="card-body">
                            <h4>Leave your message for contact us</h4>
                            <form action="{{ route('contact.us') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Your Name </label>
                                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Your Email </label>
                                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phonne Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Leave your message</label>
                                        <textarea  name="message" id="" cols="30" rows="3" class="form-control" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <input type="submit" value="Contact Us"  class="btn btn-success" >
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card p-1">
                        <div class="card-body">
                            <h5>Compani Address</h5>
                            <div class="card-body">
                                <h4>Conpany  Name : {{ $website->name }}</h4>
                                <h5>Conpany Email : <a href="mailto:{{ $website->email }}"> {{ $website->email }} </a></h5>
                                <p6>Phone  Number : <a href="tel:{{ $website->phone }}"> {{ $website->phone }} </a></h6>
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