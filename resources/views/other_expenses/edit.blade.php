@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Edit Other Expenses</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($otherExpenses, ['route' => ['otherExpenses.update', $otherExpenses->id], 'method' => 'patch','enctype' => 'multipart/form-data','id' => 'myForm']) !!}

        <div class="card-body">
            <div class="row">
                @include('other_expenses.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('otherExpenses.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection