<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Menu extends Model
{
    protected $table='menu';
    public $timestamps = false; 
    protected $fillable = ['name','description','price','image','type'];
}
