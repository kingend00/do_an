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
    // Sản phẩm , combo bán theo khoảng ngày
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

    // Sản phẩm. combo bán trong ngày
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
      $new = array();
      $seat = "";
        $from = date('Y-m-d',strtotime($request->input('from')));
        $to = date('Y-m-d',strtotime($request->input('to')));
        //return $to;

      if($to == "1970-01-01")
        $seat = DB::table('seat')->select(DB::raw('COUNT(seat.type) as Count'),'seat.type')->join('booktable','booktable.number_seat','=','seat.number_seat')->where('booktable.date',$from)->where('status','=','success')->groupBy(DB::raw('seat.type'))->get()->toArray();
      else
      $seat = DB::table('seat')->select(DB::raw('COUNT(seat.type) as Count'),'seat.type')->join('booktable','booktable.number_seat','=','seat.number_seat')->whereBetween('booktable.date',[$from,$to])->where('status','=','success')->groupBy(DB::raw('seat.type'))->get()->toArray();
        
          foreach($seat as $item)
              $new[$item->type] = $item->Count;                                   
        //$b =array_change_key_case($a);
        //return count($new);
        $data = $new;
        return view('Admin.viewStatistic',compact('data'));

    }
}
