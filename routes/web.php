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
    return view('User.index');
})->name('index');
Route::resource('B_user','Admin\C_User');
Route::group(['prefix => B_user'],function(){
	Route::get('/showAccount/{role}',['as'=>'B_user.showAccount','uses'=>'Admin\C_User@showAccount']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
