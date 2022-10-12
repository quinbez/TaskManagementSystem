@extends('layouts.admin')

@section('content')

<h3>Edit Project</h3>
<form action="{{ url('/project/update') }}" method="patch">
        {{ csrf_field() }}
    {{-- {!!Form::open(['method'=>'post'])!!} --}}
<div class="row">
    <input type="hidden" name="projectId" value="{{$projects->id}}" >
    <div class="form-group col-sm-6">
        {!!Form::label('title','Title: ')!!}
        {!!Form::text('title',$projects->title,['class'=>'form-control'])!!}
    </div>

    {{-- <div class="form-group col-sm-6">
        <label class="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control" >
            <option value="">{{$projects->category_id}}</option>
            @foreach ($category as $categ)
                <option value="{{$categ->id}}">{{$categ->name}}</option>
            @endforeach
        </select>
    </div>
 </div> --}}
 <div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('status_id','Status')!!}
        {!!Form::select('status_id',[$projects->status=>$projects->status,'pending'=>'Pending','on_progress'=>'On Progress','completed'=>'Completed' ],null, ['class'=>'form-control'])!!}
        </div>
     {{-- <div class="form-group col-sm-6">
        <label class="team_member">Team members</label>
        <select name="team_member" id="team_member" class="form-control">
            <option value="">{{$projects->team_member}}</option>
            @foreach ($teams as $team)
                <option value="{{$team->id}}">{{$team->name}}</option>
            @endforeach
        </select>
    </div> --}}
 </div>
<div class="row">
    <div class="form-group col-sm-6">
    {!!Form::label('start_date','Start Date')!!}
    {!!Form::date('start_date', $projects->start_date, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('deadline','Deadline')!!}
        {!!Form::date('deadline', $projects->deadline, ['class'=>'form-control'])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-5">
        {!!Form::label('description','Description: ')!!}
        {!!Form::textarea('description',$projects->description,['class'=>'form-control', "rows"=>"3"])!!}
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
