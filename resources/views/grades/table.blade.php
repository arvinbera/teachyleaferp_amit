<div class="table-responsive">
    <table class="table" id="grades-table">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Grade Name</th>
                <th>Grade Point</th>
                <th>Marks Range</th>
                <th>Points Range</th>
                <th>Remarks</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $key => $grades)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $grades->grade_name }}</td>
                <td>{{ number_format((float)$grades->grade_point, 2) }}</td>
                <td>{{ $grades->start_marks }} - {{ $grades->end_marks }}</td>
                <td>{{ $grades->start_point }} - {{ $grades->end_point }}</td>
                <td>{{ $grades->remarks }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['grades.destroy', $grades->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a data-toggle="modal" data-target="#grades-show-modal" data-id="{{$grades->id}}" data-grade_name="{{$grades->grade_name}}" data-grade_point="{{$grades->grade_point}}" data-start_marks="{{$grades->start_marks}}" data-end_marks="{{$grades->end_marks}}" data-start_point="{{$grades->start_point}}" data-end_point="{{$grades->end_point}}" data-remarks="{{$grades->remarks}}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#grades-edit-modal" data-id="{{$grades->id}}" id="edit" class='btn btn-default btn-xs'>
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