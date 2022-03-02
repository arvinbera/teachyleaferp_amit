@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Designations</h1>
            </div>
            <div class="col-sm-6">
                <!-- <a class="btn btn-primary float-right" href="{{ route('designations.create') }}">
                    Add New
                </a> -->
                <a data-toggle="modal" data-target="#designations-add-modal" class="btn btn-primary float-right">
                    <i class="fa fa-plus"></i> Add New Designation
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')
    @include('adminlte-templates::common.errors')
    @include('designations.edit_fields')
    @include('designations.show_fields')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            @include('designations.table')

            {!! Form::open(['route' => 'designations.store']) !!}
            @include('designations.fields')
            {!! Form::close() !!}

            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
            </div>
        </div>

    </div>
</div>

@endsection