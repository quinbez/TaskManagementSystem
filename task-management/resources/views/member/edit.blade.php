@extends('layouts.admin')

@section('content')

<h3>Edit Member</h3>
<form action="{{ url('/member/update') }}" method="patch">

{{-- {!!Form::model(['method'=>'patch', 'action'=>['App\Http\Controllers\AdminMembersController@update']])!!} --}}
{{ csrf_field() }}
<div class="row">
    <input type="hidden" name="memberId" value="{{$members->id}}">
    <div class="form-group col-sm-6">
        {!!Form::label('name','Name: ')!!}
        {!!Form::text('name',$members->name,['class'=>'form-control',"required","minlength"=>"5", "maxlength"=>"20",'title'=>"only alphabets are allowed" ,'pattern'=>"^[a-zA-Z ]*$"])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('email','Email: ')!!}
        {!!Form::email('email',$members->email,['class'=>'form-control','required'])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('phone_number','Phone: ')!!}
        {!!Form::text('phone_number',$members->phone_number,['class'=>'form-control',"required", "minlength"=>"10", "maxlength"=>"13"])!!}
    </div>
    <div class="form-group col-sm-6">
        {!!Form::label('role','Role: ')!!}
        {!!Form::select('role',[$members->role=>$members->role,'admin'=>'Admin','member'=>'Member'],null,['class'=>'form-control','required'])!!}
    </div>
</div>
<div class="row" style="justify-content: right">
    <div class="form-group col-sm-3 p-4">
        {!!Form::submit('Edit', ['class'=>'btn btn-primary'])!!}
        {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}
    </div>
</div>
    </form>

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
