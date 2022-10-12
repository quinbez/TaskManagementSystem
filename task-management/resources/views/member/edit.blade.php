@extends('layouts.admin')

@section('content')

<h3>Edit Member</h3>
{{-- <form action="{{ route('store') }}" method="post"> --}}
{!!Form::model($member,['method'=>'patch', 'action'=>['App\Http\Controllers\AdminMembersController@update', $member->id]])!!}
{{ csrf_field() }}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('name','Name: ')!!}
        {!!Form::text('name',null,['class'=>'form-control', 'pattern'=> '[a-zA-Z][a-zA-Z ]{2,}', 'required'])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('email','Email: ')!!}
        {!!Form::email('email',null,['class'=>'form-control','required'])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('phone_number','Phone: ')!!}
        {!!Form::text('phone_number',null,['class'=>'form-control','required'])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('role','Role: ')!!}
        {!!Form::select('role',[''=>'Choose Options','admin'=>'Admin','member'=>'Member'],null,['class'=>'form-control','required'])!!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('password','Password: ')!!}
        {!!Form::password('password', ['class'=>'form-control','required'])!!}
    </div>
</div>
<div class="row" style="justify-content: right">
    <div class="form-group col-sm-3 p-4">
        {!!Form::submit('+ Add', ['class'=>'btn btn-primary'])!!}
        {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}
    </div>
</div>
</form>
{{-- {!!Form::close()!!} --}}

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
