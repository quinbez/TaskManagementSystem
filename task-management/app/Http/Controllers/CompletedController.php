<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class CompletedController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('user.completed', compact('tasks'));
    }
}
