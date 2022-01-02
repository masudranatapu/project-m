@extends('layouts.frontend.app')

@section('title')
    {{$title}}
@endsection

@section('meta')

@endsection

@push('css')
    <style>
        .card-img-top {
            height: 280px;
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
                    <div class="categorie_banner_title">
                        <h3>Blogs</h3>
                    </div>
                </div>    
            </div>
            <div class="row cat">
                @foreach($blogs as $key => $blog)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset($blog->image) }}" class="card-img-top" alt="{{$blog->name}}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->name }}</h5>
                                <p class="card-text">{{ substr($blog->details, 0,  50) }}</p>
                                <a href="{{ route('blog.details', $blog->slug) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush