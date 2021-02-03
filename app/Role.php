<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    use HasFactory;

    public function admins(){
        return $this->hasMany(Admin::class);
    }

    public function superAdmins(){

        return $this->where('role', 'super_admin')->first();

    }
}
