<div class="table-responsive">
    <table class="table" id="salaries-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Employee Name</th>
                <th>Id No</th>
                <th>Date</th>
                <th>Amount</th>
                <!-- <th colspan="3">Action</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $key => $salary)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $salary['employee']['name'] }}</td>
                <td>{{ $salary['employee']['id_no'] }}</td>
                <td>{{ date('M Y', strtotime($salary->date)) }}</td>
                <td>{{ $salary->amount }}</td>
                <!-- <td width="120">
                    {!! Form::open(['route' => ['salaries.destroy', $salary->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('salaries.show', [$salary->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('salaries.edit', [$salary->id]) }}" class='btn btn-default btn-xs'>
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