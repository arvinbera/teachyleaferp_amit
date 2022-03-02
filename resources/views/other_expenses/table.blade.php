<div class="table-responsive">
    <table class="table" id="otherExpenses-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($otherExpenses as $key => $otherExpenses)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ date('d-m-Y', strtotime($otherExpenses->date)) }}</td>
                <td>{{ $otherExpenses->amount }}</td>
                <td>{{ $otherExpenses->description }}</td>
                <td><img src="/images/other_expenses/{{ $otherExpenses->image }}" style="height: 120px; width: 100px; border: 1px solid #ccc; padding: 5px;"></td>
                <td width="120">
                    {!! Form::open(['route' => ['otherExpenses.destroy', $otherExpenses->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('otherExpenses.show', [$otherExpenses->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('otherExpenses.edit', [$otherExpenses->id]) }}" class='btn btn-default btn-xs'>
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