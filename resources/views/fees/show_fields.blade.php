<!-- Session Id Field -->
<div class="col-sm-12">
    {!! Form::label('session_id', 'Session Id:') !!}
    <p>{{ $fees->session_id }}</p>
</div>

<!-- Class Id Field -->
<div class="col-sm-12">
    {!! Form::label('class_id', 'Class Id:') !!}
    <p>{{ $fees->class_id }}</p>
</div>

<!-- Student Id Field -->
<div class="col-sm-12">
    {!! Form::label('student_id', 'Student Id:') !!}
    <p>{{ $fees->student_id }}</p>
</div>

<!-- Fee Category Id Field -->
<div class="col-sm-12">
    {!! Form::label('fee_category_id', 'Fee Category Id:') !!}
    <p>{{ $fees->fee_category_id }}</p>
</div>

<!-- Date Field -->
<div class="col-sm-12">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $fees->date }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $fees->amount }}</p>
</div>

