<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Feedback extends Model
{
    protected $table='feedback';
    public $timestamps = true; 
    protected $fillable = ['name','email','phone','message','type'];
}
