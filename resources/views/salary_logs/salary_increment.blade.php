@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Salary Increment</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => ['salary_increment_store', $employee->id],'id' => 'myForm']) !!}

        <div class="card-body">
            <p class="mb-3 display-4">{{ $employee->name }} | {{ $employee->id_no }}</p>

            <div class="row">


                <div class="form-group col-sm-5">
                    {!! Form::label('increment', 'Increment:') !!}
                    {!! Form::number('increment', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-5">
                    {!! Form::label('effective_from', 'Effective From:') !!}
                    {!! Form::text('effective_from', null, ['class' => 'form-control','id' => 'effective_from','autocomplete' => 'off']) !!}
                </div>

                @push('page_scripts')
                <script type="text/javascript">
                    $('#effective_from').datetimepicker({
                        format: 'DD-MM-YYYY',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
                @endpush


            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Increment Salary', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('salaryLogs.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection

@push('page_scripts')
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                'increment': {
                    required: true,
                },
                'effective_from': {
                    required: true,
                },
            },
            messages: {

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback')
                element.closest('.form-group').append(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        })
    })
</script>
@endpush