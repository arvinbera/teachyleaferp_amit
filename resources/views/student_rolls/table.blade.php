<div class="table-responsive">
    <form method="POST" id="myForm" action="{{route('studentRolls_store')}}">
        @csrf

        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-3">
                    {!! Form::label('sessions', 'Session:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="session_id" id="session_id" required>
                        <option value="">Select Session...</option>
                        @foreach($sessions as $session)
                        <option value="{{$session->id}}">{{$session->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::label('classes', 'Class:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="class_id" id="class_id" required>
                        <option value="">Select Class...</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <a class="btn btn-primary" name="search" id="search" style="margin-top: 32px;">Search</a>
                </div>
            </div>
        </div>

        <div class="card-body d-none" id="roll_assign">
            <table class="table" id="studentRolls-table">
                <thead>
                    <tr>
                        <th>Sl.</th>
                        <!-- <th>Profile Photo</th> -->
                        <th>Name</th>
                        <th>Id No</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Roll No</th>
                    </tr>
                </thead>
                <tbody id="roll_assign_tr">

                </tbody>
            </table>
            <button type="submit" class="btn btn-success" style="margin-top: 32px;">Save Rolls &nbsp;&nbsp; <i class="fas fa-save"></i></button>
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

        $.ajax({
            url: "{{route('studentRolls_filter')}}",
            type: 'GET',
            data: {
                'session_id': session_id,
                'class_id': class_id
            },
            success: function(data) {
                $('#roll_assign').removeClass('d-none')
                var html = ''
                $.each(data, function(key, value) {
                    html +=
                        '<tr>' +
                        '<input type="hidden" name="student_id[]" value="' + value.student_id + '">' +
                        '<td>' + [key + 1] + '</td>' +
                        '<td>' + value.student.name + '</td>' +
                        '<td>' + value.student.id_no + '</td>' +
                        '<td>' + value.student.email + '</td>' +
                        '<td>' + value.student.phone + '</td>' +
                        '<td><input type="text" name="roll_no[]" value="' + value.roll_no + '" class="form-control"></td>' +
                        '</tr>'
                })
                html = $('#roll_assign_tr').html(html)
            },
        })
    })
</script>

<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                'roll_no[]': {
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