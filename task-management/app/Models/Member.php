<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Laratrust\Traits\LaratrustUserTrait;

class Member extends Authenticatable
{
    // use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =[
        'name',
        'email',
        'phone_number',
        'password',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function setPasswordAttribute($value){
        $this->attributes['password']= bcrypt($value);
    }
    public function role(){
        return $this->belongsTo('App\Models\Role');
    }
}
