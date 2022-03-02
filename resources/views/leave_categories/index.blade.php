@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Leave Categories</h1>
            </div>
            <div class="col-sm-6">
                <!-- <a class="btn btn-primary float-right" href="{{ route('leaveCategories.create') }}">
                    Add New
                </a> -->
                <a data-toggle="modal" data-target="#leave_categories-add-modal" class="btn btn-primary float-right">
                    <i class="fa fa-plus"></i> Add New Leave Category
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')
    @include('adminlte-templates::common.errors')
    @include('leave_categories.edit_fields')
    @include('leave_categories.show_fields')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            @include('leave_categories.table')

            {!! Form::open(['route' => 'leaveCategories.store']) !!}
            @include('leave_categories.fields')
            {!! Form::close() !!}

            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
            </div>
        </div>

    </div>
</div>

@endsection