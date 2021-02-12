<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    use HasFactory;
    protected $table = 'activations';
    protected $fillable = ['activation'];

    public function classes(){
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
