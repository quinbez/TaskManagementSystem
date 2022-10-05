<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable =[
        'project_id',
        'name',
        'description',
        'start_date',
        'end_date'
    ];
    public function members(){
        return $this->belongsToMany('App\Models\Member');
    }
}
