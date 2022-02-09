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
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{ route('all.category') }}" class="list-group-item list-group-item-action bg-success text-white">
                            All Category
                        </a>
                        @foreach($categories as $category)
                        <a href="{{ route('category', $category->slug) }}" class="list-group-item list-group-item-action">{{$category->name}}</a>
                        @endforeach
                    </div>
                    <div id="accordion">
                        <div class="list-group">
                            <a href="javascript:;" class="list-group-item list-group-item-action bg-success text-white" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Sub Category
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="list-group">
                                @foreach($subcategories as $subcategory)
                                    <a href="{{ route('category', $subcategory->slug) }}" class="list-group-item list-group-item-action">{{$subcategory->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="list-group">
                            <a href="javascript:;" class="list-group-item list-group-item-action bg-success text-white" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Sub Category
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="list-group">
                                @foreach($subsubcategories as $subsubcategory)
                                    <a href="{{ route('category', $subsubcategory->slug) }}" class="list-group-item list-group-item-action">{{$subsubcategory->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action bg-success text-white">
                            Brand
                        </a>
                        @foreach($brands as $brand)
                            <a href="{{ route('brand', $brand->slug) }}" class="list-group-item list-group-item-action">{{$brand->name}}</a>
                        @endforeach
                    </div>
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action bg-success text-white">
                            Price 
                        </a>
                        <a href="{{ route('price', ['min_price'=>0, 'max_price'=>99]) }}" class="list-group-item list-group-item-action">0 - 99</a>
                        <a href="{{ route('price', ['min_price'=>100, 'max_price'=>199]) }}" class="list-group-item list-group-item-action">100 - 199</a>
                        <a href="{{ route('price', ['min_price'=>200, 'max_price'=>399]) }}" class="list-group-item list-group-item-action">200 - 399</a>
                        <a href="{{ route('price', ['min_price'=>400, 'max_price'=>799]) }}" class="list-group-item list-group-item-action">400 - 799</a>
                        <a href="{{ route('price', ['min_price'=>800, 'max_price'=>99999999]) }}" class="list-group-item list-group-item-action">800 + </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="list-group">
                            <a href="javascript:;" class="list-group-item list-group-item-action bg-success text-white">
                                Your Selected Category Product
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row cat">
                                @foreach($products as $key => $product)
                                    <div class="col-md-4">
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
                                                    <a href="javascript:;" onclick="buynow_product_submit({{$product->id}})" class="btn-product-icon btn-cart bg-success" title="Buy Now">
                                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="{{ route('buynow') }}" method="POST" id="buynow_product_submit_form_{{ $product->id }}">
                                                        @csrf
                                                        <!-- this form only for buynow  -->
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    </form>
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
                                                    <a href="{{ route('add_to_cart', $product->id) }}" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="Add to cart">
                                                        Add to cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
    <!-- product buynow  area  -->
	<script>
		function buynow_product_submit(id) {
		    document.getElementById('buynow_product_submit_form_'+id).submit();
		}
	</script>
@endpush