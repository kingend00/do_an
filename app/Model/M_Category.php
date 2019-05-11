<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Category extends Model
{
    protected $table='category';
    public $timestamps = false; 
    protected $fillable = ['name'];
}
