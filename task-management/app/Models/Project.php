<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable =[
        'status_id',
        'category_id',
        'name',
        'start_date',
        'end_date'
    ];
    public function tasks(){
        return $this->hasMany('App\Models\Task');
    }
}
