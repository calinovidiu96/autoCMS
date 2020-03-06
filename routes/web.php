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

    Route::get('/user', 'UserController@index');
    
    Route::resource('user/vehicles', 'UserVehiclesController',['names'=>[
        'index'=>'user.vehicles.index',
        'create'=>'user.vehicles.create',
        'edit'=>'user.vehicles.edit',
        'store'=>'user.vehicles.store',
        
    ]]);

    Route::resource('user/operations', 'UserOperationsController',['names'=>[
        // 'index'=>'user.operations.index',
        'show'=>'user.operations.show',
        'edit'=>'user.operations.edit',
    
    ]]);

    Route::resource('user/visits', 'UserVisitsController',['names'=>[
        'index'=>'user.visits.index',
        'create'=>'user.visits.create',

        'edit'=>'user.visits.edit',

    ]]);

    

});



Route::group(['middleware'=>'admin'], function(){

});

