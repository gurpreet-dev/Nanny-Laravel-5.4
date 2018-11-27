<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'email', 'first_name1', 'last_name1', 'mobile1' ,'first_name2', 'last_name2', 'mobile2', 'image', 'address_1', 'address_2', 'city', 'state', 'zip', 'household_info', 'pet_info', 'q1', 'q2', 'q3', 'q4', 'q5', 'a1', 'a2', 'a3', 'a4', 'a5', 'hear_aboutus', 'which_hear_aboutus', 'referred_by', 'gender', 'nanny_requirement', 'childs', 'ages', 'password', 'cc_number', 'cc_type', 'cc_expire_date_month', 'cc_expire_date_year', 'subscribed', 'status', 'start_date', 'end_date', 'amount', 'payment_status', 'profile_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function admin($type){
        $admin = DB::table('admins')->where('role', 'admin')->first();

        return $admin->$type;
    }
}
