<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =[
        'name',
        'email',
        'phone_number',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function setPasswordAttribute($value){
        $this->attributes['password']= bcrypt($value);
    }
    protected function role():Attribute{
        return new Attribute(
            get:fn($value)=>["member","admin"][$value]
        );
    }
}
