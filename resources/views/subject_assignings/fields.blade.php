<!-- Class Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('class_id', 'Class Id:') !!}
    {!! Form::number('class_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Subject Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject_id', 'Subject Id:') !!}
    {!! Form::number('subject_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Marks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_marks', 'Full Marks:') !!}
    {!! Form::number('full_marks', null, ['class' => 'form-control']) !!}
</div>

<!-- Pass Marks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pass_marks', 'Pass Marks:') !!}
    {!! Form::number('pass_marks', null, ['class' => 'form-control']) !!}
</div>

<!-- Subject Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject_type', 'Subject Type:') !!}
    <select class="form-control" name="subject_type" required>
        <option value="academic_assesment" {{ $subjectAssigning->subject_type === 'academic_assesment' ? 'selected' : ''}}>Academic Assesment</option>
        <option value="personal_assesment" {{ $subjectAssigning->subject_type === 'personal_assesment' ? 'selected' : ''}}>Personal Assesment</option>
    </select>
</div>