<!-- Brand Logo -->
<a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{asset('demomedia/logofriendsit.png')}}" alt="" class="brand-image elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Friend's IT</span>
</a>
<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- dashboard area  -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <!-- category area  -->
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Category
                    </p>
                </a>
            </li>
            <!-- brand area  -->
            <li class="nav-item">
                <a href="{{ route('admin.brands.index') }}" class="nav-link {{ Request::is('admin/brands') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-code-branch"></i>
                    <p>
                        Brand
                    </p>
                </a>
            </li>
            <!-- unit area  -->
            <li class="nav-item {{ Request::is('admin/size') || Request::is('admin/color') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fab fa-unity"></i>
                    <p>
                        Unit
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.size.index') }}" class="nav-link {{ Request::is('admin/size') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Size</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.color.index') }}" class="nav-link {{ Request::is('admin/color') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Color</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/division') || Request::is('admin/district') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-street-view"></i>
                    <p>
                        Location
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.division.index') }}" class="nav-link {{ Request::is('admin/division') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Division</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.district.index') }}" class="nav-link {{ Request::is('admin/district') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>District</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link {{ Route::is('admin.products.index') || Route::is('admin.products.create') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Product
                    </p>
                </a>
            </li>
            @php
                $pendingOrders = App\Models\Order::where('order_status', 'Pending')->latest()->get();
                $confirmedOrders = App\Models\Order::where('order_status', 'Confirmed')->latest()->get();
                $processingOrders = App\Models\Order::where('order_status', 'Processing')->latest()->get();
                $deliveredOrders = App\Models\Order::where('order_status', 'Delivered')->latest()->get();
                $successedOrders = App\Models\Order::where('order_status', 'Successed')->latest()->get();
                $canceledOrders = App\Models\Order::where('order_status', 'Canceled')->latest()->get();
            @endphp
            <li class="nav-item {{ Request::is('admin/orders') || Request::is('admin/orders-pending') || Request::is('admin/orders-confirmed') || Request::is('admin/orders-processing') ||Request::is('admin/orders-delivered') || Request::is('admin/orders-successed') || Request::is('admin/orders-canceled') ? 'menu-open' : '' }}">
                <a href="javascript:;" class="nav-link">
                    <i class="nav-icon fas fa-shopping-basket"></i>
                    <p>
                        Order Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.orders.pending')}}" class="nav-link {{ Request::is('admin/orders-pending') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Pending Order
                                <span class="badge badge-info right">{{$pendingOrders->count()}}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.orders.confirmed')}}" class="nav-link {{ Request::is('admin/orders-confirmed') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Confirmed Order
                                <span class="badge badge-info right">{{ $confirmedOrders->count() }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.orders.processing')}}" class="nav-link {{ Request::is('admin/orders-processing') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Processing Order
                                <span class="badge badge-info right">{{ $processingOrders->count() }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.orders.delivered')}}" class="nav-link {{ Request::is('admin/orders-delivered') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Delivered Order
                                <span class="badge badge-info right">{{ $deliveredOrders->count() }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.orders.successed')}}" class="nav-link {{ Request::is('admin/orders-successed') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Successed Order
                                <span class="badge badge-info right">{{ $successedOrders->count() }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.orders.canceled')}}" class="nav-link {{ Request::is('admin/orders-canceled') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Canceled Order
                                <span class="badge badge-info right">{{ $canceledOrders->count() }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                All Orders
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/purchase') || Request::is('admin/sold-product') || Request::is('admin/sold-product-report') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                        Stock Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.purchase.index') }}" class="nav-link {{ Request::is('admin/purchase') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Purchase Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.sold-product.index') }}" class="nav-link {{ Request::is('admin/sold-product') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Sold Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.sold-product.report') }}" class="nav-link {{ Request::is('admin/sold-product-report') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Stock Report</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.vat-amount.index') }}" class="nav-link {{ Request::is('admin/vat-amount') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-hand-holding-heart"></i>
                    <p>Vat</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/blogs') || Request::is('admin/slider') || Request::is('admin/policy') || Request::is('admin/clients') || Request::is('admin/abouts') || Request::is('admin/all-users') ? 'menu-open' : '' }}">
                <a href="avascript:;" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        Extras
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ Request::is('admin/blogs') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Blog</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.slider.index') }}" class="nav-link {{ Request::is('admin/slider') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Slider</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.policy.index') }}" class="nav-link {{ Request::is('admin/policy') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Policy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.abouts.index') }}" class="nav-link {{ Request::is('admin/abouts') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>About Us</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.clients.index') }}" class="nav-link {{ Request::is('admin/clients') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Clients</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.all.user') }}" class="nav-link {{ Request::is('admin/all-users') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Users</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/website') ? 'menu-open' : '' }}">
                <a href="javascript:;" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Website Setting
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.website.index')}}" class="nav-link {{ Request::is('admin/website') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Setting
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>