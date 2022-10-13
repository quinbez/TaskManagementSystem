<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersDashboardController extends Controller
{
    public function index(){
        $data["total_tasks"] = Task::where('user_id', Auth::user()->id)->count();
        return view('user.dashboard', $data);
    }

}
