<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Time extends Model
{
    protected $table='time';
    public $timestamps = false;
    protected $fillable=['time'];
}
