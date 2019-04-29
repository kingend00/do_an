<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_News extends Model
{
    protected $table='news';
   
    protected $fillable = ['title','content','image','image','type'];
}
