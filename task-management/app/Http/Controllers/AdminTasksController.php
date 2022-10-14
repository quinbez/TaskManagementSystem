<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTasksRequest;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\TasksRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members= User::select('id','name')->get();
        $project = Project::select('id','title')->get();
        return view('task.create', compact('project','members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // dd($request->all());
        $project = Project::find($request->project_id);
        $user = User::find($request->user_id);

        $check = DB::table('project_user')->where('project_id', $project->id)->where('user_id', $user->id)->count();

        if($check){
            Session::flash('error', 'Duplicate');
            return redirect('dashboard');

        }else{
            $user->projects()->save($project);
            Task::create($request->all());
            return redirect('task/index');
        }
        // dd($check);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        $project = Project::select('title', 'id')->get();
        $members = User::select('name','id')->get();
        return view('task.edit', compact('tasks', 'members','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTasksRequest $request)
    {
        $id = $request->taskId;
        $tasks = Task::findOrFail($id);
        $taskUpdate =[
            'name' => $request->name,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
        ];
        $tasks->update($taskUpdate);
        return redirect('task/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/task/index');
    }
}
