<div class="table-responsive">
    <form method="POST" id="myForm" action="{{route('idcard_filter')}}" target="_blank">
        @csrf

        <div class="card-body">
            <div class="row">

                <div class="form-group col-sm-3">
                    {!! Form::label('sessions', 'Session:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="session_id" id="session_id" required>
                        <option value="" disabled selected>Select Session...</option>
                        @foreach($sessions as $session)
                        <option value="{{$session->id}}">{{$session->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('classes', 'Class:') !!} <font style="color: red;">*</font>
                    <select class="form-control" name="class_id" id="class_id" required>
                        <option value="" disabled selected>Select Class...</option>
                        @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
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
                'session_Id': {
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