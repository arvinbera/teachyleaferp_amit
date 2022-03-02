<div class="table-responsive">
    <table class="table" id="feesAmounts-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Fees Category</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feesAmounts as $key => $feesAmounts)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $feesAmounts['fees_category']['name'] }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['feesAmounts.destroy', $feesAmounts->fees_category_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('feesAmounts.show', [$feesAmounts->fees_category_id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('feesAmounts.edit', [$feesAmounts->fees_category_id]) }}" class='btn btn-default btn-xs'>
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