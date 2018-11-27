<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{
    protected $guard = "admin";

    protected $table = 'request_services';

    public function service(){
        return $this->belongsTo('App\AdminService', 'service_id', 'id');
    }

}
