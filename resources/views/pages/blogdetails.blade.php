@extends('layouts.frontend.app')

@section('title')
    {{ $title }}
@endsection

@section('meta')

@endsection

@push('css')
    <style>
        .card-img-top {
            height: 550px;
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
    <!--breadcrumbs area end-->
    <div class="category_section  py-4 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3">
                        <img src="{{ asset($blog->image) }}" class="card-img-top" alt="{{ $blog->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->name }}</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <p> Create Blog </p>
                                    <small>{{ $blog->created_at->format('d M Y h:i A') }}</small>
                                </div>
                                <div class="col-md-4">
                                    <p>Blog  Updated </p>
                                    <small>{{ $blog->updated_at->format('d M Y h:i A') }}</small>
                                </div>
                            </div>
                            <p class="card-text text-justify">
                                {!! $blog->details !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush