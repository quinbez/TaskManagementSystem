@extends('layouts.admin')

@section('content')

<h3>All Category</h3>
<table class='table'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    @if($categories)
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->type}}</td>
                    <td>{{$category->created_at->diffForHumans()}}</td>
                    <td>{{$category->updated_at->diffForHumans()}}</td>

                </tr>
            @endforeach
        @endif

@endsection
