<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyRequest extends Model
{
    protected $guard = "admin";

    protected $table = 'requests';

    public function dates(){
        return $this->hasMany('App\RequestDate', 'request_id', 'id');
    }

    public function interests(){
        return $this->hasMany('App\RequestInterest', 'request_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function services(){
        return $this->hasMany('App\RequestService', 'request_id', 'id');
    }

    public function recommendedadmin(){
        return $this->belongsTo('App\Admin', 'recommended_admin', 'id');
    }

    public function type(){
        return $this->belongsTo('App\Type', 'type_id', 'id');
    }
    
}
