<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestInterest extends Model
{
    protected $table = 'request_interests';

    public function interestednanny(){
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
