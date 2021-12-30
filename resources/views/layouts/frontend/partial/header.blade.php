@php
    $categories = App\Models\Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->get();
@endphp

<header class="header_area">
    <div class="header_top d-none d-lg-block">
        <div class="container">   
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="welcome_text">
                        <p class="my-2 text-capitalize">welcome to Royalmart online shop</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header_social text-right">
                        <ul>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <div class="header_middel middel_three d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-3">
                    <div class="logo text-left">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('frontend/img/logo/logo-new.png')}}" alt="Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-7">
                    <div class="header_right_info d-flex justify-content-lg-end justify-content-center">
                        <div class="search_container d-lg-block d-none flex-fill mr-4">
                            <form action="#" class="w-100">
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="cart_area">
                            <div class="header_account_list register d-flex align-items-center">
                                <a href="javascript:;" class="reg-toggle d-flex">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                <ul class="reg-log">
                                    @auth
                                        @if(Auth::check() && auth()->user()->role_id == 1)
                                            <li><a href="{{ route('admin.dashboard') }}" target="_blank">Dashboard</li>
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @endif
                                        @if(Auth::check() && auth()->user()->role_id == 2)
                                            <li><a href="{{ route('customer.dashboard') }}">Customer Profile</li>
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @endif
                                        
                                    @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endauth
                                </ul>
                            </div>
                            <!-- cart area start  -->
                            <div class="cart_link dropdown cart-dropdown type2 mr-0 mr-lg-2">
                                <a href="javascript:;" class="cart-toggle label-block link d-flex align-items-center">
                                    <i class="d-icon-bag">
                                        <span class="cart-count">2</span>
                                    </i>
                                </a>
                                    <div class="mini_cart">
                                    <div class="items_nunber">
                                        <span>2 Items in Cart</span>
                                    </div>
                                    <div class="cart_button checkout">
                                        <a href="checkout.html">Proceed to Checkout</a>
                                    </div>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="assets/img/fashions/7.jpg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Mr.Coffee 12-Cup</a>
                                            <form action="#">
                                                <input min="0" max="100" type="number">
                                                <span>$60.00</span>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="assets/img/clothing/featured1.jpg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Lid Cover Cookware</a>
                                            <form action="#">
                                                <input min="0" max="100" type="number">
                                                <span>$160.00</span>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="cart_button view_cart">
                                        <a href="#">View and Edit Cart</a>
                                    </div>
                                </div>
                            </div>
                            <!-- cart area end  -->
                        </div>
                        <div class="mobile-menu d-lg-none">
                            <nav>  
                                <ul>
                                    <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                    <li class=""><a href="#">About Us</a></li>
                                    <li class=""><a href="#">campaign</a></li>
                                    <li class=""><a href="#">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header_bottom bottom_three py-2">
        <div class="container">
            <div class="search_container d-block d-lg-none">
                <form action="#">
                    <div class="search_box">
                        <input placeholder="Search product..." type="text">
                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                    </div>
                </form>
            </div>
            <div class="main_menu_inner">
                <div class="main_menu d-none d-lg-block text-center"> 
                    <ul>
                        <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                        <li class=""><a href="#">About Us</a></li>
                        <li class=""><a href="#">campaign</a></li>
                        <li class=""><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="category-slider">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories_menu">
                    <div class="categories_title">
                        <h2 class="categori_toggle">All categories</h2>
                    </div>
                    <div class="categories_menu_inner">
                        <ul>
                            @foreach($categories as $category)
                                <li class="has-submenu">
                                    <a href="#">{{ $category->name }} </a>
                                    @php
                                        $subcategories = App\Models\Category::where('parent_id', $category->id)->where('child_id', NULL)->latest()->get();
                                    @endphp
                                    @if($subcategories->count() > 0 )
                                        <ul class="submenu">
                                            @foreach($subcategories as $subcategory)
                                                <li class="has-submenu">
                                                    <a href="#">{{ $subcategory->name }}</a>
                                                    @php
                                                        $subsubcategories = App\Models\Category::where('parent_id', '!=', NULL)->where('child_id', $subcategory->id)->latest()->get();
                                                    @endphp
                                                    @if($subsubcategories->count() > 0)
                                                        <ul class="submenu">
                                                            @foreach($subsubcategories as $subsubcategory)
                                                                <li><a href="#">{{ $subsubcategory->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>                            
            </div>
        </div>
    </div>
    <div class="slider_area slider_three owl-carousel mb-0">
        <div class="single_slider" style="background-image: url({{asset('frontend/img/slider/slider-1.jpg')}});"></div>
        <div class="single_slider" style="background-image: url({{asset('frontend/img/slider/slider-2.jpg')}});"></div>
        <div class="single_slider" style="background-image: url({{asset('frontend/img/slider/slider-3.jpg')}});"></div>
        <div class="single_slider" style="background-image: url({{asset('frontend/img/slider/slider-4.jpg')}});"></div>
    </div>
</div>