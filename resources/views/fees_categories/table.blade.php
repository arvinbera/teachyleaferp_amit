<div class="table-responsive">
    <table class="table" id="feesCategories-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feesCategories as $key => $feesCategories)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $feesCategories->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['feesCategories.destroy', $feesCategories->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#fees_categories-show-modal" data-id="{{$feesCategories->id}}" data-name="{{$feesCategories->name}}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#fees_categories-edit-modal" data-id="{{$feesCategories->id}}" id="edit" class='btn btn-default btn-xs'>
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