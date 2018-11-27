<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAdmin extends Model
{
    protected $guard = "admin";

    protected $table = 'order_admins';

    public function nanny(){
    	return $this->belongsTo('App\Admin', 'admin_id', 'id');
    }
}
