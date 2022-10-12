@extends('layouts.admin')

@section('content')

<h3>Assign Task </h3>
<form action="{{ route('storetask') }}" method="post">
{{ csrf_field() }}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('name','Task Name: ')!!}
        {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>
    {{-- <div class="form-group col-sm-6" >
        {!!Form::label('project_id','Project: ')!!}
        {!!Form::select('project_id', [[''=>'Choose Options'], [$project=>'yes']],null,['class'=>'form-control'])!!}
    </div> --}}
    <div class="form-group col-sm-6">
        <label class="project_id">Project</label>
        <select name="project_id" id="project" class="form-control">
            <option value="">Choose Option</option>
            @foreach ($project as $pro)
                <option value="{{$pro->id}}">{{$pro->title}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6" >
        {!!Form::label('start_date','Start Date: ')!!}
        {!!Form::date('start_date',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('end_date','End Date: ')!!}
        {!!Form::date('end_date',null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="d-grid gap-2">
    <div class="form-group col-sm-6">
        <label class="user_id">Assigned to</label>
        <select name="user_id" id="user" class="form-control">
            <option value="">Choose Option</option>
            @foreach ($members as $member)
                <option value="{{$member->id}}">{{$member->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('description','Description: ')!!}
        {!!Form::textarea('description',null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="d-grid gap-2">
    <div class="row" style="justify-content: right">
        <div class="form-group col-sm-3 p-4">
            {!!Form::submit('Assign', ['class'=>'btn btn-primary'])!!}
            {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}
        </div>
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
