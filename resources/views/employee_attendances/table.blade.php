<div class="table-responsive">
    <table class="table" id="employeeAttendances-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employeeAttendances as $key => $employeeAttendances)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ date('Y-m-d', strtotime($employeeAttendances->date)) }}</td>
                <td width="120">
                    <div class='btn-group'>
                        <a href="{{ route('employee_attendances_show', [$employeeAttendances->date]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employee_attendances_edit', [$employeeAttendances->date]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>