@extends('user.index')

@section('content')

<h3>Assigned Projects</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Team-Members</th>
            <th>Start-Date</th>
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
                    <td><a href="{{route('showdetail', $project->id)}}">{{$project->title}}</a></td>
                    <td>{{$project->category?->type }}</td>
                    <td>{{$project->description}}</td>
                    {{-- <td>{{implode(' , ',$project->users()->pluck('name')->toArray())}}</td> --}}
                    <td>
                        <?php $teamMembersArray = explode(',', $project->team_member);?>
                        @foreach ($teamMembersArray as $team)
                        <?php $memberName = App\Models\User::select('name','id')->where('id',$team)->first() ?>
                       <a href="{{route('teamdetail',[ $project->id, $memberName->id])}}">{{$memberName->name}}</a>,
                        @endforeach
                    </td>
                    <td>{{$project->start_date}}</td>
                    <td>{{$project->deadline}}</td>
                    <td>{{$project->status}}</td>
                    <td>{{$project->created_at->diffForHumans()}}</td>
                    <td>{{$project->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif

    </tbody>
</table>
@endsection
