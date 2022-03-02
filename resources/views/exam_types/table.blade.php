<div class="table-responsive">
    <table class="table" id="examTypes-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($examTypes as $key => $examTypes)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $examTypes->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['examTypes.destroy', $examTypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#exam_types-show-modal" data-id="{{$examTypes->id}}" data-name="{{$examTypes->name}}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#exam_types-edit-modal" data-id="{{$examTypes->id}}" id="edit" class='btn btn-default btn-xs'>
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