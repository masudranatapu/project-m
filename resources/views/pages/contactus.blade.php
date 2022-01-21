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
                <div class="col-md-6">
                    <div class="card p-1">
                        <div class="card-body">
                            <h4>Leave your message for contact us</h4>
                            <form action="{{ route('contact.us') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">Your Name </label>
                                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">Your Email </label>
                                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phonne Number">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Your Address">
                                    </div>
                                </div>
                                <div class="row mb-3">
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Compani Address</h5>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="float-left">
                                                <h6>Conpany  Name</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <h6> : </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <h6>{{ $website->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="float-left">
                                                <h6>Conpany Email</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <h6> : </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <h6><a href="mailto:{{ $website->email }}"> {{ $website->email }} </a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="float-left">
                                                <h6>Phone Number </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <h6> : </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <h6><a href="tel:{{ $website->phone }}"> {{ $website->phone }} </a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="float-left">
                                                <h6>Address </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-center">
                                                <h6> : </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <h6 class="text-justify">{{ $website->address }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5>Google Map Location </h5>
                            <iframe width="100%" height="231" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=535&amp;height=250&amp;hl=en&amp;q=Dhaka,%20Dhaka+(Konabari,%20Gazipur,%20Dhaka,%20Bangladesh)&amp;t=h&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">

                            </iframe>
                            <a href='https://www.embedmap.net/'>adding google maps to my website</a>
                            <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=6372145aff6bed1a07e2a55dd48b784777f7417a'>

                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush