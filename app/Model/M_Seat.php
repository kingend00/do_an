<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_Seat extends Model
{
    protected $table='seat';
    public $timestamps = false;
    protected $fillable=['type'];
}
