@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ url('css/bootstrapValidator.min.css') }}">

<h3>Edit Category</h3>
<form action="{{route('updatecateg')}}" method="get" id="#editCategoryForm">
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
<script src="{{ asset('jquery/jquery/jquery.js') }}"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{url('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script src="{{ url('js/bootstrapValidator.min.js') }}"></script>
<script>
    $(function(){
        $('#editCategoryForm').bootstrapValidator({
            message: "This value is not valid",
            fields:{
                type:{
                        message:"Type is not valid",
                        validators:{
                            notEmpty:{
                                message:"Type is required and can't be empty"
                            },
                        stringLength:{
                            min:2,
                            max:25,
                            message:"Type must be morethan two and lessthan 30 characters long"
                        },
                        regexp:{
                            regexp:/^[a-zA-Z" "-\.]+$/,
                            message:"Type can only consist of alphabets"
                        }
                    }
                },
            }
        });
    });
    </script>
@endsection

