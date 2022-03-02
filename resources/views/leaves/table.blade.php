<div class="table-responsive">
    <table class="table" id="leaves-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Employee Name</th>
                <th>Employee Id</th>
                <th>Leave Category</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $key => $leaves)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $leaves['employee']['name'] }}</td>
                <td>{{ $leaves['employee']['id_no'] }}</td>
                <td>{{ $leaves['leave_category']['name'] }}</td>
                <td>{{ date('d-m-Y', strtotime($leaves->start_date)) }}</td>
                <td>{{ date('d-m-Y', strtotime($leaves->end_date)) }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['leaves.destroy', $leaves->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('leaves.show', [$leaves->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('leaves.edit', [$leaves->id]) }}" class='btn btn-default btn-xs'>
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