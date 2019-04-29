<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Seat_Status extends Model
{
    protected $table='seat_status';
    public $timestamps = false; 
    protected $fillable = ['number_seat','date','time'];
}
