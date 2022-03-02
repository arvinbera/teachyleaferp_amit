<!-- Student Assigning Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_assigning_id', 'Student Assigning Id:') !!}
    <p>{{ $studentFeewaive->student_assigning_id }}</p>
</div>

<!-- Fees Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('fees_category_id', 'Fees Category Id:') !!}
    <p>{{ $studentFeewaive->fees_category_id }}</p>
</div>

<!-- Discount Field -->
<div class="col-sm-12">
    {!! Form::label('discount', 'Discount:') !!}
    <p>{{ $studentFeewaive->discount }}</p>
</div>

