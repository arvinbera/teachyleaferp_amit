<!-- Employee Id Field -->
<div class="col-sm-12">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $leaves->employee_id }}</p>
</div>

<!-- Leave Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('leave_category_id', 'Leave Category Id:') !!}
    <p>{{ $leaves->leave_category_id }}</p>
</div>

<!-- Start Date Field -->
<div class="col-sm-12">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ $leaves->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="col-sm-12">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ $leaves->end_date }}</p>
</div>

