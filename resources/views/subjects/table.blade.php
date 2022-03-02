<div class="table-responsive">
    <table class="table" id="subjects-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $key => $subjects)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $subjects->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['subjects.destroy', $subjects->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#subjects-show-modal" data-id="{{$subjects->id}}" data-name="{{$subjects->name}}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#subjects-edit-modal" data-id="{{$subjects->id}}" id="edit" class='btn btn-default btn-xs'>
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