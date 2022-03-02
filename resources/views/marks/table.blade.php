<div class="table-responsive">
    <form method="POST" id="myForm" action="{{route('studentMarks_store')}}">
        @csrf

        <div class="card-body">
            <div class="row">

                <div class="form-group col-sm-2">
                    {!! Form::label('sessions', 'Session:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="session_id" id="session_id" required>
                        <option value="">Select Session...</option>
                        @foreach($sessions as $session)
                        <option value="{{$session->id}}">{{$session->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-2">
                    {!! Form::label('classes', 'Class:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="class_id" id="class_id" required>
                        <option value="">Select Class...</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('subject_assignings', 'Subject:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="subject_assigning_id" id="subject_assigning_id" required>
                        <option value="">Select Subject...</option>
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('exam_types', 'Exam Type:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="exam_type_id" id="exam_type_id" required>
                        <option value="">Select Exam Type...</option>
                        @foreach($exam_types as $exam_type)
                        <option value="{{$exam_type->id}}">{{$exam_type->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-2">
                    <a class="btn btn-primary" name="search" id="search" style="margin-top: 32px;">Search</a>
                </div>

            </div>
        </div>

        <div class="card-body d-none" id="marks_entry">
            <table class="table" id="studentRolls-table">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Name</th>
                        <th>Id No</th>
                        <th>Roll No</th>
                        <th width="200">Marks</th>
                    </tr>
                </thead>
                <tbody id="marks_entry_tr">

                </tbody>
            </table>
            <button type="submit" class="btn btn-success" style="margin-top: 32px;">Save Marks &nbsp;&nbsp; <i class="fas fa-save"></i></button>
        </div>
    </form>
</div>

@push('page_scripts')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script type="text/javascript" src="/js/notify.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var session_id = $('#session_id').val()
        var class_id = $('#class_id').val()
        var subject_assigning_id = $('#subject_assigning_id').val()
        var exam_type_id = $('#exam_type_id').val()
        $('.notifyjs-corner').html('')

        if (session_id == '') {
            $.notify('Session requiered...', {
                globalPosition: 'top-right',
                className: 'error'
            })
            return false
        }

        if (class_id == '') {
            $.notify('Class requiered...', {
                globalPosition: 'top-right',
                className: 'error'
            })
            return false
        }

        if (subject_assigning_id == '') {
            $.notify('Subject requiered...', {
                globalPosition: 'top-right',
                className: 'error'
            })
            return false
        }

        if (exam_type_id == '') {
            $.notify('Exam type requiered...', {
                globalPosition: 'top-right',
                className: 'error'
            })
            return false
        }

        $.ajax({
            url: "{{route('studentMarks_filter')}}",
            type: 'GET',
            data: {
                'session_id': session_id,
                'class_id': class_id
            },
            success: function(data) {
                $('#marks_entry').removeClass('d-none')
                var html = ''
                $.each(data, function(key, value) {
                    html +=
                        '<tr>' +
                        '<input type="hidden" name="student_id[]" value="' + value.student_id + '">' +
                        '<input type="hidden" name="id_no[]" value="' + value.student.id_no + '">' +
                        '<td>' + [key + 1] + '</td>' +
                        '<td>' + value.student.name + '</td>' +
                        '<td>' + value.student.id_no + '</td>' +
                        '<td>' + value.roll_no + '</td>' +
                        '<td><input type="text" name="marks[]" class="form-control"></td>' +
                        '</tr>'
                })
                html = $('#marks_entry_tr').html(html)
            },
        })
    })
</script>

<script type="text/javascript">
    $(function() {
        $(document).on('change', '#class_id', function() {
            var class_id = $('#class_id').val();
            $.ajax({
                url: "{{route('marks_studentSubjects_filter')}}",
                type: 'GET',
                data: {
                    'class_id': class_id
                },
                success: function(data) {
                    var html = '<option value="">Select Subject...</option>';
                    $.each(data, function(key, value) {
                        html += '<option value="' + value.id + '">' + value.subject.name + '</option>';
                    })
                    $('#subject_assigning_id').html(html)
                }
            })
        })
    })
</script>

<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                'marks[]': {
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