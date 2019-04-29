<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Booktable extends Model
{
    protected $table='booktable';
    public $timestamps = false; 
    protected $fillable = ['name','description','price','image','type','email','date','time','number_seat'];
}
