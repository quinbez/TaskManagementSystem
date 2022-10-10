@extends('layouts.admin')

@section('content')

<h3>Create Category</h3>
<form action="{{route('storecategory') }}" method="post">
{{ csrf_field() }}
<div class="row d-grid gap-2">
    <div class="form-group col-6">
        {!!Form::label('type','Type: ')!!}
        {!!Form::text('type',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group d-grid col-3" style="justify-content: left">
        {!!Form::submit('Submit', ['class' => 'btn btn-primary'])!!}
    </div>
</div>

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

