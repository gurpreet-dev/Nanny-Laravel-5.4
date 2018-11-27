<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Type extends Model
{
    protected $table = 'types';

    public static function getTypeBySlug($slug){

        $data = DB::table('types')->where('slug', $slug)->first();

        return $data;

    }

}
