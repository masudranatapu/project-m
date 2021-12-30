@extends('layouts.frontend.app')

@section('title')
{{$title}}
@endsection

@section('meta')

@endsection

@push('css')

@endpush

@section('content')
<!--categories section start-->
<div class="category_section pb-4 pt-sm-5 pt-4 bg-white">
    <div class="container">
        <div class="categorie_banner_title">
            <h3 class="pb-0">categories</h3>
        </div>
        <div class="category-carousel owl-carousel">
            <div class="item">
                <div class="category-item">
                    <a href="#">              
                        <img class="img-fluid" src="assets/img/electronics/17.jpg" alt="Image">    
                        <h6 class="text-capitalize">electronics</h6>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="#">
                        <img class="img-fluid" src="assets/img/clothing/product-10-3-330x371.jpg" alt="Image">                   
                        <h6>travel & clothing</h6>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="#">
                        <img class="img-fluid" src="assets/img/fashions/8.jpg" alt="Image">                   
                        <h6>headgears</h6>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="#">
                        <img class="img-fluid" src="assets/img/fashions/5.jpg" alt="Image">                 
                        <h6>jewelry & watches</h6>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="#">
                        <img class="img-fluid" src="assets/img/electronics/15.jpg" alt="Image">                  
                        <h6>computers & accessories</h6>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="#">
                        <img class="img-fluid" src="assets/img/electronics/13.jpg" alt="Image">                 
                        <h6>Foreign fruit tree</h6>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="#">
                        <img class="img-fluid" src="assets/img/fashions/7.jpg" alt="Image">                 
                        <h6>Decoration Indoor Plants</h6>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="#">
                        <img class="img-fluid" src="assets/img/beauty/beauty1.jpg" alt="Image">                 
                        <h6>beauty & fragrance</h6>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="category-item">
                    <a href="#">              
                        <img class="img-fluid" src="assets/img/kitchen/kitchen7.jpg" alt="Image">    
                        <h6>home & kitchen</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--categories section end-->

<!--Best selling start-->
<div class="best_selling_section py-4 py-lg-5 bg-lite">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title">
                    <h3 class="">Best Selling</h3>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="categorie_banner_active best-selling-carousel owl-carousel">
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/kitchen/kitchen9.jpg); background-size: cover; background-position: center;">
                                    
                                </div>
                            </a>
                            <div class="product-label-group">
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                                <a href="#">হলুদ গজারিয়া</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 300</ins>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/kitchen/kitchen10.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 6%</span>
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
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/electronics/15.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 6%</span>
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
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/electronics/17.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 6%</span>
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
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/electronics/13.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 20%</span>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="DAP Fertilizer ( Per Kg)">
                                <a href="#">DAP Fertilizer ( Per Kg)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 300</ins><del class="old-price">৳ 400</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/fashions/7.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 14%</span>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Ivy Lota Plat |(H: 4-6 inch)">
                                <a href="#">Ivy Lota Plat |(H: 4-6 inch)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 330</ins><del class="old-price">৳ 390</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/fashions/2.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 20%</span>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                                <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Best selling end-->

<!--New Arrival start-->
<div class="new_arrival_section py-lg-5 py-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title">
                    <h3 class="">New Arrival</h3>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="new-arrival-carousel categorie_banner_active owl-carousel">
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/electronics/17.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Lilium Pink flower">
                                <a href="#">Lilium Pink flower</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 300</ins>
                            </div>
                        <!--      <div class="cart-plus-minus">
                                <div class="buttons dec qtybutton">-</div>
                                <input type="number" class="input" value="1" min="1" />
                                <div class="buttons inc qtybutton">+</div>
                            </div> -->

                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/fashions/3.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 6%</span>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Banana Mango(H:3.5- 4)">
                                <a href="#">Banana Mango(H:3.5- 4)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 310</ins><del class="old-price">৳ 330</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/fashions/8.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 6%</span>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Banana Mango(H:3.5- 4)">
                                <a href="#">Banana Mango(H:3.5- 4)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 310</ins><del class="old-price">৳ 330</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/clothing/featured1.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 6%</span>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Banana Mango(H:3.5- 4)">
                                <a href="#">Banana Mango(H:3.5- 4)</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 310</ins><del class="old-price">৳ 330</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/clothing/product-7-1-580x652.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 20%</span>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                                <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 300</ins><del class="old-price">৳ 400</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/beauty/beauty10.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 12%</span>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="jackfruit">
                                <a href="#">jackfruit</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 280</ins><del class="old-price">৳ 330</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product text-center mb-4 bg-white">
                        <figure class="product-media mb-0">
                            <a href="#">
                                <div class="img" style="background-image: url(assets/img/beauty/beauty9.jpg); background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="product-label-group">
                                <span class="product-label label-sale">- 20%</span>
                            </div>
                        </figure>
                        <div class="Service-bottom py-3">
                            <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                                <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                            </h3>
                            <div class="product-price">
                                <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                            </div>
                            <div class="product-action">
                                <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--New Arrival end-->


<!--all-product section start-->
<div class="product bg-lite py-lg-5 py-sm-4 py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title d-flex justify-content-between align-items-center">
                    <!-- <h5>recently added our store</h5> -->
                    <h3 class="">Electronics</h3>
                    <a href="#" class="btn-product vbtn-sm text-capitalize" title="View More">view more<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/13.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/14.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 9%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Chiang Mai mango(H: 4- 5)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 500</ins><del class="old-price">৳ 550</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/15.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/17.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/19.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 14%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Ivy Lota Plat |(H: 4-6 inch)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/22.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Angiisar leaflets(অগ্নীশ্বর পাতাবাহার)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/23.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/22.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Lilium Pink flower</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/product-2-800x900.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/19.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Gondhoraj Flower Plants</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/14.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/electronics/17.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--all-product section end-->



<!--all-product section start-->
<div class="product bg-white py-lg-5 py-sm-4 py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title d-flex justify-content-between align-items-center">
                    <!-- <h5>recently added our store</h5> -->
                    <h3 class="">febrics & clothing</h3>
                    <a href="#" class="btn-product vbtn-sm text-capitalize" title="View More">view more<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/featured1.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/featured3.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 9%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Chiang Mai mango(H: 4- 5)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 500</ins><del class="old-price">৳ 550</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/featured4.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/product-10-3-330x371.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/product-9-3-580x580.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 14%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Ivy Lota Plat |(H: 4-6 inch)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/product-7-1-580x652.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Angiisar leaflets(অগ্নীশ্বর পাতাবাহার)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/product-7-2-109x122.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/product-7-4-580x652.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Lilium Pink flower</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/product-8-4-580x580.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/product-9-1-580x580.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Gondhoraj Flower Plants</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/product-9-3-580x580.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/clothing/product-10-1-580x652.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--all-product section end-->



<!--all-product section start-->
<div class="product bg-lite py-lg-5 py-sm-4 py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title d-flex justify-content-between align-items-center">
                    <!-- <h5>recently added our store</h5> -->
                    <h3 class="">fashion & shoes</h3>
                    <a href="#" class="btn-product vbtn-sm text-capitalize" title="View More">view more<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/8.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/1.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 9%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Chiang Mai mango(H: 4- 5)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 500</ins><del class="old-price">৳ 550</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/2.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/3.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/5.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 14%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Ivy Lota Plat |(H: 4-6 inch)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/7.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Angiisar leaflets(অগ্নীশ্বর পাতাবাহার)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/11.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/15.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Lilium Pink flower</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/14.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/12.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Gondhoraj Flower Plants</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/17.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/fashions/20.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--all-product section end-->



<!--all-product section start-->
<div class="product bg-white py-lg-5 py-sm-4 py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title d-flex justify-content-between align-items-center">
                    <!-- <h5>recently added our store</h5> -->
                    <h3 class="">Beauty & Fragrance</h3>
                    <a href="#" class="btn-product vbtn-sm text-capitalize" title="View More">view more<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty1.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty2.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 9%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Chiang Mai mango(H: 4- 5)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 500</ins><del class="old-price">৳ 550</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty3.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty4.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty5.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 14%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Ivy Lota Plat |(H: 4-6 inch)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty6.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Angiisar leaflets(অগ্নীশ্বর পাতাবাহার)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty7.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty8.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Lilium Pink flower</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty9.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty10.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Gondhoraj Flower Plants</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty11.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/beauty/beauty12.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--all-product section end-->


<!--all-product section start-->
<div class="product bg-lite py-lg-5 py-sm-4 py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">   
                <div class="categorie_banner_title d-flex justify-content-between align-items-center">
                    <h3 class="">home & kitchen</h3>
                    <a href="#" class="btn-product vbtn-sm text-capitalize" title="View More">view more<i class="fa fa-angle-double-right ml-2" aria-hidden="true"></i></a>
                </div>
            </div>    
        </div>
        <div class="row cat">
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen1.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen2.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 9%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Chiang Mai mango(H: 4- 5)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 500</ins><del class="old-price">৳ 550</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen3.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 20%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Soil (25-30 kg) Filled with Cement Bag</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen4.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen5.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 14%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Ivy Lota Plat |(H: 4-6 inch)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen6.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Angiisar leaflets(অগ্নীশ্বর পাতাবাহার)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 700</ins><del class="old-price">৳ 600</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen7.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen8.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Lilium Pink flower</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen9.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen10.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Gondhoraj Flower Plants</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen11.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">হলুদ গজারিয়া</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 300</ins><del class="old-price">৳ 330</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="product text-center mb-4 bg-white">
                    <figure class="product-media mb-0">
                        <a href="#">
                            <img src="assets/img/kitchen/kitchen15.jpg" alt="product" class="w-100">
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">- 7%</span>
                        </div>
                    </figure>
                    <div class="Service-bottom py-3">
                        <h3 class="title" title="Soil (25-30 kg) Filled with Cement Bag">
                            <a href="#">Banana Mango(H:3.5- 4)</a>
                        </h3>
                        <div class="product-price">
                            <ins class="new-price">৳ 650</ins><del class="old-price">৳ 700</del>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product pbtn-sm ml-0 text-capitalize rounded-pill" title="buy now"><i class="flaticon-shopping-bag-2 mr-2"></i>buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--all-product section end-->
@endsection

@push('js')

@endpush