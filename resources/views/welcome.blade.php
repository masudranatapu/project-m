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

<div class="best_selling_section  py-4 grey-section ">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title">
                    <h3>Best Selling</h3>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="categorie_banner_active owl-carousel">
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/best-selling/images-18_resize_55.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">
                                
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                                <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 100</ins>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/best-selling/61iwktD8PRL._SL1000_-600x600.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">6% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Air Pruning Geo Fabric Grow Bag – 25 Gallon – for Home, Terrace, Balcony. Size (Dia: 21 “, H: 15.5”)">
                                <a href="#">Air Pruning Geo Fabric Grow Bag – 25 Gallon – for Home, Terrace, Balcony. Size (Dia: 21 “, H: 15.5”)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 310</ins><del class="old-price">৳ 330</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/best-selling/images-48_crop_19_resize_88.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">6% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Quarter Steel Drum – With color( Round) – Hight: 17 inch , Dia 14 inch">
                                <a href="#">Quarter Steel Drum – With color( Round) – Hight: 17 inch , Dia 14 inch</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 300</ins><del class="old-price">৳ 320</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/best-selling/images-53_resize_69.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">

                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="DAP Fertilizer ( Per Kg)">
                                <a href="#">DAP Fertilizer ( Per Kg)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 50</ins>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm text-capitalize" title="Buy View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/best-selling/61iwktD8PRL._SL1000_-600x600.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">6% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Air Pruning Geo Fabric Grow Bag – 25 Gallon – for Home, Terrace, Balcony. Size (Dia: 21 “, H: 15.5”)">
                                <a href="#">Air Pruning Geo Fabric Grow Bag – 25 Gallon – for Home, Terrace, Balcony. Size (Dia: 21 “, H: 15.5”)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 310</ins><del class="old-price">৳ 330</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">   
                <div class="d-flex align-items-center justify-content-center">
                    <a href="#" class="btn-product vbtn-sm text-capitalize" title="View More">view more<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                </div>
            </div>    
        </div>
    </div>
</div>

<div class="new_arrival_section  py-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title">
                    <h3>New Arrival</h3>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="categorie_banner_active owl-carousel">
                <div class="col-lg-3">
                    <div class="product text-center mb-4 grey-section">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/new-arrival/ice-tea-dJZ5m6vCATc-unsplash.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">20% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Ivy Lota Plat |(H: 4-6 inch)">
                                <a href="#">Ivy Lota Plat |(H: 4-6 inch)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 8</ins><del class="old-price">৳ 20</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 grey-section">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/new-arrival/maxresdefault.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">7% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Red Kathal Thai(H:1.5- 2)">
                                <a href="#">Red Kathal Thai(H:1.5- 2)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 grey-section">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/new-arrival/chiang-mai.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">14% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Chiang Mai mango(H: 4- 5)">
                                <a href="#">Chiang Mai mango(H: 4- 5)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 600</ins><del class="old-price">৳ 700</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 grey-section">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/new-arrival/banana-mango.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">9% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Banana Mango(H:3.5- 4)">
                                <a href="#">Banana Mango(H:3.5- 4)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 500</ins><del class="old-price">৳ 550</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 grey-section">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/new-arrival/banana-mango.jpg" alt="product" class="w-100">
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">9% off</span>
                            </div>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Banana Mango(H:3.5- 4)">
                                <a href="#">Banana Mango(H:3.5- 4)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 500</ins><del class="old-price">৳ 550</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Quick View">buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">   
                <div class="d-flex align-items-center justify-content-center">
                    <a href="#" class="btn-product vbtn-sm text-capitalize" title="View More">view more<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                </div>
            </div>    
        </div>
    </div>
</div>

<div class="service_section py-4 grey-section">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title">
                    <h3>Our Services</h3>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="categorie_banner_active owl-carousel">
                <div class="col-lg-3">
                    <div class="product text-center bg-white mb-4">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/services/service-1.jpg" alt="product" class="w-100">
                            </a>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title mb-0 font-si" title="Roof Garden Installation">
                                <a href="#">Roof Garden Installation</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center bg-white mb-4">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/services/service-2.jpg" alt="product" class="w-100">
                            </a>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title mb-0 font-si" title="Landscape Garden & Beautification">
                                <a href="#">Landscape Garden & Beautification</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center bg-white mb-4">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/services/service-3.jpg" alt="product" class="w-100">
                            </a>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title mb-0 font-si" title="Indoor/ Office Gardening">
                                <a href="#">Indoor/ Office Gardening</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center bg-white mb-4">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/services/service-4.jpg" alt="product" class="w-100">
                            </a>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title mb-0 font-si" title="Roof Garden Installation">
                                <a href="#">Garden Maintenance Service</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center bg-white mb-4">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <img src="assets/img/services/service-3.jpg" alt="product" class="w-100">
                            </a>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title mb-0 font-si" title="Indoor/ Office Gardening">
                                <a href="#">Indoor/ Office Gardening</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">   
                <div class="d-flex align-items-center justify-content-center">
                    <a href="#" class="btn-product vbtn-sm text-capitalize" title="View More">view more<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                </div>
            </div>    
        </div>
    </div>
</div>

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
                            <h3>{{ $website->phone }}</h3>
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
                            <h3>{{ $website->email }}</h3>
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

@endpush