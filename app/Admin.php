<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
 
class Admin extends Authenticatable
{
    use Notifiable;

    protected $gaurd = 'admin';

    protected $table = 'admins';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'role', 'email', 'password', 'first_name', 'last_name', 'image', 'gender', 'education', 'mobile', 'alt_mobile', 'allergies_or_aversions', 'worked_before', 'children_age', 'address_1', 'address_2', 'country', 'city', 'state', 'zip', 'status'
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function unavailabilities(){
        return $this->hasMany('App\NannyUnavailability', 'admin_id', 'id');
    }

    public static function nannyWeeklyHours($nanny_id){

        $date = date('m/d/Y');
        
        $ts = strtotime($date);
        
        $dow = date('w', $ts);
        $offset = $dow - 1;
        if ($offset < 0) {
            $offset = 6;
        }
        
        $ts = $ts - $offset*86400;

        $total_time = 0;

        for ($i = 0; $i < 7; $i++, $ts += 86400){
            //echo date("m/d/Y l", $ts) . "\n";

            $dates = DB::table('checkins')->where('admin_id', '=', $nanny_id)->where('created_at', 'like',"%".date('Y-m-d', $ts).'%')->get();

            foreach($dates as $date){
                $to_time = strtotime($date->start_time);
                $from_time = strtotime($date->end_time);
                $time = round(abs($to_time - $from_time) / 60,2);

                $total_time = $total_time + $time;
            }

        }

        return $total_time;

    }
}