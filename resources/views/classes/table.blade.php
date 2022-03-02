<div class="table-responsive">
    <table class="table" id="classes-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $key => $classes)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $classes->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['classes.destroy', $classes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#classes-show-modal" data-id="{{$classes->id}}" data-name="{{$classes->name}}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#classes-edit-modal" data-id="{{$classes->id}}" id="edit" class='btn btn-default btn-xs'>
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