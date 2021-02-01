<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'Subjectname','classes_id',
    ];

    public function users(){
        return  $this->belongsToMany(User::class);
    }

    public function classes(){
        return $this->belongsTo(Classes::class , 'classes_id');
    }

    public function topics(){
        return  $this->hasMany(Topic::class, 'subject_id');
    }

    public function results(){
        return $this->hasMany(Result::class);
    }

}

