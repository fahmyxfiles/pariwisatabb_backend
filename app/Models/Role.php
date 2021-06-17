<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    protected $guarded = [];
    protected $guard_name = 'api'; 

    protected $with = ['permissions'];
}