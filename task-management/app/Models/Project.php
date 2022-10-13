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
        'team_member',
        'description',
        'user_id',
        'start_date',
        'deadline',
        'status'
    ];
    public function tasks(){
        return $this->hasMany('App\Models\Task', 'project_id','id');
    }
        public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
