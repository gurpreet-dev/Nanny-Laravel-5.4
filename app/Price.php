<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guard = "admin";

    protected $table = 'prices';

    public function service(){
    	return $this->belongsTo('App\AdminService', 'service_id', 'id');
    }

    public function child_prices(){
    	return $this->hasMany('App\ChildPrice', 'price_id', 'id');
    }

    public function type(){
    	return $this->belongsTo('App\Type', 'type_id', 'id');
    }
}
