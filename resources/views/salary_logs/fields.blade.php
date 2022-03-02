<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::number('employee_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Previous Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('previous_salary', 'Previous Salary:') !!}
    {!! Form::number('previous_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Present Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('present_salary', 'Present Salary:') !!}
    {!! Form::number('present_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Increment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('increment', 'Increment:') !!}
    {!! Form::number('increment', null, ['class' => 'form-control']) !!}
</div>

<!-- Effective From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('effective_from', 'Effective From:') !!}
    {!! Form::text('effective_from', null, ['class' => 'form-control','id'=>'effective_from']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#effective_from').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush