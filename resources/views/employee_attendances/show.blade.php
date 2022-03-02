@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Employee Attendances Details</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-default float-right" href="{{ route('employeeAttendances.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">
    <div class="card">
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
                                    <input class="present" id="present{{$key}}" name="attendance_status{{$key}}" value="Present" type="radio" {{$employeeAttendance->attendance_status == 'Present' ? 'checked' : ''}} readonly />
                                    <label for="present{{$key}}" style="color: green;">P</label>
                                </td>
                                <td colspan="1">
                                    <input class="on_leave" id="on_leave{{$key}}" name="attendance_status{{$key}}" value="On_Leave" type="radio" {{$employeeAttendance->attendance_status == 'On_Leave' ? 'checked' : ''}} readonly />
                                    <label for="on_leave{{$key}}" style="color: blue;">L</label>
                                </td>
                                <td colspan="1">
                                    <input class="absent" id="absent{{$key}}" name="attendance_status{{$key}}" value="Absent" type="radio" {{$employeeAttendance->attendance_status == 'Absent' ? 'checked' : ''}} readonly />
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
    </div>
</div>
@endsection