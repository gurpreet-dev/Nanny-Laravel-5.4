<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NannyUnavailability extends Model
{
    protected $gaurd = 'admin';

    protected $table = 'nanny_unavailabilities';
    
    protected $fillable = [
       'admin_id', 'date'
    ];

}
