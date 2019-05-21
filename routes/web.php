<?php
use Gloudemans\Shoppingcart\Facades\Cart;
use Yajra\DataTables\Facades\DataTables;
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

Route::get('/reset',function(){
    return view('auth.passwords.reset');
});
Route::get('flush',function(){
    session()->flush();
});
Route::get('/hihi123',function(){
    return view('User.testTable');
});
Route::get('/hihi',function(){
    $date_now = date('Y-m-d',time());
    $date_pick = '2019-05-20';
   echo ($date_now == $date_pick);
});
Route::get('/hihi222',function(){
    $seat = "6";
       
    $date = "2019-05-19";
    $date2 =  strtotime(str_replace('/', '-', $date));
    $date3 = date('Y-m-d',$date2);
    $data_seat = DB::table('seat')->select('number_seat')->where('type',$seat)->get();
    $data = array();
    $datanew = array();
    $new = array();
    for($i = 0;$i < count($data_seat);$i++)
    {
        $value = array();
        $row = DB::table('booktable')->select('time')->where('date',$date3)->where('number_seat',$data_seat[$i]->number_seat)->get();
       if(count($row) != 0)
       {
        for($j=0;$j<count($row);$j++)
        {
            $split  = explode(':',$row[$j]->time);
            array_push($value,(int)$split[0]);
        }

            array_push($value,22);
            sort($value);
            
            for($k = 0 ; $k < count($value)-1;$k++)
            {
                $datanew[$k] = [1 => start_end($value[$k],$value[$k+1])];
               
            }

            $data[$data_seat[$i]->number_seat] = $datanew;
            $new['12'] = $data;
       }
       
       
       
    }

    return json_encode($new);
    // $hihi = 1;
    // $html = "{";
    //     foreach($data as $key=>$value)
    //     {
           
    //         $html .= "'".$hihi."' :{";
    //         $html .= "title: '".$key."',";
    //         $html .= "schedule :[";
    //         for($i = 0 ; $i < count($value)-1;$i++)
    //         {
    //             $data2 = $this->start_end($value[$i],$value[$i+1]);
    //             $html .= "{start: '".$data2[0].":00',";
    //             $html .= "end: '".$data2[1].":00',},";
    //         } 
    //         $html .= "]";
    //         $html .= "},";
    //         $hihi++;   
    //     }
    // $html .= "}";
    // session()->put(['hihi'=>$html]);
    // return $html;

    

    
});
function start_end($a,$b)
    {
        if($b-$a >= 2)
        {
            $result =  $a.":00-".($a+2).":00";
            return $result;
        }
        else
        {
            $result =  $a.":00-".($a+1).":00";
            return $result;
        }
    }
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
    Route::post('/showTime_Seat','User\C_Seat@showTime_Seat')->name('F_seat.showTime_Seat');
    Route::get('/start_end/{a}/{b}','User\C_Seat@start_end')->name('start_end');
});

Route::get('/Contact',function(){
    return view('User.Contact');
})->name('contact');
Route::get('/News',function(){
    return view('User.News');
})->name('news');
Route::get('/About',function(){
    return view('User.About');
})->name('about');

Route::resources(['F_menu'=>'User\C_Menu','F_seat'=>'User\C_Seat','F_contact'=>'Admin\C_Contact']);


Route::group(['middleware'=>['auth','denied_cus_emp']],function(){
    //
    Route::resources(['B_user'=>'Admin\C_User','B_seat'=>'Admin\C_Seat','B_menu'=>'Admin\C_Menu','B_booktable'=>'Admin\C_Booktable','B_combo'=>'Admin\C_Combo','B_contact'=>'Admin\C_Contact','B_news'=>'Admin\C_News']);
    
    Route::group(['prefix=>B_menu'],function(){
        Route::get('/showMenu/{category_id}','Admin\C_Menu@showMenu')->name('B_menu.showMenu');
        Route::post('/updateMenu','Admin\C_Menu@UpdateMenu')->name('B_menu.updateMenu');
        Route::get('/getDataMenu/{category_id}','Admin\C_Menu@getDataMenu')->name('B_menu.getData');
    });
    Route::group(['prefix => B_user'],function(){
        Route::get('/showAccountUser/{role}',['as'=>'B_user.showAccount','uses'=>'Admin\C_User@showAccount']);
        Route::get('/getDataUser/{roles}','Admin\C_User@getData')->name('B_user.getData');
    });
    Route::group(['prefix => B_news'],function(){
        Route::post('/UpdateNews',['as'=>'B_news.UpdateNews','uses'=>'Admin\C_News@UpdateNews']);
        Route::get('/getDataNews','Admin\C_News@getDataNews')->name('B_news.getDataNews');
    });
    Route::group(['prefix =>B_seat'],function(){
        Route::get('/showType/{type}','Admin\C_Seat@showType')->name('B_seat.showType');
        Route::get('/AutoIncrement','Admin\C_Seat@AutoIncrement')->name('B_Seat.AutoIncrement');
        Route::get('/getDataSeat/{Type}','Admin\C_Seat@getData')->name('B_seat.getData');
    });
    Route::group(['prefix => B_booktable'],function(){
        Route::get('/showDetailBooktable/{id}','Admin\C_Booktable@showDetails')->name('B_booktable.showDetails');
        Route::get('/getDataBT','Admin\C_Booktable@getData')->name('B_booktable.getData');
    });
    Route::group(['prefix => B_combo'],function(){
        Route::post('/updateCombo','Admin\C_Combo@Update2')->name('B_combo.update2');
        Route::get('/showDetailsCombo/{id}','Admin\C_Combo@showDetails')->name('B_combo.showDetails');
        Route::get('/getDataCombo','Admin\C_Combo@getData')->name('B_combo.getData');
        
    });
    Route::group(['prefix'=>'B_statistic'],function(){
        Route::post('/time','Admin\C_Statistic@Time')->name('B_statistic.time');
        Route::get('/index','Admin\C_Statistic@index')->name('B_statistic.index');
    });
   
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

