@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Update Fees Amounts</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($feesAmounts, ['route' => ['feesAmounts.update', $feesAmounts[0]->fees_category_id], 'method' => 'patch','id' => 'myForm']) !!}

        <div class="card-body">

            <!-- <div class="row"> -->


            <div class="add_item">
                <div class="form-row">
                    <div class="form-group col-sm-5">
                        {!! Form::label('fees_category_id', 'Fees Category:') !!}
                        <select class="form-control" name="fees_category_id">
                            <option value="">Select Fees Category...</option>
                            @foreach($fees_categories as $fees_category)
                            <option value="{{$fees_category->id}}" {{$feesAmounts[0]->fees_category_id == $fees_category->id ? 'selected' : ''}}>{{$fees_category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                @foreach($feesAmounts as $feesAmount)
                <div class="delete_this_row" id="delete_this_row">
                    <div class="form-row">
                        <div class="form-group col-sm-5">
                            {!! Form::label('class_id', 'Class:') !!}
                            <select class="form-control" name="class_id[]" required>
                                <option value="">Select Class...</option>
                                @foreach($classes as $class)
                                <option value="{{$class->id}}" {{$feesAmount->class_id == $class->id ? 'selected' : ''}}>{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            {!! Form::label('amount', 'Fees Amount:') !!}
                            <input type="text" name="amount[]" value="{{$feesAmount->amount}}" class="form-control" required />
                        </div>
                        <div class="form-group col-sm-3" style="margin-top: 32px;">
                            <span class="btn btn-success addAnotherRow"><i class="fa fa-plus-circle"></i></span>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="btn btn-danger deleteThisRow"><i class="fa fa-minus-circle"></i></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


            <!-- </div> -->

        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('feesAmounts.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>

<div style="visibility: hidden;">
    <div class="add_another_row" id="add_another_row">
        <div class="delete_this_row" id="delete_this_row">
            <div class="form-row">
                <div class="form-group col-sm-5">
                    {!! Form::label('class_id', 'Class:') !!}
                    <select class="form-control" name="class_id[]" required>
                        <option value="">Select Class...</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('amount', 'Fees Amount:') !!}
                    <input type="text" name="amount[]" class="form-control" required />
                </div>
                <div class="form-group col-sm-3" style="margin-top: 32px;">
                    <span class="btn btn-success addAnotherRow"><i class="fa fa-plus-circle"></i></span>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="btn btn-danger deleteThisRow"><i class="fa fa-minus-circle"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page_scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var counter = 0;
        $(document).on('click', '.addAnotherRow', function() {
            var add_another_row = $('#add_another_row').html()
            $(this).closest(".add_item").append(add_another_row)
            counter++
        })
        $(document).on('click', '.deleteThisRow', function(event) {
            $(this).closest(".delete_this_row").remove()
            counter--
        })
    })
</script>

<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                'fees_category_id': {
                    required: true,
                },
                'class_id[]': {
                    required: true,
                },
                'amount[]': {
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