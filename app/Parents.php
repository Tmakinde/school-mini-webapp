<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Parents extends Authenticatable
{
   // use HasFactory;
   
    use Notifiable;

    protected $fillable = ['approval', 'parent_email'];

    public function admission(){

        return $this->hasOne(Admission::class, 'parent_id');
    }

}
