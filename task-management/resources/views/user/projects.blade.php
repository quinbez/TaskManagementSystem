@extends('layouts.admin')

@section('content')

<h3>All Projects</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Team<th>
            <th>Start</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        @if($projects)
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->category_id }}</td>
                    <td>{{$project->description}}</td>
                    <td><a href="#">{{$project->team_member}}</a></td>
                    <td></td>
                    <td>{{$project->start_date}}</td>
                    <td>{{$project->deadline}}</td>
                    <td>{{$project->status_id == 1 ? "On progress" : "Completed"}}</td>
                    <td>{{$project->created_at->diffForHumans()}}</td>
                    <td>{{$project->updated_at->diffForHumans()}}</td>
                    {{-- <td><a href="{{route('update'), $project->id}}">Edit</a></td> --}}
                </tr>
            @endforeach
        @endif

    </tbody>
</table>
@endsection
