<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//登录路由

//Route::group(['middleware' => ['web']], function () {
//});

    Route::any('admin/login','Admin\LoginController@login');
    Route::get('admin/code','Admin\LoginController@code');
    Route::get('admin/getcode','Admin\LoginController@getcode');
    Route::any('admin/crypt', 'Admin\LoginController@crypt');




Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    Route::any('index', 'IndexController@index');
    Route::any('info', 'IndexController@info');
    Route::any('quit', 'LoginController@quit');
    Route::resource('category', 'CategoryController');

});

Route::any('admin/pass', 'Admin\IndexController@pass');

/*Route::get('/', function () {
    return view('home');
});*/