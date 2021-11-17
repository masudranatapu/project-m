<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\DashboardController;

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


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

Route::group(['as' => 'customer.', 'prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth', 'customer']], function () {
    
    Route::get('/information', [InformationController::class, 'information'])->name('dashboard');

});