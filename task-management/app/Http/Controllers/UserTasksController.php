<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserTasksController extends Controller
{
    public function index(){
        // dd(Auth::user()->role);
        $tasks = Task::where('user_id', Auth::user()->id)->get();
        return view('user.alltasks', compact('tasks'));
    }
}
