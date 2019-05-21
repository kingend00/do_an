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
    public function Time(Request $request)
    {
      $from = $request->input('from');
      $to = $request->input('to');
      $menu2 = DB::table('menu')->get();
      
      $menu =  DB::table('booktable')->select('menu.name as Name_Menu',DB::raw("COUNT(menu.name) as Count"))
      ->join('booktable_details','booktable.booktable_id','=','booktable_details.booktable_id')
      ->join('menu','menu.menu_id','=','booktable_details.menu_id')->whereBetween('booktable.date',[$from,$to])->where('status','=','complete')->groupBy(DB::raw('menu.name'))->orderBy('Count','DESC')->get();
     
      $combo =  DB::table('booktable')->select('combo.name as Name_Combo',DB::raw("COUNT(combo.name) as Count"))
      ->join('booktable_details','booktable.booktable_id','=','booktable_details.booktable_id')
      ->join('combo','combo.combo_id','=','booktable_details.combo_id')->whereBetween('booktable.date',[$from,$to])->groupBy(DB::raw('combo.name'))->orderBy('Count','DESC')->get();
     
      return view('Admin.viewStatistic',compact('menu','combo'));
    }
}
