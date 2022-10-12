<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProjectRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectsRequest;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;

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
        $categories = Category::select('type','id');
        $teams = User::select('name','id')->get();
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
        //
         Project::create($request->all());
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
        $projects = Project::findOrFail($id);
        return view('project.edit',compact('projects'));
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
        $categories = Category::select('type', 'id');
        $projects = Project::findOrFail($id);
        $teams = User::select('name', 'id');
        $projectUpdate =[
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'team_member'=>$request->team_member,
            'start_date'=>$request->start_date,
            'deadline'=>$request->deadline,
            'status_id'=>$request->status_id
        ];
        $input = $request->all();
        $projects->update($projectUpdate);
        return view('project.index', compact('categories', 'teams'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
