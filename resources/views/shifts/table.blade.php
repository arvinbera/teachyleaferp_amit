<div class="table-responsive">
    <table class="table" id="shifts-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shifts as $key => $shifts)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $shifts->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shifts.destroy', $shifts->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#shifts-show-modal" data-id="{{$shifts->id}}" data-name="{{$shifts->name}}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#shifts-edit-modal" data-id="{{$shifts->id}}" id="edit" class='btn btn-default btn-xs'>
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