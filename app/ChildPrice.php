<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildPrice extends Model
{
    protected $guard = "admin";

    protected $table = 'child_prices';
}
