<div class="table-responsive">

    <div class="card-body">
        <form method="GET" id="myForm" action="{{route('studentRegistrations_filter')}}">

            <div class="row">
                <div class="form-group col-sm-3">
                    {!! Form::label('sessions', 'Session:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="session_id" required>
                        <option value="">Select Session...</option>
                        @foreach($sessions as $session)
                        <option value="{{$session->id}}" {{$session->id == $session_id ? 'selected' : ''}}>{{$session->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::label('classes', 'Class:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="class_id" required>
                        <option value="">Select Class...</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}" {{$class->id == $class_id ? 'selected' : ''}}>{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <button type="submit" class="btn btn-primary" name="search" style="margin-top: 32px;">Search</button>
                </div>
            </div>

        </form>
    </div>

    <div class="card-body">
        <table class="table" id="studentRegistrations-table">
            <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Profile Photo</th>
                    <th>Name</th>
                    <th>Id No</th>
                    <th>Session</th>
                    <th>Class</th>
                    <th>Roll No</th>

                    @if(Auth::user()->role == 'admin' || Auth::user()->user_type == 'admins')
                    <th>Generated Password</th>
                    @endif

                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studentRegistrations as $key => $studentRegistrations)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="/images/profile_photos/{{ $studentRegistrations['student']['profile_photo'] }}" style="height: 120px; width: 100px; border: 1px solid #ccc; padding: 5px;"></td>
                    <td>{{ $studentRegistrations['student']['name'] }}</td>
                    <td>{{ $studentRegistrations['student']['id_no'] }}</td>
                    <td>{{ $studentRegistrations['session']['name'] }}</td>
                    <td>{{ $studentRegistrations['class']['name'] }}
                        <br>
                        @include('student_registrations.promote')
                        <a data-toggle="modal" data-target="#student_promote-edit-modal" data-id="{{$studentRegistrations->student_id}}" id="promote" data-name="{{$studentRegistrations['student']['name']}}" class='btn btn-success btn-xs'>
                            <i class="fa fa-arrow-up" aria-hidden="true"> PROMOTE</i>
                        </a>
                    </td>
                    <td>{{ $studentRegistrations->roll_no }}</td>

                    @if(Auth::user()->role == 'admin' || Auth::user()->user_type == 'admins')
                    <td>{!! $studentRegistrations['student']['generated_password'] !!}</td>
                    @endif

                    <td width="120">
                        {!! Form::open(['route' => ['studentRegistrations.destroy', $studentRegistrations->student_id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a target="_blank" href="{{ route('studentRegistrations.show', [$studentRegistrations->student_id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('studentRegistrations.edit', [$studentRegistrations->student_id]) }}" class='btn btn-default btn-xs'>
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
</div>

@push('page_scripts')
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                'session_id': {
                    required: true,
                },
                'class_id': {
                    required: true,
                },
            },
            messages: {

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback')
                element.closest('.form-group').append(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        })
    })
</script>
@endpush