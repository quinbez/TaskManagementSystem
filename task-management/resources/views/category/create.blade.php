@extends('layouts.admin')

@section('content')
{{-- <link rel="stylesheet" href="{{ url('css/bootstrapValidator.min.css') }}"> --}}

<h3>Create Category</h3>
<form action="{{route('storecategory') }}" method="post" id="createCategoryForm">
{{ csrf_field() }}
<div class="row d-grid gap-2">
    <div class="form-group col-6">
        {!!Form::label('type','Type: ')!!}
        {!!Form::text('type',null,['class'=>'form-control',"required","minlength"=>"3", "maxlength"=>"20",'title'=>"only alphabets are allowed" ,'pattern'=>"^[a-zA-Z ]*$"])!!}
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
<script src="{{ asset('jquery/jquery/jquery.js') }}"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{url('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

{{-- <script src="{{ url('js/bootstrapValidator.min.js') }}"></script> --}}
{{-- <script> --}}
    $(function(){
        $('#createCategoryForm').bootstrapValidator({
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

