@extends('layouts.admin')

@section('content')

<h3>Create Category</h3>
<form action="{{route('updatecateg')}}" method="get">
{{ csrf_field() }}
<div class="row d-grid gap-2">
    <input type="hidden" name="categoryId" value="{{$categories->id}}">
    <div class="form-group col-6">
        {!!Form::label('type','Type: ')!!}
        {!!Form::text('type',$categories->type,['class'=>'form-control'])!!}
    </div>
    <div class="row" style="justify-content: left">
        <div class="form-group col-sm-3 p-4">
            {!!Form::submit('Edit', ['class'=>'btn addcolor'])!!}
            {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}
        </div>
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

