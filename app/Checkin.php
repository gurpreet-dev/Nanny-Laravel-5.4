<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $table = 'checkins';

    protected $fillable = ['order_id', 'admin_id', 'start_time', 'end_time'];

    //public $timestamps = true;
}
