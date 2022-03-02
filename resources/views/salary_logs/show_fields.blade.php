<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $salaryLogs->employee_id }}</p>
</div>

<!-- Previous Salary Field -->
<div class="col-sm-12">
    {!! Form::label('previous_salary', 'Previous Salary:') !!}
    <p>{{ $salaryLogs->previous_salary }}</p>
</div>

<!-- Present Salary Field -->
<div class="col-sm-12">
    {!! Form::label('present_salary', 'Present Salary:') !!}
    <p>{{ $salaryLogs->present_salary }}</p>
</div>

<!-- Increment Field -->
<div class="col-sm-12">
    {!! Form::label('increment', 'Increment:') !!}
    <p>{{ $salaryLogs->increment }}</p>
</div>

<!-- Effective From Field -->
<div class="col-sm-12">
    {!! Form::label('effective_from', 'Effective From:') !!}
    <p>{{ $salaryLogs->effective_from }}</p>
</div>

