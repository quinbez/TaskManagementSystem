<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
class PendingController extends Controller
{
    public function index(){
        $tasks = Task::all();
        DB::table('tasks')->update(['seen' => 1]);
        return view('user.pending', compact('tasks'));
    }
}
