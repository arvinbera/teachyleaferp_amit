@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Salary Logs</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        <div class="card-body">
            <p class="mb-3 display-4">{{ $employee->name }} | {{ $employee->id_no }}</p>

            <div class="table-responsive">

                <table class="table" id="employeeRegistrations-table">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Previous Salary</th>
                            <th>Present Salary</th>
                            <th>Increment</th>
                            <th>Effective From</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($salary_log as $key => $salary_log)
                        <tr>
                            @if($key == 0)
                            <td>{{ $key + 1 }}</td>
                            <td colspan="4">Joining Salary: {{ $salary_log->present_salary }}</td>
                            @else
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $salary_log->previous_salary }}</td>
                            <td>{{ $salary_log->present_salary }}</td>
                            <td>{{ $salary_log->increment }}</td>
                            <td>{{ date('d-m-Y', strtotime($salary_log->effective_from)) }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <a href="{{ route('salaryLogs.index') }}" class="btn btn-default">Go Back</a>
        </div>

    </div>
</div>
@endsection