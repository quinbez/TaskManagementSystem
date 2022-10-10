@extends('layouts.admin')

@section('content')

<h3>Create Role</h3>
<form action="{{route('storerole')}}" method="post">
{{ csrf_field() }}
<div class="row d-grid gap-2">
    <div class="form-group col-6">
        {!!Form::label('name','Name: ')!!}
        {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>
    <div class="row" style="justify-content:right">
        <div class="form-group col-3 p-4">
            {!!Form::submit('Submit', ['class' => 'btn btn-primary'])!!}

        {{-- <div class="form-group col-3 p-4"> --}}
            {!!Form::reset('Clear', ['class'=>'btn btn-secondary'])!!}
        </div>
    </div>

@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

