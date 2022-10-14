@extends('user.index')

@section('content')

<h3>Completed Tasks</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Project</th>
            <th>Assigned To</th>
            <th>Description</th>
            <th>Start</th>
            <th>End</th>
            <th>Created</th>
            <th>Updated</th>

        </tr>
    </thead>
    @if($tasks)
            @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->name}}</td>
                    {{-- <td></td> --}}
                    <td>{{$task->project?->title}}</td>
                    <td>{{$task->member?->name}}</td>
                    {{-- <td></td> --}}
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
