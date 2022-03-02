@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Fees Amount Details</h1>
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
                    {!! Form::label('fees_category_id', 'Fees Category:') !!}
                    <input type="text" value="{{$feesAmounts[0]['fees_category']['name']}}" readonly style="border: none;" />
                </div>
            </div>

            <table class="table" id="feesAmounts-table">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Class</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($feesAmounts as $key => $feesAmounts)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $feesAmounts['class']['name'] }}</td>
                        <td>{{ $feesAmounts->amount }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- </div> -->

        </div>

        <div class="card-footer">
            <a href="{{ route('feesAmounts.index') }}" class="btn btn-default">Go Back</a>
        </div>

    </div>
</div>
@endsection