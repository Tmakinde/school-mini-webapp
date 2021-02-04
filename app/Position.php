<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //use HasFactory;
    protected $fillable = ['total','user_id', 'classes_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function classes(){
        return $this->belongsTo(Classes::class);
    }

}
