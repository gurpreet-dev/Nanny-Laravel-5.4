<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function request(){
        return $this->belongsTo('App\FamilyRequest', 'request_id', 'id');
    }

    public function last_invoice(){
        return $this->belongsTo('App\Invoice', 'last_invoice', 'id');
    }

    public function attendence(){
        return $this->hasMany('App\Checkin', 'order_id', 'id');
    }

    public function nanny(){
        return $this->belongsTo('App\Admin', 'admin_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function services(){
        return $this->hasMany('App\RequestService', 'request_id', 'id');
    }
}
