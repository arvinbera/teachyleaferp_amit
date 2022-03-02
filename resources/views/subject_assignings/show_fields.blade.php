<!-- Class Id Field -->
<div class="col-sm-12">
    {!! Form::label('class_id', 'Class Id:') !!}
    <p>{{ $subjectAssignings->class_id }}</p>
</div>

<!-- Subject Id Field -->
<div class="col-sm-12">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    <p>{{ $subjectAssignings->subject_id }}</p>
</div>

<!-- Full Marks Field -->
<div class="col-sm-12">
    {!! Form::label('full_marks', 'Full Marks:') !!}
    <p>{{ $subjectAssignings->full_marks }}</p>
</div>

<!-- Pass Marks Field -->
<div class="col-sm-12">
    {!! Form::label('pass_marks', 'Pass Marks:') !!}
    <p>{{ $subjectAssignings->pass_marks }}</p>
</div>

<!-- Obtained Marks Field -->
<div class="col-sm-12">
    {!! Form::label('subjective_marks', 'Subjective Marks:') !!}
    <p>{{ $subjectAssignings->subjective_marks }}</p>
</div>