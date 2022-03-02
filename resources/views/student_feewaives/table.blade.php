<div class="table-responsive">
    <table class="table" id="studentFeewaives-table">
        <thead>
        <tr>
            <th>Student Assigning Id</th>
        <th>Fees Category Id</th>
        <th>Discount</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($studentFeewaives as $studentFeewaive)
            <tr>
                <td>{{ $studentFeewaive->student_assigning_id }}</td>
            <td>{{ $studentFeewaive->fees_category_id }}</td>
            <td>{{ $studentFeewaive->discount }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['studentFeewaives.destroy', $studentFeewaive->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('studentFeewaives.show', [$studentFeewaive->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('studentFeewaives.edit', [$studentFeewaive->id]) }}"
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
