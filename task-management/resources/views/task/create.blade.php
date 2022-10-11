@extends('layouts.admin')

@section('content')

<h3>Create Task</h3>
<form action="{{ route('storetask') }}" method="post">
{{ csrf_field() }}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('name','Task Name: ')!!}
        {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('project_id','Project: ')!!}
        {!!Form::select('project_id', [''=>'Choose Options', $project ],null,['class'=>'form-control'])!!}
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
    <div class="form-group col-sm-6" >
        {!!Form::label('user_id','Assign to: ')!!}
        {!!Form::select('user_id', [''=>'Choose Options', $member ],null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('description','Description: ')!!}
        {!!Form::textarea('description',null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="d-grid gap-2">
    <div class="form-group d-grid col-3" style="padding:15px; justify-content:left;" >
        {!!Form::submit('Assign', ['class' => 'btn btn-primary'])!!}
        {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}

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
