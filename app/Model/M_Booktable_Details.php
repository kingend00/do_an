<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Booktable_Details extends Model
{
    protected $table='booktable_details';
    public $timestamps = false; 
    protected $fillable = ['booktable_id','menu_id','combo_id','quantity']; 
    public function booktables(){
        return $this->belongsTo('App\Model\M_Booktable','booktable_id');
    }

    public function menu(){
        return $this->hasMany('App\Model\M_Menu','menu_id','menu_id');
    }

    public function combo(){
        return $this->hasMany('App\Model\M_Combo','combo_id','combo_id');
    }
}
