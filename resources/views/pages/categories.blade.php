@extends('layouts.frontend.app')

@section('title')
    {{$title}}
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
                        <h3>Categories</h3>
                    </div>
                </div>    
            </div>
            <div class="row cat">
                @foreach($caegories as $key => $caegory)
                    <div class="col-lg-3 col-sm-4 col-6">
                        <div class="product text-center grey-section mb-4">
                            <figure class="product-media mb-0">
                                <a href="">
                                    <img src="{{ asset($caegory->image) }}" alt="product" class="w-100">
                                </a>
                            </figure>
                            <div class="category-bottom py-2">
                                <h3 class="title mb-0" title="Gardening">
                                    <a href="">{{ $caegory->name }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="category_section  py-4 ">
        <div class="container">
            <div class="breadcrumbs_area commun_bread py-3 grey-section mb-1">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <h4 class="text-center">All Sub Category</h4>
                        </div>
                    </div>
                </div>      
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="col-12">   
                        <div class="categorie_banner_title">
                            <h3>Sub Categories</h3>
                        </div>
                        <div class="list-group">
                            @foreach($subcaegories as $subcaegory)
                                <a href="#" class="list-group-item list-group-item-action">{{ $subcaegory->name }} </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-12">   
                        <div class="categorie_banner_title">
                            <h3>Sub Sub Categories</h3>
                        </div>
                        <div class="list-group">
                            @foreach($subsubcaegories as $subsubcaegory)
                                <a href="#" class="list-group-item list-group-item-action">{{ $subsubcaegory->name }} </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('js')

@endpush