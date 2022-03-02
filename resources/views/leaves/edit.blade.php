@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Edit Leaves</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($leaves, ['route' => ['leaves.update', $leaves->id], 'method' => 'patch']) !!}

        <div class="card-body">
            <!-- <div class="row"> -->
            <div class="row">
                <!-- Employee Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('employee_id', 'Employee Name:') !!}
                    <select class="form-control" name="employee_id">
                        <option value="" selected disabled>Select Employee...</option>
                        @foreach($employees as $employee)
                        <option value="{{$employee->id}}" {{ $employee->id == $leaves->employee_id ? 'selected' : '' }}>{{$employee->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <!-- Start Date Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('start_date', 'Start Date:') !!}
                    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
                </div>

                @push('page_scripts')
                <script type="text/javascript">
                    $('#start_date').datetimepicker({
                        format: 'YYYY-MM-DD',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
                @endpush

                <!-- End Date Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('end_date', 'End Date:') !!}
                    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
                </div>

                @push('page_scripts')
                <script type="text/javascript">
                    $('#end_date').datetimepicker({
                        format: 'YYYY-MM-DD',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
                @endpush
            </div>

            <div class="row">
                <!-- Leave Category Id Field -->
                <div class="form-group col-sm-4">
                    {!! Form::label('leave_category_id', 'Leave Category:') !!}
                    <select class="form-control" name="leave_category_id" id="leave_category_id">
                        <option value="" selected disabled>Select Leave Category...</option>
                        @foreach($leave_categories as $leave_category)
                        <option value="{{$leave_category->id}}" {{$leave_category->id == $leaves->leave_category_id ? 'selected' : ''}}>{{$leave_category->name}}</option>
                        @endforeach
                        <option value="0">Others</option>
                    </select>
                </div>

                <div class="form-group col-sm-4" id="add_others" style="display: none;">
                    {!! Form::label('leave_purpose', 'Leave Purpose:') !!}
                    <input type="text" name="name" class="form-control" placeholder="Enter purpose..." autocomplete="off" />
                </div>
            </div>

            @push('page_scripts')
            <script type="text/javascript">
                $(document).ready(function() {
                    $(document).on('change', '#leave_category_id', function() {
                        var leave_category_id = $(this).val()
                        if (leave_category_id == 0) {
                            $('#add_others').show()
                        } else {
                            $('#add_others').hide()
                        }
                    })
                })
            </script>
            @endpush
            <!-- </div> -->
        </div>

        <div class="card-footer">
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('leaves.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection