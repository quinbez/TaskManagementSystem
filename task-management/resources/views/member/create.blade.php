@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ url('css/bootstrapValidator.min.css') }}">

<h3>Create Member</h3>
<form action="{{ route('store') }}" method="post" id="createMemberForm">
{{ csrf_field() }}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('name','Full Name: ')!!}
        {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('email','Email: ')!!}
        {!!Form::email('email',null,['class'=>'form-control'])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('phone_number','Phone: ')!!}
        {!!Form::text('phone_number',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('role','Role: ')!!}
        {!!Form::select('role',[''=>'Choose Options','admin'=>'Admin','member'=>'Member'],null,['class'=>'form-control'])!!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        <div class="form-group col-sm-6">
            {!!Form::label('password','Password: ')!!}
            {!!Form::password('password', ['class'=>'form-control'])!!}
        </div>
    </div>
</div>
<div class="row" style="justify-content: left">
    <div class="form-group col-sm-3 p-4">
        {!!Form::submit('+ Add', ['class'=>'btn addcolor'])!!}
        {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}
    </div>
</div>
</form>

@if(count($errors) > 0)
    <div class="alert alert-danger" style="width:450px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<script src="{{ asset('jquery/jquery/jquery.js') }}"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{url('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script src="{{ url('js/bootstrapValidator.min.js') }}"></script>
<script>
    $(function(){
        $('#createMemberForm').bootstrapValidator({
            message: "This value is not valid",
            fields:{
                name:{
                        message:"Full name is not valid",
                        validators:{
                            notEmpty:{
                                message:"Full name is required and can't be empty"
                            },
                        stringLength:{
                            min:2,
                            max:25,
                            message:"Full name must be morethan two and lessthan 30 characters long"
                        },
                        regexp:{
                            regexp:/^[a-zA-Z" "-\.]+$/,
                            message:"Full name can only consist of alphabets"
                        }
                    }
                },
            }
        });
    });
    </script>
@endsection

