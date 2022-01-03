@extends('layouts.frontend.app')

@section('title')
    {{ $title }}
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
    <!--breadcrumbs area end-->s
    <div class="new_arrival_section  py-4 bg-white">
        <div class="container">
            <div class="row cat">
                @foreach($features as $key => $product)
                    <div class="col-lg-3">
                        <div class="product text-center mb-4 grey-section">
                            <figure class="product-media mb-0">
                                <a href="{{ route('productdetails', $product->slug) }}">
                                    <img src="{{asset($product->thambnail)}}" alt="{{ $product->name }}" class="w-100">
                                </a>
                                <div class="product-label-group">
                                    @if($product->discount)
                                        <span class="product-label label-sale">{{ $product->discount }} % off </span>
                                    @endif
                                </div>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart bg-success" data-toggle="modal" data-target="#addCartModal" title="Add to cart">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist bg-success" title="Add to wishlist">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="Service-bottom py-3">
                                <h3 class="title" title="{{$product->name }}">
                                    <a href="{{ route('productdetails', $product->slug) }}">{{$product->name}}</a>
                                </h3>
                                <div class="product-price">
                                    <ins class="new-price">৳ {{$product->sell_price}}</ins>
                                    @if($product->discount)
                                        <del class="old-price">৳ {{$product->regular_price}}</del>
                                    @endif
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                                </div>
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