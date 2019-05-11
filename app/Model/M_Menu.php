<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Menu extends Model
{
    protected $table='menu';
    public $timestamps = false; 
    protected $fillable = ['name','description','price','image','type'];
    public function bookdetails(){
        return $this->belongsTo('App\Model\M_Booktable_Details','menu_id','menu_id');
    }
}
