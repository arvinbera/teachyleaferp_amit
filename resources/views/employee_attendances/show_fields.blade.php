<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $employeeAttendances->employee_id }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $employeeAttendances->date }}</p>
</div>

<!-- Attendance Status Field -->
<div class="col-sm-12">
    {!! Form::label('attendance_status', 'Attendance Status:') !!}
    <p>{{ $employeeAttendances->attendance_status }}</p>
</div>

