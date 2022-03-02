@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Exam Types</h1>
            </div>
            <div class="col-sm-6">
                <!-- <a class="btn btn-primary float-right" href="{{ route('examTypes.create') }}">
                    Add New
                </a> -->
                <a data-toggle="modal" data-target="#exam_types-add-modal" class="btn btn-primary float-right">
                    <i class="fa fa-plus"></i> Add New Exam Type
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')
    @include('adminlte-templates::common.errors')
    @include('exam_types.edit_fields')
    @include('exam_types.show_fields')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            @include('exam_types.table')

            {!! Form::open(['route' => 'examTypes.store']) !!}
            @include('exam_types.fields')
            {!! Form::close() !!}

            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
            </div>
        </div>

    </div>
</div>

@endsection