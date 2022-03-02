<div class="table-responsive">
    <table class="table" id="subjectAssignings-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Class Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjectAssignings as $key => $subjectAssignings)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $subjectAssignings['class']['name'] }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['subjectAssignings.destroy', $subjectAssignings->class_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('subjectAssignings.show', [$subjectAssignings->class_id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('subjectAssignings.edit', [$subjectAssignings->class_id]) }}" class='btn btn-default btn-xs'>
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