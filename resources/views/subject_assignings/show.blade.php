@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Subject Assigning Details</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    @include('adminlte-templates::common.errors')

    <div class="card">
        <div class="card-body">

            <!-- <div class="row"> -->

            <div class="form-row">
                <div class="form-group col-sm-5">
                    {!! Form::label('class_id', 'Class:') !!}
                    <input type="text" value="{{$subjectAssignings[0]['class']['name']}}" readonly style="border: none;" />
                </div>
            </div>

            <table class="table" id="subjectAssignings-table">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Subject</th>
                        <th>Full Marks</th>
                        <th>Pass Marks</th>
                        <th>Subject Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjectAssignings as $key => $subjectAssignings)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $subjectAssignings['subject']['name'] }}</td>
                        <td>{{ $subjectAssignings->full_marks }}</td>
                        <td>{{ $subjectAssignings->pass_marks }}</td>
                        <td>{{ $subjectAssignings->subject_type }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- </div> -->

        </div>

        <div class="card-footer">
            <a href="{{ route('subjectAssignings.index') }}" class="btn btn-default">Go Back</a>
        </div>

    </div>
</div>
@endsection