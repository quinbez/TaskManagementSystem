@extends('layouts.admin')

@section('content')

<h3>Assign Task </h3>
<form action="{{ route('storetask') }}" id="createTaskForm" method="post">
{{ csrf_field() }}
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('name','Task Name: ')!!}
        {!!Form::text('name',null,['class'=>'form-control'])!!}
    </div>

    <div class="form-group col-sm-6">
        <label class="project_id">Project </label>
        <select name="project_id" id="project" class="form-control">
            <option value="">Choose Option</option>
            @foreach ($project as $pro)
                <option value="{{$pro->id}}">{{$pro->title}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6" >
        {!!Form::label('start_date','Start Date: ')!!}
        {!!Form::text('start_date',null,['id'=> 'fromDatePicker','class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6" >
        {!!Form::label('end_date','End Date: ')!!}
        {!!Form::text('end_date',null,['id'=> 'toDatePicker','class'=>'form-control'])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!!Form::label('status','Status')!!}
        {!!Form::select('status',['Pending'=>'pending'],null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group col-sm-6">
        <label class="user_id">Assigned to </label>
        <select name="user_id" id="user" class="form-control">
            <option value="">Choose Option</option>
            @foreach ($members as $member)
                <option value="{{$member->id}}">{{$member->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="d-grid gap-2">
    <div class="form-group col-sm-6" >
        {!!Form::label('description','Description: ')!!}
        {!!Form::textarea('description',null,['class'=>'form-control', 'rows'=>'3'])!!}
    </div>
</div>



<div class="d-grid gap-2">
    <div class="row" style="justify-content: right">
        <div class="form-group col-sm-3 p-4">
            {!!Form::submit('Assign', ['class'=>'btn addcolor'])!!}
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
</div>
@endif
 {{-- <script>
    $(function(){
        $('#createTaskForm').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                name: {
                    message: 'Name is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Name is required and can\'t be empty'
                        },
                        stringLength: {
                            min: 2,
                            max: 25,
                            message: 'Name must be more than 2 and less than 25 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z\. ]+$/,
                            message: 'Name can only consist of alphabets'
                        }
                    }
                }
                phone: {
                    message: 'Phone number is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Phone number is required and can\'t be empty'
                        },
                        stringLength: {
                            min: 10,
                            max: 13,
                            message: 'Phone number be more than 10 and less than 13 characters long'
                        },
                        regexp: {
                            regexp: /^(+][2][5][1[0-9]{8}$)|[+][2][5][1][9][0-9]{8}$/,
                            message: 'Phone needs to be in +251.... format'
                        }
                    }
                },
                email: {
                    message: 'Email is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Email is required and can\'t be empty'
                        },
                        emailAddress: {
                            message: 'Please insert correct email format'
                        }
                    }
                },
                // school: {
                //     message: 'Institution is not valid',
                //     validators: {
                //         notEmpty: {
                //             message: 'Institution is required and can\'t be empty'
                //         }
                //     }
                // },
                department: {
                    message: 'Department is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Department is required and can\'t be empty'
                        }
                    }
                },
                chosenBank: {
                    message: 'Bank is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Bank is required and can\'t be empty'
                        }
                    }
                },
                exam: {
                    message: 'Exam is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Exam is required and can\'t be empty'
                        }
                    }
                }



            }
        });
    });

 </script> --}}
@endsection
