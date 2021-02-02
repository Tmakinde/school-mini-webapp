<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
   // use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }
}
