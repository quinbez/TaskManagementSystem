@extends('layouts.admin')

@section('content')

<h3>Edit Member</h3>
{{-- <form action="{{ route('update'),[ $member->id ]}}" method="patch"> --}}
{!!Form::model($member,['method'=>'patch', 'action'=>['App\Http\Controllers\AdminMembersController@update',$member->id]])!!}
@csrf
<div class="form-group">
    {!!Form::label('name','First Name: ')!!}
    {!!Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    {!!Form::label('name','Last Name: ')!!}
    {!!Form::text('name',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('email','Email: ')!!}
    {!!Form::email('email',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('phone_number','Phone: ')!!}
    {!!Form::text('phone_number',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('role_id','Role: ')!!}
    {!!Form::select('role_id',[''=>'Choose Options',$role],null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('password','Password: ')!!}
    {!!Form::password('password', ['class'=>'form-control'])!!}
</div>
<br>
<div class="form-group">
    {!!Form::submit('Create Member', ['class'=>'btn btn-primary'])!!}
</div>
</form>
{{-- {!!Form::close()!!} --}}

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
