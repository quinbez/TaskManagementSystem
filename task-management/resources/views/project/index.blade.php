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
            <th>Starts</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @if($projects)
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->category?->type }}</td>
                    <td>{{$project->description}}</td>
                    <td>
                    <?php $teamMembersArray = explode(',', $project->team_member);?>
                    @foreach ($teamMembersArray as $team)
                    <?php $memberName = App\Models\User::select('name')->where('id',$team)->first() ?>
                   {{$memberName->name}},
                    @endforeach
                </td>
                    <td></td>
                    <td>{{$project->start_date}}</td>
                    <td>{{$project->deadline}}</td>
                    <td>{{$project->status}}</td>
                    <td>{{$project->created_at->diffForHumans()}}</td>
                    <td>{{$project->updated_at->diffForHumans()}}</td>
                    <td><a href="{{url("/project/edit/$project->id")}}" style="color:#efef27;">Edit</a></td>
                    <td><a href="{{url("/project/delete/$project->id")}}" style="color:red;">Delete</a></td>

                </tr>
            @endforeach
        @endif

    </tbody>
</table>
@endsection
