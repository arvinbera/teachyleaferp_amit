<div class="table-responsive">
    <table class="table" id="employeeRegistrations-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Profile Photo</th>
                <th>Name</th>
                <th>Id No</th>
                <th>Designation</th>
                <th>Email</th>
                <th>Phone</th>

                @if(Auth::user()->role == 'admin' || Auth::user()->user_type == 'admins')
                <th>Generated Password</th>
                @endif

                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employeeRegistrations as $key => $employeeRegistrations)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td><img src="/images/profile_photos/{{ $employeeRegistrations['profile_photo'] }}" style="height: 120px; width: 100px; border: 1px solid #ccc; padding: 5px;"></td>
                <td>{{ $employeeRegistrations->name }}</td>
                <td>{{ $employeeRegistrations->id_no }}</td>
                <td>{{ $employeeRegistrations['designation']['name'] }}</td>
                <td>{{ $employeeRegistrations->email }}</td>
                <td>{{ $employeeRegistrations->phone }}</td>

                @if(Auth::user()->role == 'admin' || Auth::user()->user_type == 'admins')
                <td>{{ $employeeRegistrations->generated_password }}</td>
                @endif

                <td width="120">
                    {!! Form::open(['route' => ['employeeRegistrations.destroy', $employeeRegistrations->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a target="_blank" href="{{ route('employeeRegistrations.show', [$employeeRegistrations->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employeeRegistrations.edit', [$employeeRegistrations->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>