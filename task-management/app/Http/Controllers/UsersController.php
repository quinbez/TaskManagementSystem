<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class UsersController extends Controller
{
     public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        return view('user.dashboard');
    }

    public function search(Request $request)
    {
        $members = User::where('name', $request->search)->get();
        $tasks = Task::where('name', $request->search)->get();
        $projects = Project::where('title', $request->search)->get();
        // dd(count($tasks));
        if(count($members) > 0){
        return view('member.index', compact('members'));
        }elseif(count($tasks) > 0){
            return view('task.index', compact('tasks'));
        }
        elseif(count($projects) > 0){
            return view('project.index', compact('projects'));
        }
        else
        return redirect()->back()->with('error',' Nothing found');

    }


}
