<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //use HasFactory;
    protected $fillable = ['user_id', 'test', 'exam', 'total', 'subject_id'];
    public function subjects(){
        return $this->belongsTo(Subject::class);
    }
}
