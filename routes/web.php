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
// Route::get('testlogin',function(){
//     $rows = Cart::search(function($key, $value) {
//         return $key->id == 1;
//     });
//     $rows1=$rows->first();
//     //$rowId = '1bc9e6c81a0f9af2273448571bc668a7';
//     Cart::update($rows1->rowId,++$rows1->qty);
//     return Cart::get($rows1->rowId);
// });
Route::get('test',function(){
    echo"<option value=12>hihi</option><option>hihi2</option>";
});
Route::get('/dbs',function(){

    return view('Admin.db');
});
Route::group(['prefix' => 'F_menu'],function(){
    Route::get('/addtoCart/{id}','User\C_Menu@addtoCart')->name('F_menu.addtoCart');
    Route::get('/showCart','User\C_Menu@showCart')->name('F_menu.showCart');
    Route::post('/editCart','User\C_Menu@EditCart')->name('editCart');
});

Route::resources(['F_menu'=>'User\C_Menu','F_seat'=>'User\C_Seat']);


Route::group(['middleware'=>['auth','denied_cus_emp']],function(){
    //
    Route::resources(['B_user'=>'Admin\C_User','B_seat'=>'Admin\C_Seat','B_menu'=>'Admin\C_Menu','B_booktable'=>'Admin\C_Booktable']);
    Route::group(['prefix=>B_menu'],function(){
        Route::get('/showMenu/{category_id}','Admin\C_Menu@showMenu')->name('B_menu.showMenu');
    });
    Route::group(['prefix => B_user'],function(){
        Route::get('/showAccount/{role}',['as'=>'B_user.showAccount','uses'=>'Admin\C_User@showAccount']);
    });
    Route::group(['prefix =>B_seat'],function(){
        Route::get('/showType/{type}','Admin\C_Seat@showType')->name('B_seat.showType');
        Route::get('/AutoIncrement','Admin\C_Seat@AutoIncrement')->name('B_Seat.AutoIncrement');
    });
    Route::group(['prefix => B_booktable'],function(){
        Route::get('/showDetails/{id}','Admin\C_Booktable@showDetails')->name('B_booktable.showDetails');
    });
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

