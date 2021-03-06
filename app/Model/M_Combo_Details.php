<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Combo_Details extends Model
{
    protected $table='combo_details';
    public $timestamps = false; 
    protected $fillable = ['menu_id','combo_id','quantity','type'];
    public function combos(){
        return $this->belongsTo('App\Model\M_Combo','combo_id');
    }
}
