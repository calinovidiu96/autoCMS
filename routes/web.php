<?php

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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::group(['middleware'=>'user'], function(){

    Route::resource('user', 'UserController',['names'=>[
        'index'=>'users.index',
    ]]);
    
    Route::resource('users/vehicles', 'UserVehiclesController',['names'=>[
       
        'create'=>'users.vehicles.create',
        'store'=>'users.vehicles.store',
    
    ]]);

});



Route::group(['middleware'=>'admin'], function(){

});

