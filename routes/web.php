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
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VatController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\ClientController;

use App\Http\Controllers\Customer\InformationController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CartController;

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
Route::get('policy/{slug}', [HomeController::class, 'policy'])->name('policy.details');
// product related routes
Route::get('all-product-shop', [HomeController::class , 'shop'] )->name('shop');
Route::get('bestdeals-product', [HomeController::class, 'bestdeals'])->name('bestdeals');
Route::get('features-product', [HomeController::class, 'features'])->name('features');
Route::get('hotdeals-product', [HomeController::class, 'hotdeals'])->name('hotdeals');
// searching
Route::get('searching-product', [SearchController::class, 'searching'])->name('searching');
// cateogory , subcateogory , subsubcateogory , brand and   price product related
Route::get('all-category', [HomeController::class, 'allCategory'])->name('all.category');
Route::get('category-product/{slug}', [ViewController::class, 'category'])->name('category');
Route::get('brand-product/{slug}', [ViewController::class, 'brand'])->name('brand');
Route::get('product-price', [ViewController::class, 'priceProduct'])->name('price');
// details and  view
Route::get('product-details/{slug}', [ViewController::class, 'productDetails'])->name('productdetails');

// cart area routes
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{product_id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::post('add-to-cart-with-quantity', [CartController::class, 'addToCartWithQuantity'])->name('addtocart.withQuantity');
Route::post('add-to-cart-with-size-color-quantity', [CartController::class, 'addToCartWithSizeColorQuantity'])->name('addtocart.withSizeColorQuantity');
Route::post('buy-product-with-quantity', [CartController::class, 'buyNowWithQuantity'])->name('buynow');
Route::post('buy-product-with-size-color-quantity', [CartController::class, 'buyNowWithSizeColorQuantity'])->name('buynow.sizecolor.quantity');
Route::get('cart-remove/{id}', [CartController::class, 'cartRemove'])->name('cart.remove');
Route::patch('update-cart', [CartController::class, 'cartUpdate'])->name('update_cart');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('profile/{id}', [DashboardController::class, 'profileUpdate'])->name('profile.update');
    Route::post('pass-updated/{id}', [DashboardController::class, 'updatePass'])->name('password.update');
    Route::get('all-users', [DashboardController::class, 'allUsers'])->name('all.user');
    // website seeting
    Route::resource('website', WebsiteController::class);
    Route::post('get-add-row-', [WebsiteController::class, 'addRemoveRow'])->name('row.addremove');
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
    
    // product
    Route::resource('products', ProductController::class);
    Route::get('product-category/ajax/{category_id}', [ProductController::class, 'productCategory']);
    Route::get('product-subcategory/ajax/{subcategory_id}', [ProductController::class, 'productSubcategory']);
    // category
    Route::resource('category', CategoryController::class);
    Route::get('/category/parent-chlid/ajax/{cate_id}', [CategoryController::class, 'parentChild']);
    // vat  amount
    Route::resource('vat-amount', VatController::class);
    Route::get('vat-amount-inactive/{id}', [VatController::class, 'vatInactive'])->name('vat.inactive');
    Route::get('vat-amount-active/{id}', [VatController::class, 'vatActive'])->name('vat.active');
    // Orders 
    Route::resource('orders', OrderController::class);
    Route::get('orders-pending', [OrderController::class, 'ordersPending'])->name('orders.pending');
    Route::get('orders-confirmed', [OrderController::class, 'ordersConfirmed'])->name('orders.confirmed');
    Route::get('orders-processing', [OrderController::class, 'ordersProcessing'])->name('orders.processing');
    Route::get('orders-delivered', [OrderController::class, 'ordersDelivered'])->name('orders.delivered');
    Route::get('orders-successed', [OrderController::class, 'ordersSuccessed'])->name('orders.successed');
    Route::get('orders-canceled', [OrderController::class, 'ordersCanceled'])->name('orders.canceled');
    // order status change 
    Route::post('orders-status', [OrderController::class, 'ordersStatus'])->name('orders.status');
    // purchase sold and stock  report product
    Route::resource('purchase', PurchaseController::class);
    Route::post('stock-purchase', [PurchaseController::class, 'stockPurchase'])->name('stock.purchase');
    Route::resource('sold-product', StockController::class);
    Route::get('sold-search', [StockController::class, 'soldSearch'])->name('sold.search');
    Route::get('sold-product-report', [StockController::class, 'showReport'])->name('sold-product.report');
    Route::get('sold-product-report-search', [StockController::class, 'showReportSearch'])->name('sold-product-report.search');
    // client
    Route::resource('clients', ClientController::class);
    Route::get('client-inactive/{id}', [ClientController::class, 'clientInactive'])->name('client.inactive');
    Route::get('client-active/{id}', [ClientController::class, 'clientActive'])->name('client.active');
});
Route::group(['as' => 'customer.', 'prefix' => 'customer', 'middleware' => ['auth', 'customer']], function () {
    Route::get('/information', [InformationController::class, 'information'])->name('dashboard');
    Route::get('profile-setting', [InformationController::class, 'profile'])->name('profile');
    Route::post('profile/{id}', [InformationController::class, 'profileUpdate'])->name('profile.update');
    Route::post('pass-updated/{id}', [InformationController::class, 'updatePass'])->name('password.update');
    // wishlist arae with auth
    Route::get('my-wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('my-wishlist', [WishlistController::class, 'wishlistStore'])->name('wishlist.store');
    Route::post('destroy/my-wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    // my order view
    Route::get('my-order', [WishlistController::class, 'orderIndex'])->name('order');
    Route::get('my-order-view/{id}', [WishlistController::class, 'orderView'])->name('order.view');
    // checkout
    Route::resource('checkout', CheckoutController::class);
    Route::get('division-distric-billing/ajax/{billing_div_id}', [CheckoutController::class, 'getDivDisBilling']);
    Route::get('division-distric-shipping/ajax/{shipping_div_id}', [CheckoutController::class, 'getDivDisShipping']);
    Route::get('order-cancel/{id}', [CheckoutController::class, 'orderCancel'])->name('order.cancel');
});
Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Customer'], function () {
    // wishlist area with un authentication
    Route::post('review', [WishlistController::class, 'review'])->name('review');
});