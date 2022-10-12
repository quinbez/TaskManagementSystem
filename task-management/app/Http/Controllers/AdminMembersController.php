<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminMembersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::all();
        return view('member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        // $request['password']='123456789';
        $input = $request->all();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect('member/index', compact('input'));
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
        $members = User::findOrFail($id);
        return view('member.edit', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id,)
    {
        //
        $member = User::findOrFail($id);
        $input = $request->all();
        $member->update($input);
        return redirect('member/index', compact('input'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect('/member/index');
    }

    public function search(Request $request)
    {
        $members = User::where('name', $request->search)->get();
        $tasks = Task::where('name', $request->search)->get();
        $projects = Project::where('title', $request->search)->get();
        $categories = Category::where('type', $request->search)->get();
        // dd(count($tasks));
        if(count($members) > 0){
        return view('member.index', compact('members'));
        }elseif(count($tasks) > 0){
            return view('task.index', compact('tasks'));
        }
        elseif(count($projects) > 0){
            return view('project.index', compact('projects'));
        }
        elseif(count($categories) > 0){
            return view('category.index', compact('categories'));
        }
        else
        return redirect()->back()->with('error',' Nothing found');

    }
}
