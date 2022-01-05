@extends('layouts.frontend.app')

@section('title')
    {{ $title }}
@endsection

@section('meta')

@endsection
    @php 
        $related_product = App\Models\Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->limit(6)->get();
    @endphp
@push('css')
    <style>
        .review_image_size {
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }
        .product_slider_image {
            height: 680px;
            width: 100%;
            border: 1px solid;
        }
        hr {
            margin: 15px 0;
            border-bottom: 1px solid #bbbcbf;
        }
        .button_plus_minus {
            padding: 0 17px;
            border: 1px solid #ced4da;
        }
        .add_to_cart_size {
            height: 45px;
            width: 100%;
            font: 1.5em sans-serif;
            border-radius: 50px;
            letter-spacing: 2px;
        }
        .wishlist_size {
            height: 45px;
            padding: 10px 0 0 0;
            width: 80%;
            font: 1.5em sans-serif;
            border-radius: 50px;
            letter-spacing: 2px;
        }
        .input_center {
            padding-left: 36px;
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
    <div class="category_section py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- <img style="width: 100%; " src="{{asset($product->thambnail)}}" alt=""> -->
                    <div class="slider_area slider_three owl-carousel mb-0">
                        <div class="single_slider">
                            <a href="javascript:;">
                                <img class="product_slider_image" src="{{asset($product->thambnail)}}" alt="slider image">
                            </a>
                        </div>
                        @if($product->multi_thambnail)
                            @php
                                $multithambnails = explode("|", $product->multi_thambnail);
                            @endphp
                            @foreach($multithambnails as $multithambnail)
                                <div class="single_slider">
                                    <a href="javascript:;">
                                        <img class="product_slider_image" src="{{ URL::to($multithambnail) }}" alt="slider image">
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>{{$product->name }}</h3>
                    <p>
                        <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                        <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                        <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                        <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                        <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                        <span class="ml-2"> 29 rating </span>
                    </p>
                    <hr>
                    <h6>Brand : {{ $product['brand']['name'] }}</h6>
                    <h6>Category : {{ $product['category']['name'] }}</h6>
                    <h6>
                        Stock Status : 
                        @if($product->availability == 1) 
                            <span class="badge bg-success text-white">In Stock</span>
                        @else
                            <span class="badge bg-danger">Out Of Stock</span>
                        @endif
                    </h6>
                    <hr>
                    <h6>Short Description</h6>
                    <p class="text-justify">{!! $product->short_description !!}</p>
                    <hr>
                    <div class="product-price text-success my-3">
                        <h3> Current Price : 
                            <ins class="new-price">৳ {{$product->sell_price}}</ins>
                            @if($product->discount)
                                <del class="old-price text-danger">৳ {{$product->regular_price}}</del>
                            @endif
                        </h3>
                    </div>
                    <form action="#">
                        <div class="row">   
                            <div class="col-md-4">
                                <div class="product-form product-qty">
                                    <div class="product-form-group">
                                        <label for="">Quantity</label>
                                        <div class="input-group mr-2 quantity">
                                            <button class="quantity-minus button_plus_minus decrement-btn"> - </button>
                                            <input class="form-control qty-input input_center" type="text" value="1" min="1" max="100">
                                            <button class="quantity-plus button_plus_minus increment-btn"> + </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-form">
                                    <div class="product-form-group">
                                        <label for="">Color</label>
                                        <div class="mr-2 quantity">
                                            <select name="" id="">
                                                <option value="">Hi all</option>
                                                <option value="">Hi all</option>
                                                <option value="">Hi all</option>
                                                <option value="">Hi all</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-form">
                                    <div class="product-form-group">
                                        <label for="">Sizes</label>
                                        <div class="mr-2 quantity">
                                            <select name="" id="">
                                                <option value="">Sizes</option>
                                                <option value="">Sizes</option>
                                                <option value="">Sizes</option>
                                                <option value="">Sizes</option>
                                                <option value="">Sizes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-lg btn-success add_to_cart_size">
                                    <i class="fa fa-cart-plus mr-2"></i>
                                    Add To Cart
                                </button>
                            </div>
                            <!-- this button will be onclik  -->
                            <div class="col-md-5">
                                <a href="javascript:;" class="btn btn-lg btn-info wishlist_size"  onclick="wishlist">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i> Wishlist
                                </a>
                            </div>
                        </div>
                    </form>
                    <form action="" id="wishlist">
                        <!-- this form only for wishlist  -->
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <h5>Shear Now</h5>
                        </div>
                        <div class="col-md-12">
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox_7oo3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- related product -->
    @if($related_product->count() > 0) 
        <div class="best_selling_section  py-4 grey-section ">
            <div class="container">
                <div class="row">
                    <div class="col-12">   
                        <div class="categorie_banner_title">
                            <h3>Similar Products</h3>
                        </div>
                    </div>    
                </div>
                <div class="row cat">
                    <div class="categorie_banner_active owl-carousel">
                        @foreach($related_product as $key => $products)
                            <div class="col-lg-3">
                                <div class="product text-center mb-4 bg-white">
                                    <figure class="product-media mb-0">
                                        <a href="{{ route('productdetails', $products->slug) }}">
                                            <img src="{{asset($products->thambnail)}}" alt="{{ $products->name }}" class="w-100">
                                        </a>
                                        <div class="product-label-group">
                                            @if($products->discount)
                                                <span class="product-label label-sale">{{ $products->discount }} % off </span>
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
                                        <h3 class="title" title="{{$products->name }}">
                                            <a href="{{ route('productdetails', $products->slug) }}">{{$products->name}}</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">৳ {{$products->sell_price}}</ins>
                                            @if($products->discount)
                                                <del class="old-price">৳ {{$products->regular_price}}</del>
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
        </div>
    @endif
    <div class="category_section  py-4 ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item mr-3">
                                    <a class="nav-link active " id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">Product Details</a>
                                </li>
                                <li class="nav-item mr-3">
                                    <a class="nav-link " id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Review</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-return-warranty-tab" data-toggle="pill" href="#pills-return-warranty" role="tab" aria-controls="pills-return-warranty" aria-selected="false">Return & Warranty</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active " id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
                                    <ul class="list-group col-md-6">
                                        <li class="list-group-item">Brand Name : {{ $product['brand']['name']}} </li>
                                        @if($product->subcategory_id)
                                            <li class="list-group-item">Sub Category Name : {{ $product['subcategory']['name'] }} </li>
                                        @endif
                                        @if($product->subsubcategory_id)
                                            <li class="list-group-item">Sub Sub Category Name : {{ $product['subsubcategory']['name'] }} </li>
                                        @endif
                                        <li class="list-group-item">Stock Status : @if($product->availability == 1) <span class="badge bg-success text-white">In Stock</span> @else  <span class="badge bg-danger">Out Of Stock</span> @endif</li>
                                    </ul>
                                    @if($product->meta_description)
                                    <h5 class="mt-3">Meta Description</h5>
                                    <p class="text-justify">
                                        {!! $product->meta_description !!}
                                    </p>
                                    @endif
                                    <h5 class="mt-3">Product Description</h5>
                                    <p class="text-justify">
                                        {!! $product->long_description !!}
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-justify">
                                                <div class="">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> 100 </div>
                                                    </div>
                                                </div>
                                                <div class="float-right"> 100 review</div>
                                            </div>
                                            <br>
                                            <div class="text-justify">
                                                <div class="">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="float-right"> 100 review</div>
                                            </div>
                                            <br>
                                            <div class="text-justify">
                                                <div class="">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="float-right"> 100 review</div>
                                            </div>
                                            <br>
                                            <div class="text-justify">
                                                <div class="">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="float-right"> 100 review</div>
                                            </div>
                                            <br>
                                            <div class="text-justify">
                                                <div class="">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-secoundary" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="float-right"> 100 review</div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Product Review</h5>
                                    <div class="row">
                                        <!-- this will be repet  -->
                                        <div class="col-md-12 mb-2">
                                            <div class="row">
                                                <div class="col-md-2 col-sm-2">
                                                    <img src="{{ asset('demomedia/demoprofile.png') }}" alt="Responsive image" class="review_image_size">
                                                </div>
                                                <div class="col-md-10 col-sm-10">
                                                    <div class="blog-comments inner-bottom-xs outer-bottom-xs">
                                                        <h4>Saraha Smith</h4>
                                                        <p>
                                                            <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                                                            <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                                                            <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                                                            <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                                                            <a href="javascript:;"><i class="ion-star text-danger"></i></a>
                                                        </p>
                                                        <p class="text-justify">Lorem ipsum dolor sit xime lorem non fugiat amet. Eligendi, in. veniam</p>
                                                        <p>
                                                            03 Day ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- this is will be repet  -->
                                    </div>
                                    <h5>Leave your review</h5>
                                    @auth 
                                        <form action="">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <label for="">Your Opinion</label>
                                                    <textarea name="" id="" cols="30" rows="4" placeholder="Your Opinion"></textarea>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Your Name</label>
                                                    <input type="text" placeholder="Your Name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Your Email</label>
                                                    <input type="text" placeholder="Your Email Address">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Rating</label>
                                                    <select name="" id="">
                                                        <option value="5">5 Star </option>
                                                        <option value="4">4 Star </option>
                                                        <option value="3">3 Star </option>
                                                        <option value="2">2 Star </option>
                                                        <option value="1">1 Star </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    @else 
                                        <form action="">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <label for="">Your Opinion</label>
                                                    <textarea name="" id="" cols="30" rows="4" placeholder="Your Opinion"></textarea>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Your Name</label>
                                                    <input type="text" placeholder="Your Name">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Your Email</label>
                                                    <input type="text" placeholder="Your Email Address">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Rating</label>
                                                    <select name="" id="">
                                                        <option value="5">5 Star </option>
                                                        <option value="4">4 Star </option>
                                                        <option value="3">3 Star </option>
                                                        <option value="2">2 Star </option>
                                                        <option value="1">1 Star </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    @endauth
                                </div>
                                <div class="tab-pane fade" id="pills-return-warranty" role="tabpanel" aria-labelledby="pills-return-warranty-tab">
                                    <h3 class="my-3">Return & Warranty</h3>
                                    <p>(1) If the product has any defect by its manufacturer.</p>
                                    <p>(2) Product with missing parts and accessories.</p>
                                    <h3 class="my-3">Payment System</h3>
                                    <p>(1) Cash on Delivery (COD). </p>
                                    <p>(2) Cards - Visa, MasterCard & Amex.</p>
                                    <p>(3) Mobile banking = Nogad, bKash, Rocket, etc. </p>
                                    <p>(4) Net banking.</p>
                                    <h3 class="my-3">Home Delivery</h3>
                                    <p>All time available</p>
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
        $(document).ready(function () {
            $('.increment-btn').click(function (e) {
                e.preventDefault();
                var incre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(incre_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value<100){
                    value++;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }

            });

            $('.decrement-btn').click(function (e) {
                e.preventDefault();
                var decre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(decre_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value>1){
                    value--;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
            });

        });
    </script>
    <!-- addthis shear  -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61385eedbd8b385d"></script>
@endpush