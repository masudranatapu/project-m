@php
    $website = App\Models\Website::latest()->first();
    $categories = App\Models\Category::where('parent_id', NULL)->where('child_id', NULL)->latest()->limit(5)->get();
    $policies = App\Models\Policy::latest()->limit(4)->get();
@endphp
<div class="container">
    <div class="footer_top">
        <div class="row">
            <div class="col-sm-3 col-6">
                <div class="single_footer text-md-left text-center">
                    <div class="footer_contact">
                        <h3>Contract Address</h3>
                        <ul>
                            <li><i class="ion-location"></i>{{ $website->address }}</li>
                            <li><i class="ion-ios-telephone"></i><a href="tel:{{$website->phone }}">{{$website->phone }}</a></li>
                            <li><i class="ion-ios-email"></i><a href="mailto:{{ $website->email }}">{{$website->email}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-6">
                <div class="single_footer text-md-left text-center">
                    <h3>Product Categories</h3>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="#">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 col-6">
                <div class="single_footer text-md-left text-center">
                    <h3>Privacy</h3>
                    <ul>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        @foreach($policies as $policy)
                            <li><a href="#">{{ $policy->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 col-6">
                <div class="single_footer text-md-left text-center">
                    <h3>My Account</h3>
                    <ul>
                        @auth
                            @if(Auth::check() && auth()->user()->role_id == 1)
                                <li><a href="{{ route('admin.dashboard') }}" target="_blank">Admin Dashboard</li>
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
            </div>
        </div>
    </div>
</div>
<div class="copyright_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="copyright_content text-center text-md-left">
                    <p>Copyright &copy; 2021, <a href="{{ route('home') }}">{{ $website->name }}</a>. All Rights Reserved</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-dev text-center text-md-right">
                    <p class="mb-0 text-white">Designed and developed by <a href="javascript:;" class=" text-white">Friendsit</a></p>
                </div>
            </div>
            
        </div>
    </div>
</div>