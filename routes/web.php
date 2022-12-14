<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

//da cancellare quando si attiva il front-office
/* Route::middleware('auth')->get('/', function() {
    return view('admin.show');
}); */

Route::middleware('auth')->get('/home', function() {
    return view('admin.show');
});

Route::middleware('auth')
    //->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('plates', 'PlateController');
        //Route::resource('orders', 'OrderController');
        Route::get('/orders', 'OrderController@index')->name('orders.index');
        Route::get('/orders/stats', 'OrderController@stats')->name('orders.stats');
    });

Route::post('/register/create', 'Auth\RegisterController@create')->name('addNewUser');


Route::get('/checkout', function () {
	return view('guest.checkout_success');
})->name('checkout');

Route::get('/checkoutf', function () {
	return view('guest.checkout_failed');
})->name('checkoutf');

//da scommentare quando si attiva il front-office
Route::get("{any?}", function () {
    return view('guest.home');
})->where("any", ".*");