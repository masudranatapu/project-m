@php
    $categories = App\Models\Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->get();
    $website = App\Models\Website::latest()->first();
@endphp
<div class="header_top top_three d-none d-md-block">
    <div class="container">   
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="welcome_text">
                    <p>Welcome to {{ $website->name }}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="top_right text-right">
                    <ul>
                        <li class="top_links">
                            <a href="#">My Account <i class="ion-chevron-down"></i></a>
                            <ul class="dropdown_links">
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
                        </li>
                    </ul>
                </div>   
            </div>
        </div>
    </div>
</div>

<div class="header_middel middel_three">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 d-md-block d-none">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="{{asset($website->logo)}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="search_bar d-none d-md-block">
                    <form action="{{ route('searching') }}" method="get">
                        <input name="search_product" placeholder="Search entire store here..." type="text">
                        <button type="submit">
                            <i class="ion-ios-search-strong"></i>
                        </button>
                    </form>
                </div> 
            </div>
            <div class="col-lg-2 col-md-3">
                <div class="cart_area">
                    <div class="logo-bar mb-0 mr-3 d-md-none d-block">
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="{{asset('frontend/img/logo/logo-new.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="search_bar mb-0 mr-3 d-md-none d-block">
                        <a href="#" class="open-close"><i class="ion-ios-search-strong"></i></a>
                        <form action="{{ route('searching') }}" method="get"id="mobile-search">
                            <input name="search_product" placeholder="Search your product here..." type="text">
                            <button type="submit">
                                <i class="ion-ios-search-strong"></i>
                            </button>
                        </form>
                    </div>
                    <div class="wishlist_link">
                        <a href="{{ route('customer.wishlist') }}">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="cart_link">
                        <a href="javascript:;" class="d-flex align-items-center">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            <span class="cont">My Cart</span>
                        </a>
                        <span class="cart_count">2</span>
                        <div class="mini_cart">
                            <div class="items_nunber">
                                <span>2 Items in Cart</span>
                            </div>
                            <div class="cart_button checkout">
                                <a href="checkout.html">Proceed to Checkout</a>
                            </div>
                            <div class="cart_item">
                                <div class="cart_img">
                                    <a href="#"><img src="assets/img/cart/cart1.jpg" alt=""></a>
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
                                    <a href="#"><img src="assets/img/cart/cart2.jpg" alt=""></a>
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header_bottom bottom_three">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="categories_menu">
                    <div class="categories_title">
                        <h2 class="categori_toggle"> All Categories</h2>
                    </div>
                    <div class="categories_menu_inner">
                        <ul>
                            @foreach($categories as $category)
                                <li class="has-submenu">
                                    <a href="{{ route('category', $category->slug) }}">{{ $category->name }} </a>
                                    @php
                                        $subcategories = App\Models\Category::where('parent_id', $category->id)->where('child_id', NULL)->latest()->get();
                                    @endphp
                                    @if($subcategories->count() > 0 )
                                        <ul class="submenu">
                                            @foreach($subcategories as $subcategory)
                                                <li class="has-submenu">
                                                    <a href="{{ route('category', $subcategory->slug) }}">{{ $subcategory->name }}</a>
                                                    @php
                                                        $subsubcategories = App\Models\Category::where('parent_id', '!=', NULL)->where('child_id', $subcategory->id)->latest()->get();
                                                    @endphp
                                                    @if($subsubcategories->count() > 0)
                                                        <ul class="submenu">
                                                            @foreach($subsubcategories as $subsubcategory)
                                                                <li>
                                                                    <a href="{{ route('category', $subsubcategory->slug) }}">
                                                                        {{ $subsubcategory->name }}
                                                                    </a>
                                                                </li>
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
            <div class="col-lg-7">
                <div class="mobile-menu mobail_menu_three d-lg-none">
                    <nav>  
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </nav>     
                </div>
                <div class="main_menu_inner">
                    <div class="main_menu d-none d-lg-block"> 
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('shop') }}">Shop</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="contact_phone">
                    <div class="contact_icone">
                        <span class="pe-7s-headphones"></span>
                    </div>
                    <div class="contact_number">
                        <p>Call Us:</p>
                        <span><a href="tel:{{ $website->phone }}">{{ $website->phone }}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header bottom end-->