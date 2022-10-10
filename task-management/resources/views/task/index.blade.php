@extends('layouts.admin')

@section('content')

<h3>All Tasks</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Project Id<th>
            <th>Member Id<th>
            <th>Name</th>
            <th>Description</th>
            <th>Start</th>
            <th>End</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Status<th>


        </tr>
    </thead>
    @if($tasks)
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->project_id}}</td>
                    <td></td>
                    <td>{{$task->member_id}}</td>
                    <td></td>
                    <td>{{$task->name}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->start_date}}</td>
                    <td>{{$task->end_date}}</td>
                    <td>{{$task->created_at->diffForHumans()}}</td>
                    <td>{{$task->updated_at->diffForHumans()}}</td>


                </tr>
            @endforeach
        @endif

    </tbody>

@endsection
