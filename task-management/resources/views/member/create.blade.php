@extends('layouts.admin')

@section('content')

<h3>Create Member</h3>
<form action="{{ route('store') }}" method="post">
{{ csrf_field() }}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('name','Full Name: ')!!}
        {!!Form::text('name',null,['class'=>'form-control', 'pattern'=>'[a-zA-Z][a-zA-Z]{2,}','required'])!!}
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
    {{-- {{-- <div class="form-group col-sm-6"> --}}
        {{-- {!!Form::label('password','Password: ')!!}
        {!!Form::password('password', ['class'=>'form-control'])!!}
    </div> --}}
    <label for="pass1">Password</label>
    <input type="password" name= "password" id="pass1" class="form-control" placeholder="password" onkeyup="return validate()">
    <label for="pass2">Confirm</label>
    <input type="password" name ="password" id="pass2" class="form-control" placeholder="confirm" oninput =" return confirm()">
    <div class="errors">
        <ul style="font-size: 15px" >
            <li id="upper">atleast one uppercase</li>
            <li id="lower">atleast one lowercase</li>
            <li id="special_char">atleast one special symbol</li>
            <li id="number">atleat one number</li>
            <li id="length">atleast 8 characters</li>
        </ul>
    </div>
</div>
</div>
<script>
    function validate(){
        var pass = document.getElementById('pass1');
        var upper = document.getElementById('upper');
        var lower = document.getElementById('lower');
        var number = document.getElementById('number');
        var length = document.getElementById('length');
        var special_char= document.getElementById('special_char');

        if(pass.value.match(/[0-9]/)){
            number.style.color ="green"
        }else {
            number.style.color ="red"
        }
        if(pass.value.match(/[A-Z]/)){
            upper.style.color ="green"
        }else {
            upper.style.color ="red"
        }if(pass.value.match(/[a-z]/)){
            lower.style.color ="green"
        }else {
            lower.style.color ="red"
        }if(pass.value.match(/[!\@\#\$\%\^\&\*\(\)\_\-\+\=\?\>\<\.\,]/)){
            special_char.style.color ="green"
        }else {
            special_char.style.color ="red"
        }if(pass.value.length<8){
            length.style.color ="red"
        }else{
            length.style.color = "green"
        }
     }
     function confirm(){
        var pass1 =document.getElementById('pass1');
        var pass2 =document.getElementById('pass2');
        if(pass1.value == pass2.value){
            document.getElementById('number').style.display = 'none';
            document.getElementById('length').style.display = 'none';
            document.getElementById('special_char').style.display = 'none';
            document.getElementById('lower').style.display = 'none';
            document.getElementById('upper').style.display = 'none';

        }else{
            document.getElementById('number').style.display = 'block';
            document.getElementById('length').style.display = 'block';
            document.getElementById('special_char').style.display = 'block';
            document.getElementById('lower').style.display = 'block';
            document.getElementById('upper').style.display = 'block';
        }
     }
</script>


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
@endsection
