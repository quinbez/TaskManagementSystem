<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable =[
        'member_id',
        'project_id',
        'name',
        'description',
        'start_date',
        'end_date'
    ];
    public function member(){
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }
    public function project(){
        return $this->belongsTo('App\Models\Project', 'project_id','id');
    }
}
