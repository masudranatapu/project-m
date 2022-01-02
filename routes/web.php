<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// for admin controller 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\HappyClintController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Customer\InformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'welcome'])->name('home');

Auth::routes();

Route::get('about-us', [HomeController::class, 'aboutUs'])->name('about');
Route::get('blogs', [HomeController::class, 'blogs'])->name('blog');
Route::get('blogs/{slug}', [HomeController::class, 'blogDetails'])->name('blog.details');
Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contact');
Route::post('contact-us', [HomeController::class, 'contact'])->name('contact.us');
Route::get('all-category', [HomeController::class, 'allCategory'])->name('all.category');
Route::get('policy/{slug}', [HomeController::class, 'policy'])->name('policy.details');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('profile/{id}', [DashboardController::class, 'profileUpdate'])->name('profile.update');
    Route::post('pass-updated/{id}', [DashboardController::class, 'updatePass'])->name('password.update');

    // website seeting
    Route::resource('website', WebsiteController::class);
    // brand 
    Route::resource('brands', BrandController::class);
    Route::get('brands-inactive/{id}', [BrandController::class, 'brandsInactive'])->name('brands.inactive');
    Route::get('brands-active/{id}', [BrandController::class, 'brandsActive'])->name('brands.active');

    // unit section 
        // size
    Route::resource('size', SizeController::class);
    Route::get('size-inactive/{id}', [SizeController::class, 'sizeInactive'])->name('size.inactive');
    Route::get('size-active/{id}', [SizeController::class, 'sizeActive'])->name('size.active');
        // color
    Route::resource('color', ColorController::class);
    Route::get('color-inactive/{id}', [ColorController::class, 'colorInactive'])->name('color.inactive');
    Route::get('color-active/{id}', [ColorController::class, 'colorActive'])->name('color.active');

    // Location section 
    Route::resource('division', DivisionController::class);
    Route::resource('district', DistrictController::class);

    // blog section
    Route::resource('blogs', BlogController::class);
    Route::get('blog-inactive/{id}', [BlogController::class, 'blogInactive'])->name('blog.inactive');
    Route::get('blog-active/{id}', [BlogController::class, 'blogActive'])->name('blog.active');
    // slider section 
    Route::resource('slider', SliderController::class);
    Route::get('slider-inactive/{id}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');
    Route::get('slider-active/{id}', [SliderController::class, 'sliderActive'])->name('slider.active');
    // policy section 
    Route::resource('policy', PolicyController::class);
    Route::get('policy-inactive/{id}', [PolicyController::class, 'policyInactive'])->name('policy.inactive');
    Route::get('policy-active/{id}', [PolicyController::class, 'policyActive'])->name('policy.active');
    // about us
    Route::resource('abouts', AboutController::class);
    // happy clints
    Route::resource('clints', HappyClintController::class);
    // product 
    Route::resource('products', ProductController::class);
    Route::get('product-category/ajax/{category_id}', [ProductController::class, 'productCategory']);
    Route::get('product-subcategory/ajax/{subcategory_id}', [ProductController::class, 'productSubcategory']);
    // category
    Route::resource('category', CategoryController::class);
    Route::get('/category/parent-chlid/ajax/{cate_id}', [CategoryController::class, 'parentChild']);
    
});

Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth', 'customer']], function () {
    
    Route::get('/information', [InformationController::class, 'information'])->name('dashboard');
    Route::get('profile-setting', [InformationController::class, 'profile'])->name('profile');
    Route::post('profile/{id}', [InformationController::class, 'profileUpdate'])->name('profile.update');
    Route::post('pass-updated/{id}', [InformationController::class, 'updatePass'])->name('password.update');
    
});