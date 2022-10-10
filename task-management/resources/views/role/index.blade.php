@extends('layouts.admin')

@section('content')

<h3>All Role</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    @if($roles)
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->created_at->diffForHumans()}}</td>
                    <td>{{$role->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif

@endsection
