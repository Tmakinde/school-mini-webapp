<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'hour', 'minutes', 'seconds', 'class_id', 'year', 'month', 'day'
    ];
    public function classes(){
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
