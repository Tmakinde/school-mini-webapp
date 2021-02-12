<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Classes extends Model
{
    
    protected $table = 'classes';
    protected $fillable = [
        'class'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function positions(){
        return $this->hasMany(Position::class);
    }

    public function activations(){
        return $this->hasOne(Activation::class, 'class_id');
    }
    
    public function registrations(){
        return $this->hasOne(Registration::class);
    }
}
