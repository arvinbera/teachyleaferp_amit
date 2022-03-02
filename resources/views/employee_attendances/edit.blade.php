@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Edit Employee Attendances</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'employeeAttendances.store','id' => 'myForm']) !!}

        <div class="card-body">

            <!-- <div class="row"> -->
            <!-- Date Field -->
            <div class="form-group col-sm-5">
                {!! Form::label('date', 'Date:') !!}
                <input class="form-control" type="text" name="date" value="{{date('d-m-Y', strtotime($employeeAttendances[0]['date']))}}" readonly />
            </div>

            <div class="table-responsive">
                <table class="table" id="employeeAttendances-table">
                    <thead>
                        <tr>
                            <th rowspan="2">Sl.</th>
                            <th rowspan="2">Employee Name</th>
                            <th rowspan="2">Id No</th>
                            <th colspan="3">Attendance Status</th>
                        </tr>
                        <tr>
                            <th style="color: green; cursor: pointer;" class="present_all">Present</th>
                            <th style="color: blue; cursor: pointer;" class="on_leave_all">On Leave</th>
                            <th style="color: red; cursor: pointer;" class="absent_all">Absent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employeeAttendances as $key => $employeeAttendance)
                        <tr id="div{{$employeeAttendance->id}}">
                            <input type="hidden" name="employee_id[]" value="{{$employeeAttendance->employee_id}}" class="employee_id" />
                            <td>{{ $key+1 }}</td>
                            <td>{{ $employeeAttendance['employee']['name'] }}</td>
                            <td>{{ $employeeAttendance['employee']['id_no'] }}</td>
                            <div class="switch-toggle switch-3 switch-candy">
                                <td colspan="1">
                                    <input class="present" id="present{{$key}}" name="attendance_status{{$key}}" value="Present" type="radio" {{$employeeAttendance->attendance_status == 'Present' ? 'checked' : ''}} />
                                    <label for="present{{$key}}" style="color: green;">P</label>
                                </td>
                                <td colspan="1">
                                    <input class="on_leave" id="on_leave{{$key}}" name="attendance_status{{$key}}" value="On_Leave" type="radio" {{$employeeAttendance->attendance_status == 'On_Leave' ? 'checked' : ''}} />
                                    <label for="on_leave{{$key}}" style="color: blue;">L</label>
                                </td>
                                <td colspan="1">
                                    <input class="absent" id="absent{{$key}}" name="attendance_status{{$key}}" value="Absent" type="radio" {{$employeeAttendance->attendance_status == 'Absent' ? 'checked' : ''}} />
                                    <label for="absent{{$key}}" style="color: red;">A</label>
                                </td>
                                <a></a>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- </div> -->

        </div>

        <div class="card-footer">
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('employeeAttendances.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection

@push('page_scripts')
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                'date': {
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

    $(document).on('click', '.present', function() {
        $(this).parents('tr').find('.datetime').css('pointer-events', 'none').css('background-color', '#dee2e6').css('color', '#495057')
    })
    $(document).on('click', '.on_leave', function() {
        $(this).parents('tr').find('.datetime').css('pointer-events', 'none').css('background-color', 'white').css('color', '#495057')
    })
    $(document).on('click', '.absent', function() {
        $(this).parents('tr').find('.datetime').css('pointer-events', 'none').css('background-color', '#dee2e6').css('color', '#dee2e6')
    })

    $(document).on('click', '.present_all', function() {
        $("input[value=Present]").prop('checked', true)
        $('.datetime').css('pointer-events', 'none').css('background-color', '#dee2e6').css('color', '#495057')
    })
    $(document).on('click', '.on_leave_all', function() {
        $("input[value=On_Leave]").prop('checked', true)
        $('.datetime').css('pointer-events', 'none').css('background-color', 'white').css('color', '#495057')
    })
    $(document).on('click', '.absent_all', function() {
        $("input[value=Absent]").prop('checked', true)
        $('.datetime').css('pointer-events', 'none').css('background-color', '#dee2e6').css('color', '#dee2e6')
    })
</script>
@endpush