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

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/admin/show', function () {
    return view('auth.show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("{any?}", function () {
    return view('guest.home');
})->where("any", ".*");

Route::post('/register/create', 'Auth\RegisterController@create')->name('register');