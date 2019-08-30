<?php

namespace App;

use Laratrust\Models\LaratrustRole;
use App\User;

class Role extends LaratrustRole
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
