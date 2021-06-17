<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $guarded = [];
    protected $guard_name = 'api';

}