@extends('layouts.frontend.app')

@section('title')
    {{$title}}
@endsection

@section('meta')

@endsection
    @php
        $website = App\Models\Website::latest()->first();
    @endphp
@push('css')

@endpush

@section('content')
    <div class="slider_area slider_three owl-carousel mb-0">
        @foreach($sliders as $key => $slider)
            <div class="single_slider">
                <a href="#">
                    <img src="{{asset($slider->image)}}" alt="slider image">
                </a>
            </div>
        @endforeach
    </div>
    <!-- category section  -->
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
                @foreach($categories as $key => $category)
                    <div class="col-lg-3 col-sm-4 col-6">
                        <div class="product text-center grey-section mb-4">
                            <figure class="product-media mb-0">
                                <a href="{{ route('category', $category->slug) }}">
                                    <img src="{{ asset($category->image) }}" alt="product" class="w-100">
                                </a>
                            </figure>
                            <div class="category-bottom py-2">
                                <h3 class="title mb-0" title="Gardening">
                                    <a href="{{ route('category', $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">   
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('all.category') }}" class="btn-product vbtn-sm text-capitalize" title="View More">
                            view more
                            <i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!-- best deals section  -->
    <div class="best_selling_section  py-4 grey-section ">
        <div class="container">
            <div class="row">
                <div class="col-12">   
                    <div class="categorie_banner_title">
                        <h3>Best deals</h3>
                    </div>
                </div>    
            </div>
            <div class="row cat">
                <div class="categorie_banner_active owl-carousel">
                    @foreach($bestdeals as $key => $product)
                        <div class="col-lg-3">
                            <div class="product text-center mb-4 bg-white">
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
                                        <a href="javascript:;" class="btn-product-icon btn-wishlist bg-success" onclick="wishlist_product_submit({{$product->id}})" title="Add to wishlist">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('customer.wishlist.store') }}" id="wishlist_product_submit_form_{{ $product->id }}" method="POST">
                                            <!-- this form only for wishlist  -->
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                        </form>
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
            <div class="row">
                <div class="col-12">   
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('bestdeals') }}" class="btn-product vbtn-sm text-capitalize" title="View More">
                            view more
                            <i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!-- Features section  -->
    <div class="new_arrival_section  py-4 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">   
                    <div class="categorie_banner_title">
                        <h3>Features</h3>
                    </div>
                </div>    
            </div>
            <div class="row cat">
                <div class="categorie_banner_active owl-carousel">
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
                                        <a href="javascript:;" class="btn-product-icon btn-wishlist bg-success" onclick="wishlist_product_submit({{$product->id}})" title="Add to wishlist">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('customer.wishlist.store') }}" id="wishlist_product_submit_form_{{ $product->id }}" method="POST">
                                            <!-- this form only for wishlist  -->
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                        </form>
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
            <div class="row">
                <div class="col-12">   
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('features') }}" class="btn-product vbtn-sm text-capitalize" title="View More">
                            view more
                            <i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!-- hot deails section  -->
    <div class="service_section py-4 grey-section">
        <div class="container">
            <div class="row">
                <div class="col-12">   
                    <div class="categorie_banner_title">
                        <h3>Hot Deals</h3>
                    </div>
                </div>    
            </div>
            <div class="row cat">
                <div class="categorie_banner_active owl-carousel">
                    @foreach($hotdeals as $key => $product)
                        <div class="col-lg-3">
                            <div class="product text-center mb-4 bg-white">
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
                                        <a href="javascript:;" class="btn-product-icon btn-wishlist bg-success" onclick="wishlist_product_submit({{$product->id}})" title="Add to wishlist">
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('customer.wishlist.store') }}" id="wishlist_product_submit_form_{{ $product->id }}" method="POST">
                                            <!-- this form only for wishlist  -->
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                        </form>
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
            <div class="row">
                <div class="col-12">   
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('hotdeals') }}" class="btn-product vbtn-sm text-capitalize" title="View More">
                            view more
                            <i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!-- how to buy product section  -->
    <div class="how_to_buy bg-white py-4 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">   
                    <div class="categorie_banner_title mt-2">
                        <h3 class="text-center">how to buy</h3>
                    </div>
                </div>    
            </div>
            <div class="brand_inner">  
                <div class="row">
                    <div class="col-md-3">
                        <div class="single-inner d-flex justify-content-center align-items-center py-3">
                            <div class="item-icon light-r mr-3">
                                <i aria-hidden="true" class="flaticon flaticon-grocery d-flex"></i>
                            </div>
                            <div class="item-holder">
                                <h5 class="item--title mb-0"> Select Product</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-inner d-flex justify-content-center align-items-center py-3">
                            <div class="item-icon light-g mr-3">
                                <i aria-hidden="true" class="flaticon flaticon-checked d-flex"></i>
                            </div>
                            <div class="item-holder">
                                <h5 class="item--title mb-0"> Add To Cart</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-inner d-flex justify-content-center align-items-center py-3">
                            <div class="item-icon light-r mr-3">
                                <i aria-hidden="true" class="flaticon flaticon-add-to-cart d-flex"></i>
                            </div>
                            <div class="item-holder">
                                <h5 class="item--title mb-0"> Check Out</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-inner d-flex justify-content-center align-items-center py-3">
                            <div class="item-icon light-g mr-3">
                                <i aria-hidden="true" class="flaticon flaticon-delivery-truck d-flex"></i>
                            </div>
                            <div class="item-holder">
                                <h5 class="item--title mb-0"> Waiting to Delivery</h5>
                            </div>
                        </div>
                    </div>                           
                </div>
            </div>     
        </div>
    </div>
    <!-- support section  -->
    <div class="py-4 grey-section border-bottom">
        <div class="container">
            <div class="shipping_contact">   
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single_shipping justify-content-start">
                            <div class="shipping_icone">
                                <span class="pe-7s-call"></span>
                            </div>
                            <div class="shipping_content">
                                <h3><a href="tel:{{$website->phone}}">{{ $website->phone}}</a></h3>
                                <p>Free support line!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <span class="pe-7s-mail"></span>
                            </div>
                            <div class="shipping_content">
                                <h3><a href="mailto:{{ $website->email }}">{{ $website->email }}</a></h3>
                                <p>Orders Support!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single_shipping  justify-content-end column_3">
                            <div class="shipping_icone">
                                <span class="pe-7s-timer"></span>
                            </div>
                            <div class="shipping_content">
                                <h3>Mon - Fri / 8:00 - 18:00</h3>
                                <p>Working Days/Hours!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
@endsection

@push('js')
    <!-- product wishlist area  -->    
	<script>
		function wishlist_product_submit(id) {
		    document.getElementById('wishlist_product_submit_form_'+id).submit();
		}
	</script>
@endpush