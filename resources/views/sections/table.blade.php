<div class="table-responsive">
    <table class="table" id="sections-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sections as $key => $sections)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $sections->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['sections.destroy', $sections->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#sections-show-modal" data-id="{{$sections->id}}" data-name="{{$sections->name}}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#sections-edit-modal" data-id="{{$sections->id}}" id="edit" class='btn btn-default btn-xs'>
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