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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::group(['middleware' => ['auth', 'tenant', 'check_user_has_group']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/customers/{customer}/phones', 'PhoneByCustomerController');
    Route::resource('/groups', 'GroupController');
    Route::resource('/customers', 'CustomerController');
});
