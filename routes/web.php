<?php
use Gloudemans\Shoppingcart\Facades\Cart;
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
Route::get('testlogin',function(){
    return view('auth.register2');
});

Route::group(['prefix => B_user'],function(){
	Route::get('/showAccount/{role}',['as'=>'B_user.showAccount','uses'=>'Admin\C_User@showAccount']);
});
Route::group(['prefix =>B_seat'],function(){
    Route::get('/showType/{type}','Admin\C_Seat@showType')->name('B_seat.showType');
    Route::get('/AutoIncrement','Admin\C_Seat@AutoIncrement')->name('B_Seat.AutoIncrement');
});
Route::group(['prefix' => 'F_menu'],function(){
    Route::get('/addtoCart/{id}','User\C_Menu@addtoCart')->name('F_menu.addtoCart');
    Route::get('/showCart','User\C_Menu@showCart')->name('F_menu.showCart');
});
Route::resources(['F_menu'=>'User\C_Menu','F_seat'=>'User\C_Seat']);


Route::group(['middleware'=>['auth','denied_cus_emp']],function(){
    //
    Route::resources(['B_user'=>'Admin\C_User','B_seat'=>'Admin\C_Seat']);
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

