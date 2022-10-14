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
    <div class="row" style="justify-content: left">
        <div class="form-group col-sm-3 p-4">
            {!!Form::submit('+ Add', ['class'=>'btn addcolor'])!!}
            {!!Form::reset('Clear', ['class'=>'btn btn-secondary clearcolor'])!!}
        </div>
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
@endif
@endsection

