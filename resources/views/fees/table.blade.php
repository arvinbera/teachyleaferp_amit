<div class="table-responsive">
    <table class="table" id="fees-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Student Name</th>
                <th>Id No</th>
                <th>Session</th>
                <th>Class</th>
                <th>Fee Category</th>
                <th>Amount</th>
                <th>Date</th>
                <!-- <th colspan="3">Action</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($fees as $key => $fees)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $fees['student']['name'] }}</td>
                <td>{{ $fees['student']['id_no'] }}</td>
                <td>{{ $fees['session']['name'] }}</td>
                <td>{{ $fees['class']['name'] }}</td>
                <td>{{ $fees['fees_category']['name'] }}</td>
                <td>{{ $fees->amount }}</td>
                <td>{{ date('M Y', strtotime($fees->date)) }}</td>
                <!-- <td width="120">
                    {!! Form::open(['route' => ['fees.destroy', $fees->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('fees.show', [$fees->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('fees.edit', [$fees->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>