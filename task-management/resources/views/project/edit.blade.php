@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{url('bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ url('css/bootstrapValidator.min.css') }}">

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
            <option value="{{$projects->category->type}}">{{$projects->category->type}}</option>
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
            <select class="form-control select2" name="team_member[]" id="team_member" multiple="multiple" style="width:100%;" data-placeholder="select team members" required="true">
                <option value="{{$projects->team_member}}">{{$projects->team_member}}</option>
                @foreach ($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
            </select>
        </div>
 </div>
<div class="row">
    <div class="form-group col-sm-6">
    {!!Form::label('start_date','Start Date')!!}
    {!!Form::text('start_date', $projects->start_date, ['id'=> 'fromDatePicker','class'=>'form-control','autocomplete'=>'off'])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('deadline','Deadline')!!}
        {!!Form::text('deadline', $projects->deadline, ['id'=> 'toDatePicker','class'=>'form-control','autocomplete'=>'off'])!!}
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
<script src="{{ asset('jquery/jquery/jquery.js') }}"></script>
<script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{url('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ url('js/bootstrapValidator.min.js') }}"></script>

<script>
    $('.select2').select2({
                width: 'element'
            });
</script>
@endsection
