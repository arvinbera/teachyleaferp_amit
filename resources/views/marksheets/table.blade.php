<div class="table-responsive">
    <form method="POST" id="myForm" action="{{route('marksheet_view')}}">
        @csrf

        <div class="card-body">
            <div class="row">

                <div class="form-group col-sm-2">
                    {!! Form::label('sessions', 'Session:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="session_id" id="session_id" required>
                        <option value="" disabled selected>Select Session...</option>
                        @foreach($sessions as $session)
                        <option value="{{$session->id}}">{{$session->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-2">
                    {!! Form::label('classes', 'Class:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="class_id" id="class_id" required>
                        <option value="" disabled selected>Select Class...</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-2">
                    {!! Form::label('exam_type_id', 'Exam Type:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="exam_type_id" id="exam_type_id" required>
                        <option value="" disabled selected>Select Exam Type...</option>
                        @foreach($exam_types as $exam_type)
                        <option value="{{$exam_type->id}}">{{$exam_type->name}}</option>
                        @endforeach
                        <option value="final">Final</option>
                    </select>
                </div>

                <div class="form-group col-sm-2">
                    {!! Form::label('id_no', 'Id No:') !!} <font style="color: red;">*</font>
                    <input type="text" name="id_no" id="id_no" class="form-control" />
                </div>

                <div class="form-group col-sm-2">
                    <button type="submit" class="btn btn-primary" name="search" id="search" style="margin-top: 32px;">Search</button>
                </div>

            </div>
        </div>

    </form>
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
                'exam_type_id': {
                    required: true,
                },
                'id_no': {
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