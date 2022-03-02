<!-- Student Assigning Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_assigning_id', 'Student Assigning Id:') !!}
    {!! Form::number('student_assigning_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fees Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fees_category_id', 'Fees Category Id:') !!}
    {!! Form::number('fees_category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Discount:') !!}
    {!! Form::number('discount', null, ['class' => 'form-control']) !!}
</div>