<!-- Brand Logo -->
<a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
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
            <li class="nav-item">
                <a href="{{ route('admin.vat-amount.index') }}" class="nav-link {{ Request::is('admin/vat-amount') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-hand-holding-heart"></i>
                    <p>Vat</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/blogs') || Request::is('admin/slider') || Request::is('admin/policy') || Request::is('admin/clints') || Request::is('admin/abouts') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
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
                        <a href="{{ route('admin.clints.index') }}" class="nav-link {{ Request::is('admin/clints') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Happy Clints</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Request::is('admin/website') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
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