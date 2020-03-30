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
    
    Route::get('/phones/{phone}/edit', 'PhoneByCustomerController@edit')->name('phone_by_customers.edit');
    Route::put('/phones/{phone}', 'PhoneByCustomerController@update')->name('phone_by_customers.update');
    Route::delete('/phones/{phone}', 'PhoneByCustomerController@edit')->name('phone_by_customers.destroy');
    
    Route::resource('/groups', 'GroupController');
    Route::resource('/customers', 'CustomerController');
});
