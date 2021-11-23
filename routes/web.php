<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// for admin controller 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\BrandController;

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

});

Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth', 'customer']], function () {
    
    Route::get('/information', [InformationController::class, 'information'])->name('dashboard');

});