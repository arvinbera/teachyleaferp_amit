<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- User Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_type', 'User Type:') !!}
    {!! Form::text('user_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    {!! Form::text('role', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Profile Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profile_photo', 'Profile Photo:') !!}
    {!! Form::text('profile_photo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Father Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('father_name', 'Father Name:') !!}
    {!! Form::text('father_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Father Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('father_phone', 'Father Phone:') !!}
    {!! Form::text('father_phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Mother Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mother_name', 'Mother Name:') !!}
    {!! Form::text('mother_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Address Current Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address_current', 'Address Current:') !!}
    {!! Form::textarea('address_current', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Permanent Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address_permanent', 'Address Permanent:') !!}
    {!! Form::textarea('address_permanent', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Religion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion', 'Religion:') !!}
    {!! Form::text('religion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    {!! Form::text('dob', null, ['class' => 'form-control','id'=>'dob']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#dob').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Id No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_no', 'Id No:') !!}
    {!! Form::text('id_no', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Joining Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('joining_date', 'Joining Date:') !!}
    {!! Form::text('joining_date', null, ['class' => 'form-control','id'=>'joining_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#joining_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Generated Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generated_password', 'Generated Password:') !!}
    {!! Form::text('generated_password', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Designation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('designation_id', 'Designation Id:') !!}
    {!! Form::number('designation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salary', 'Salary:') !!}
    {!! Form::number('salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('status', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('status', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('status', 'Status', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>