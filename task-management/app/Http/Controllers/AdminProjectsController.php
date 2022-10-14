<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProjectRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectsRequest;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::get();
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('type','id')->get();
        $teams = User::where('role', "member")->get();
        return view('project.create', compact('categories','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectsRequest $request)
    {
        $teamMembers = implode(',',$request->team_member);
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $deadline = Carbon::parse($request->deadline)->format('Y-m-d');
        // dd($teamMembers);
        $addedProject=[
            'title' => $request->title,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'team_member' => $teamMembers,
            'start_date' => $startDate,
            'deadline' => $deadline,
            'description' => $request->description,
        ];

         Project::create($addedProject);
         return redirect('project/index');

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
        $teams = User::select('name', 'id')->get();
        $categories = Category::select('type', 'id')->get();
        $projects = Project::findOrFail($id);
        return view('project.edit',compact('projects', 'categories','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request)
    {
        $id = $request->projectId;
        $projects = Project::findOrFail($id);
        $projectUpdate =[
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'team_member'=>$request->team_member,
            'start_date'=>$request->start_date,
            'deadline'=>$request->deadline,
            'status_id'=>$request->status_id
        ];
        $projects->update($projectUpdate);
        return redirect('project/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();

        return redirect('/project/index');
    }
}
