<div class="table-responsive">
    <form method="POST" id="myForm" action="{{route('employeeAttendanceReport_filter')}}" target="_blank">
        @csrf

        <div class="card-body">
            <div class="row">

                <div class="form-group col-sm-3">
                    {!! Form::label('employees', 'Employee Name:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="employee_id" id="employee_id" required>
                        <option value="" disabled selected>Select Employee...</option>
                        @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('date', 'Date:') !!} <font style="color: red;">*</font>
                    <input type="text" class="form-control" name="date" id="date" autocomplete="off" placeholder="DD-MM-YYYY" />
                </div>

                @push('page_scripts')
                <script type="text/javascript">
                    $('#date').datetimepicker({
                        format: 'DD-MM-YYYY',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
                @endpush

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
                'employee_id': {
                    required: true,
                },
                'date': {
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