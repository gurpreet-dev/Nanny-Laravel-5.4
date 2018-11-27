<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = array('order_id', 'user_id', 'time', 'price', 'price_per_hour', 'due_price', 'service_charge', 'cc_number', 'transaction_id', 'amount_paid', 'payment_status', 'payment_gateway', 'payment_date', 'status', 'created_at', 'updated_at');

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function order(){
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    public function months(){
        return $this->hasMany('App\UserServiceMonth', 'invoice_id', 'id');
    }

}
