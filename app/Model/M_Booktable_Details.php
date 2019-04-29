<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Booktable_Details extends Model
{
    protected $table='booktable_details';
    public $timestamps = false; 
    protected $fillable = ['booktable_id','menu_id','combo_id','quantity']; 
}