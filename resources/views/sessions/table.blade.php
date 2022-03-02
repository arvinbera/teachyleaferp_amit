<div class="table-responsive">
    <table class="table" id="sessions-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sessions as $key => $sessions)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $sessions->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['sessions.destroy', $sessions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#sessions-show-modal" data-id="{{$sessions->id}}" data-name="{{$sessions->name}}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#sessions-edit-modal" data-id="{{$sessions->id}}" id="edit" class='btn btn-default btn-xs'>
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