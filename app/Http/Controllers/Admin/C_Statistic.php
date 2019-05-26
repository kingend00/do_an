<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class C_Statistic extends Controller
{
    public function index()
    {
        return view('Admin.Statistic');
    }
    public function index2()
    {
        return view('Admin.StatisticSeat');
    }
    public function Time(Request $request)
    {
      //$from = $request->input('from');
      $from = date('Y-m-d',strtotime($request->input('from')));
      $to = date('Y-m-d',strtotime($request->input('to')));
      //$to = $request->input('to');
      $menu2 = DB::table('menu')->get();
      
      $menu =  DB::table('booktable')->select('menu.name as Name_Menu',DB::raw("COUNT(menu.name) as Count"))
      ->join('booktable_details','booktable.booktable_id','=','booktable_details.booktable_id')
      ->join('menu','menu.menu_id','=','booktable_details.menu_id')->whereBetween('booktable.date',[$from,$to])->where('status','=','success')->groupBy(DB::raw('menu.name'))->orderBy('Count','DESC')->get();
     
      $combo =  DB::table('booktable')->select('combo.name as Name_Combo',DB::raw("COUNT(combo.name) as Count"))
      ->join('booktable_details','booktable.booktable_id','=','booktable_details.booktable_id')
      ->join('combo','combo.combo_id','=','booktable_details.combo_id')->whereBetween('booktable.date',[$from,$to])->groupBy(DB::raw('combo.name'))->orderBy('Count','DESC')->get();
     
      return view('Admin.viewStatistic',compact('menu','combo'));
    }
    public function Into(Request $request)
    {
      $into = date('Y-m-d',strtotime($request->input('into')));

      $into_menu =  DB::table('booktable')->select('menu.name as Name_Menu',DB::raw("COUNT(menu.name) as Count"))
      ->join('booktable_details','booktable.booktable_id','=','booktable_details.booktable_id')
      ->join('menu','menu.menu_id','=','booktable_details.menu_id')->where('booktable.date','=',$into)->where('status','=','success')->groupBy(DB::raw('menu.name'))->orderBy('Count','DESC')->get();
      
      $into_combo =  DB::table('booktable')->select('combo.name as Name_Combo',DB::raw("COUNT(combo.name) as Count"))
      ->join('booktable_details','booktable.booktable_id','=','booktable_details.booktable_id')
      ->join('combo','combo.combo_id','=','booktable_details.combo_id')->where('booktable.date','=',$into)->groupBy(DB::raw('combo.name'))->orderBy('Count','DESC')->get();
      
      return view('Admin.viewStatistic',compact('into_menu','into_combo'));
     
    }
    public function TimeSeat(Request $request)
    {
        $from = date('Y-m-d',strtotime($request->input('from')));
        $to = date('Y-m-d',strtotime($request->input('to')));

      $seat = DB::table('seat')->select('seat.type')->join('booktable','booktable.number_seat','=','seat.number_seat')->whereBetween('booktable.date',[$from,$to])->where('status','=','success')->get()->toArray();
        $new = array();
          foreach($seat as $item)
              $new[] = $item->type;
        //$b =array_change_key_case($a);
        $data = array_count_values($new);
        return view('Admin.viewStatistic',compact('data'));

    }
}
