<?php

namespace App;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','classes_id'
    ];
    protected $guarded = [
        'classes_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function classes(){
        return $this->belongsTo(Classes::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'subject_user');
    }

    public function results(){
        return $this->hasManyThrough(Result::class, Subject::class);
    }

    public function position(){
        return $this->hasOne(Position::class);
    }

}
