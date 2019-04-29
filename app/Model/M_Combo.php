<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Combo extends Model
{
    protected $table='combo';
    public $timestamps = false; 
    protected $fillable = ['name','discount','image','type','price'];
}
