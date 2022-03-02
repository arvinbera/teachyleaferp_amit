@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Create Subject Assignings</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'subjectAssignings.store','id' => 'myForm']) !!}

        <div class="card-body">

            <!-- <div class="row"> -->


            <div class="add_item">
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        {!! Form::label('class_id', 'Class:') !!}
                        <select class="form-control" name="class_id" required>
                            <option value="">Select Class...</option>
                            @foreach($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-4">
                        {!! Form::label('subject_id', 'Subject:') !!}
                        <select class="form-control" name="subject_id[]" required>
                            <option value="">Select Subject...</option>
                            @foreach($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        {!! Form::label('full_marks', 'Full Marks:') !!}
                        <input type="text" name="full_marks[]" class="form-control" required />
                    </div>
                    <div class="form-group col-sm-2">
                        {!! Form::label('pass_marks', 'Pass Marks:') !!}
                        <input type="text" name="pass_marks[]" class="form-control" required />
                    </div>
                    <div class="form-group col-sm-2">
                        {!! Form::label('subject_type', 'Subject Type:') !!}
                        <select class="form-control" name="subject_type[]" required>
                            <option value="" selected disabled>Select Subject Type...</option>
                            <option value="academic_assesment">Academic Assesment</option>
                            <option value="personal_assesment">Personal Assesment</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-2" style="margin-top: 32px;">
                        <span class="btn btn-success addAnotherRow"><i class="fa fa-plus-circle"></i></span>
                    </div>
                </div>
            </div>


            <!-- </div> -->

        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('subjectAssignings.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>

<div style="visibility: hidden;">
    <div class="add_another_row" id="add_another_row">
        <div class="delete_this_row" id="delete_this_row">
            <div class="form-row">
                <div class="form-group col-sm-4">
                    {!! Form::label('subject_id', 'Subject:') !!}
                    <select class="form-control" name="subject_id[]" required>
                        <option value="">Select Subject...</option>
                        @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::label('full_marks', 'Full Marks:') !!}
                    <input type="text" name="full_marks[]" class="form-control" required />
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::label('pass_marks', 'Pass Marks:') !!}
                    <input type="text" name="pass_marks[]" class="form-control" required />
                </div>
                <div class="form-group col-sm-2">
                    {!! Form::label('subject_type', 'Subject Type:') !!}
                    <select class="form-control" name="subject_type[]" required>
                        <option value="" selected disabled>Select Subject Type...</option>
                        <option value="academic_assesment">Academic Assesment</option>
                        <option value="personal_assesment">Personal Assesment</option>
                    </select>
                </div>
                <div class="form-group col-sm-2" style="margin-top: 32px;">
                    <span class="btn btn-success addAnotherRow"><i class="fa fa-plus-circle"></i></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="btn btn-danger deleteThisRow"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page_scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        $(document).on('click', '.addAnotherRow', function() {
            var add_another_row = $('#add_another_row').html()
            $(this).closest(".add_item").append(add_another_row)
            counter++
        })
        $(document).on('click', '.deleteThisRow', function(event) {
            $(this).closest(".delete_this_row").remove()
            counter--
        })
    })
</script>

<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                'class_id': {
                    required: true,
                },
                'subject_id[]': {
                    required: true,
                },
                'full_marks[]': {
                    required: true,
                },
                'pass_marks[]': {
                    required: true,
                },
                'subject_type[]': {
                    required: true,
                },
            },
            messages: {

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback')
                element.closest('.form-group').append(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        })
    })
</script>
@endpush