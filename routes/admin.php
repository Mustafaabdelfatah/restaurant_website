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


Route::group(['namespace'=>'Admin','middleware' => 'auth:admin'], function(){

    Route::get('/dashboard','DahboardController@index')->name('admin.dashboard');
    Route::resource('slider','SliderController');
    Route::resource('categories','CategoryController');
    Route::resource('items','ItemController');
    Route::get('reservation','ReservationController@index')->name('reservation.index');
    Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('reservation/{id}','ReservationController@destory')->name('reservation.destory');
    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');

});


Route::group(['namespace'=>'Admin','middleware' => 'guest:admin'], function(){

     Route::get('login' ,'AdminAuth@login')->name('get.admin.login');
     Route::post('login' ,'AdminAuth@dologin')->name('admin.login');


});


