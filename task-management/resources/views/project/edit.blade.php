@extends('layouts.admin')

@section('content')

<h3>Edit Project</h3>
<form action="{{ url('/project/update') }}" method="get">
        {{ csrf_field() }}
    {{-- {!!Form::open(['method'=>'post'])!!} --}}
<div class="row">
    <input type="hidden" name="projectId" value="{{$projects->id}}" >
    <div class="form-group col-sm-6">
        {!!Form::label('title','Title: ')!!}
        {!!Form::text('title',$projects->title,['class'=>'form-control'])!!}
    </div>

    <div class="form-group col-sm-6">
        <label class="category_id">Category</label>
        <select name="category_id" id="category" class="form-control">
            <option value="">Choose Option</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->type}}</option>
            @endforeach
        </select>
    </div>
 </div>
 <div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('status','Status')!!}
        {!!Form::select('status',[$projects->status=>$projects->status,'pending'=>'Pending','on_progress'=>'On Progress','completed'=>'Completed' ],null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group col-sm-6">
            <label class="team_member">Team members</label>
            <select name="team_member" id="team_member" class="form-control">
                <option value="">Choose Option</option>
                @foreach ($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
            </select>
        </div>
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
        {!!Form::submit('Edit', ['class' => 'btn addcolor'])!!}
        {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}
    </div>
</div>

</form>
@if(count($errors)>0)
    <div class="alert alert-danger" style="width: 500px;">
        <ul>

                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
     </div>
    </div>
@endif

@endsection
