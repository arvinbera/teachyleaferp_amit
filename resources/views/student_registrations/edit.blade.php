@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Edit Student Info</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($studentRegistrations, ['route' => ['studentRegistrations.update', $studentRegistrations->student_id], 'method' => 'patch','id' => 'myForm','enctype' => 'multipart/form-data']) !!}

        <div class="card-body">

            <input type="hidden" name="student_assigning_id" value="{{$studentRegistrations->id}}" />
            <!-- <div class="row"> -->
            <div class="row">
                <div class="form-group col-sm-4">
                    <!-- Name Field -->
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!} <font style="color: red;">*</font>
                        <input type="text" class="form-control" name="name" value="{{$studentRegistrations['student']['name']}}" />
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        <input type="text" class="form-control" name="email" value="{{$studentRegistrations['student']['email']}}" />
                    </div>

                    <!-- Phone Field -->
                    <div class="form-group">
                        {!! Form::label('phone', 'Phone:') !!}
                        <input type="text" class="form-control" name="phone" value="{{$studentRegistrations['student']['phone']}}" />
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="form-group col-sm-7">
                    <!-- Image Field -->
                    <div class="form-group">
                        {!! Form::label('image', 'Profile Photo:') !!}
                        <br>
                        <img src="/images/profile_photos/{{$studentRegistrations['student']['profile_photo']}}" class="p-2 border border-secondary" id="show_image" style="height: 200px; width: 160px;" />
                        <input type="file" name="image" id="image" accept="image/x-png, image/png, image/jpg, image/jpeg" style="display: none;" />
                        <input type="button" name="browse_file" id="browse_file" value="Browse File" class="m-3 btn btn-link border border-primary" />
                    </div>

                    @push('page_scripts')
                    <script type="text/javascript">
                        $('#browse_file').on('click', function() {
                            $('#image').click()
                        })
                        $('#image').on('change', function(e) {
                            showFile(this, '#show_image')
                        })

                        function showFile(fileInput, img, showName) {
                            if (fileInput.files[0]) {
                                var reader = new FileReader()
                                reader.onload = function(e) {
                                    $(img).attr('src', e.target.result)
                                }
                                reader.readAsDataURL(fileInput.files[0])
                            }
                            $(showName).text(fileInput.files[0].name)
                        }
                    </script>
                    @endpush

                </div>
            </div>

            <div class="row">
                <!-- Dob Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('dob', 'Date of Birth:') !!} <font style="color: red;">*</font>
                    <input type="text" class="form-control" name="dob" value="{{$studentRegistrations['student']['dob']}}" autocomplete="off" />
                </div>

                @push('page_scripts')
                <script type="text/javascript">
                    $('#dob').datetimepicker({
                        format: 'DD-MM-YYYY',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
                @endpush

                <!-- Religion Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('gender', 'Gender:') !!} <font style="color: red;">*</font>
                    <input type="text" class="form-control" name="gender" value="{{$studentRegistrations['student']['gender']}}" />
                </div>

                <!-- Religion Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('religion', 'Religion:') !!} <font style="color: red;">*</font>
                    <input type="text" class="form-control" name="religion" value="{{$studentRegistrations['student']['religion']}}" />
                </div>
            </div>

            <hr>

            <div class="row">
                <!-- Father Name Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('father_name', "Father's Name:") !!} <font style="color: red;">*</font>
                    <input type="text" class="form-control" name="father_name" value="{{$studentRegistrations['student']['father_name']}}" />
                </div>

                <!-- Father Phone Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('father_phone', "Father's Phone:") !!} <font style="color: red;">*</font>
                    <input type="text" class="form-control" name="father_phone" value="{{$studentRegistrations['student']['father_phone']}}" />
                </div>
            </div>

            <div class="row">
                <!-- Mother Name Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('mother_name', "Mother's Name:") !!} <font style="color: red;">*</font>
                    <input type="text" class="form-control" name="mother_name" value="{{$studentRegistrations['student']['mother_name']}}" />
                </div>
            </div>

            <div class="row">
                <!-- Address Current Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('address_current', 'Current Address:') !!} <font style="color: red;">*</font>
                    <textarea class="form-control" name="address_current" rows="5">{{$studentRegistrations['student']['address_current']}}</textarea>
                </div>

                <!-- Address Permanent Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('address_permanent', 'Permanent Address:') !!} <font style="color: red;">*</font>
                    <textarea class="form-control" name="address_permanent" rows="5">{{$studentRegistrations['student']['address_permanent']}}</textarea>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="form-group col-sm-3">
                    {!! Form::label('sessions', 'Session:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="session_id" required>
                        <option value="">Select Session...</option>
                        @foreach($sessions as $session)
                        <option value="{{$session->id}}" {{$session->id == $studentRegistrations->session_id ? 'selected' : ''}}>{{$session->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::label('shifts', 'Shift:') !!}
                    <select class="form-control" name="shift_id">
                        <option value="">Select Shift...</option>
                        @foreach($shifts as $shift)
                        <option value="{{$shift->id}}" {{$shift->id == $studentRegistrations->shift_id ? 'selected' : ''}}>{{$shift->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::label('classes', 'Class:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="class_id" required>
                        <option value="">Select Class...</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}" {{$class->id == $studentRegistrations->class_id ? 'selected' : ''}}>{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::label('sections', 'Section:') !!}
                    <select class="form-control" name="section_id">
                        <option value="">Select Section...</option>
                        @foreach($sections as $section)
                        <option value="{{$section->id}}" {{$section->id == $studentRegistrations->section_id ? 'selected' : ''}}>{{$section->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr>

            <div class="form-group col-sm-4">
                {!! Form::label('feewaive', "Fee Waive:") !!} <font style="color: red;">*</font>
                <input type="text" class="form-control" name="feewaive" value="{{$studentRegistrations['feewaive']['discount']}}" />
            </div>

            @push('page_scripts')
            <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
            <script type="text/javascript" src="/js/jquery.validate.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#myForm').validate({
                        rules: {
                            'name': {
                                required: true,
                            },
                            'dob': {
                                required: true,
                            },
                            'gender': {
                                required: true,
                            },
                            'religion': {
                                required: true,
                            },
                            'father_name': {
                                required: true,
                            },
                            'father_phone': {
                                required: true,
                            },
                            'mother_name': {
                                required: true,
                            },
                            'address_current': {
                                required: true,
                            },
                            'address_permanent': {
                                required: true,
                            },
                            'session_id': {
                                required: true,
                            },
                            'class_id': {
                                required: true,
                            },
                            'feewaive': {
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
            <!-- </div> -->

        </div>

        <div class="card-footer">
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection