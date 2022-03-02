<div class="table-responsive">
    <table class="table" id="leaveCategories-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaveCategories as $key => $leaveCategories)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $leaveCategories->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['leaveCategories.destroy', $leaveCategories->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#leave_categories-show-modal" data-id="{{$leaveCategories->id}}" data-name="{{$leaveCategories->name}}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#leave_categories-edit-modal" data-id="{{$leaveCategories->id}}" id="edit" class='btn btn-default btn-xs'>
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