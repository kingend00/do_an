<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Combo extends Model
{
    protected $table='combo';
    public $timestamps = false; 
    protected $fillable = ['name','discount','image','type','price','combo_id'];
    public function details(){
        return $this->hasMany('App\Model\M_Combo_Details','combo_id');
    }
}
