<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $table = 'subscriptions';

    protected $fillable = [
        'user_id', 'start_date', 'end_date', 'amount', 'status', 'payment_status', 'profile_id'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
