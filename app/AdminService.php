<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminService extends Model
{
    protected $guard = "admin";

    protected $table = 'admin_services';
}
