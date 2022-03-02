<div class="table-responsive">
    <table class="table" id="studentAssignings-table">
        <thead>
        <tr>
            <th>Student Id</th>
        <th>Session Id</th>
        <th>Shift Id</th>
        <th>Class Id</th>
        <th>Section Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($studentAssignings as $studentAssignings)
            <tr>
                <td>{{ $studentAssignings->student_id }}</td>
            <td>{{ $studentAssignings->session_id }}</td>
            <td>{{ $studentAssignings->shift_id }}</td>
            <td>{{ $studentAssignings->class_id }}</td>
            <td>{{ $studentAssignings->section_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['studentAssignings.destroy', $studentAssignings->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('studentAssignings.show', [$studentAssignings->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('studentAssignings.edit', [$studentAssignings->id]) }}"
                           class='btn btn-default btn-xs'>
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
