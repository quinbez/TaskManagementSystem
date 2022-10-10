<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'category_id',
        'description',
        'team_member',
        'start_date',
        'deadline',
        'status_id'
    ];
    public function tasks(){
        return $this->hasMany('App\Models\Task');
    }
}
