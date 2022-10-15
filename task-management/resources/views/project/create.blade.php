@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{url('bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ url('css/bootstrapValidator.min.css') }}">

<h3>Add Project</h3>
<form action="{{ route('storeproj') }}" method="post" id="createProjectTable">
        {{ csrf_field() }}
    {{-- {!!Form::open(['method'=>'post'])!!} --}}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('title','Title: ')!!}
        {!!Form::text('title',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6">
        <label class="category_id">Category </label>
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
        {!!Form::select('status',['pending'=>'Pending'],null, ['class'=>'form-control'])!!}
        </div>
     <div class="form-group col-sm-6">
        <label class="team_member">Team members</label>
        <select class="form-control select2" name="team_member[]" id="team_member" multiple="multiple" style="width:100%;" data-placeholder="Select Team Members" required="true">
        {{-- <select name="team_member" id="team_member" class="form-control select2"> --}}
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
    {!!Form::text('start_date', null, ['id'=> 'fromDatePicker','autocomplete'=>'off','class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('deadline','Deadline')!!}
        {!!Form::text('deadline', null, ['id'=> 'toDatePicker','autocomplete'=>'off', 'class'=>'form-control'])!!}
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
<script>
    $(function(){
        $('#createProjectTable').bootstrapValidator({
            message: "This value is not valid",
            fields:{
                title:{
                        message:"Title is not valid",
                        validators:{
                            notEmpty:{
                                message:"Title is required and can't be empty"
                            },
                        stringLength:{
                            min:2,
                            max:25,
                            message:"Title must be morethan two and lessthan 30 characters long"
                        },
                        regexp:{
                            regexp:/^[a-zA-Z" "\.]+$/,
                            message:"Title can only consist of alphabets"
                        }
                    }
                },
            
            }
        });
    });
</script>
@endsection
