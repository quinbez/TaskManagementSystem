@extends('layouts.admin')

@section('content')

<h3>Create Project</h3>
<form action="{{ route('storeproj') }}" method="post">
        {{ csrf_field() }}
    {{-- {!!Form::open(['method'=>'post'])!!} --}}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('title','Title: ')!!}
        {!!Form::text('title',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('category_id','Category: ')!!}
        {!!Form::select('category_id', [''=>'Choose Options', $category ],null,['class'=>'form-control'])!!}
    </div>
 </div>
 <div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('status','Status')!!}
        {!!Form::select('status',[''=>'Choose Options','pending'=>'Pending','on_progress'=>'On Progress','completed'=>'Completed' ],'null', ['class'=>'form-control'])!!}
        </div>
    <div class="form-group col-sm-6">
        {!!Form::label('team_member','Team member: ')!!}
        {!!Form::number('team_member',null,['class'=>'form-control'])!!}
    </div>
 </div>
<div class="row">
    <div class="form-group col-sm-6">
    {!!Form::label('start_date','Start Date')!!}
    {!!Form::date('start_date', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('deadline','Deadline')!!}
        {!!Form::date('deadline', null, ['class'=>'form-control'])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-5">
        {!!Form::label('description','Description: ')!!}
        {!!Form::textarea('description',null,['class'=>'form-control', "rows"=>"3"])!!}
    </div>
</div>
<div class="row" style="justify-content:right">
    <div class="form-group col-3 p-4">
        {!!Form::submit('+ Add', ['class' => 'btn addcolor'])!!}
        {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}
    </div>
</div>

</form>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
    </div>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection