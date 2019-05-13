<?php
use Gloudemans\Shoppingcart\Facades\Cart;
use Yajra\DataTables\Facades\DataTables;
use DB;
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

Route::get('/getcontent',function(){
    $seat = DB::table('seat')->get();
    return Datatables::of($seat)->addColumn('btn-edit',function($seat){
        return '<button type="button" class="btn btn-danger btn-edit" data-toggle="modal" data-target="#ModalUpdate" data-url="{{ route(\'B_seat.show\','.$seat->number_seat.')}}">Edit</button>';
    })->addColumn('btn-destroy',function($seat){
        return '<button type="button" class="btn btn-danger btn-destroy" value="{{$element->id }}">Xóa</button>';
    })->rawColumns(['btn-edit','btn-destroy'])->make(true);

})->name('testData');

Route::group(['prefix' => 'F_user'],function(){
    Route::get('/showAccount','User\C_User@showAccount')->name('F_user.showAccount');
    Route::post('/update','User\C_User@update')->name('F_user.update');
});
Route::group(['prefix' => 'F_menu'],function(){
    Route::get('/addtoCart/{id}','User\C_Menu@addtoCart')->name('F_menu.addtoCart');
    Route::get('/addComboToCart/{id}','User\C_Menu@addComboToCart')->name('F_menu.addComboToCart');
    Route::get('/showCart','User\C_Menu@showCart')->name('F_menu.showCart');
    Route::post('/editCart','User\C_Menu@EditCart')->name('editCart');
});
Route::group(['prefix' => 'F_seat'],function(){
    Route::get('/showTime_Seat/{date}/{people}','User\C_Seat@showTime_Seat')->name('F_seat.showTime_Seat');
});

Route::get('/Contact',function(){
    return view('User.Contact');
})->name('contact');

Route::resources(['F_menu'=>'User\C_Menu','F_seat'=>'User\C_Seat','F_contact'=>'Admin\C_Contact']);


Route::group(['middleware'=>['auth','denied_cus_emp']],function(){
    //
    Route::resources(['B_user'=>'Admin\C_User','B_seat'=>'Admin\C_Seat','B_menu'=>'Admin\C_Menu','B_booktable'=>'Admin\C_Booktable','B_combo'=>'Admin\C_Combo','B_contact'=>'Admin\C_Contact','B_news'=>'Admin\C_News']);
    
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
    Route::group(['prefix => B_combo'],function(){
        Route::get('/showDetails/{id}','Admin\C_Combo@showDetails')->name('B_combo.showDetails');
    });
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

