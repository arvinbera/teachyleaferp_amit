@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sessions</h1>
            </div>
            <div class="col-sm-6">
                <!-- <a class="btn btn-primary float-right" href="{{ route('sessions.create') }}">
                    Add New
                </a> -->
                <a data-toggle="modal" data-target="#sessions-add-modal" class="btn btn-primary float-right">
                    <i class="fa fa-plus"></i> Add New Session
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')
    @include('adminlte-templates::common.errors')
    @include('sessions.edit_fields')
    @include('sessions.show_fields')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            @include('sessions.table')

            {!! Form::open(['route' => 'sessions.store']) !!}
            @include('sessions.fields')
            {!! Form::close() !!}

            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
            </div>
        </div>

    </div>
</div>

@endsection