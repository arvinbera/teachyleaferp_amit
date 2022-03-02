<div class="modal fade" id="student_promote-edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Student Promotion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('studentPromotion_update')}}" method="post">
                @csrf

                <div class="card-body">

                    <input type="hidden" name="student_assigning_id" value="{{$studentRegistrations->id}}" />
                    <input type="hidden" name="student_id" value="{{$studentRegistrations->student_id}}" />

                    <div class="row">
                        <div class="form-group col-sm-6">
                            {!! Form::label('sessions', 'Session:') !!} <font style="color: red;">*</font>
                            <select class="form-control" name="session_id" required>
                                @foreach($sessions as $session)
                                @if($session->id == $studentRegistrations->session_id || $session->id == $studentRegistrations->session_id+1)
                                <option value="{{$session->id}}">{{$session->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('classes', 'Class:') !!} <font style="color: red;">*</font>
                            <select class="form-control" name="class_id" required>
                                @foreach($classes as $class)
                                @if($class->id >= $studentRegistrations->class_id+1)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group col-sm-8">
                        {!! Form::label('feewaive', "Fee Waive:") !!} <font style="color: red;">*</font>
                        <input type="text" class="form-control" name="feewaive" value="0" />
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
                                    'feewaive': {
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
                    <!-- </div> -->

                </div>

                <div class="modal-footer">
                    {!! Form::submit('Promote Student', ['class' => 'btn btn-primary']) !!}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>


@push('page_scripts')
<script type="text/javascript">
    $(document).on('click', '#promote', function(event) {
        var id = $(this).data('id');
        $.get("{{route('studentPromotion_edit')}}", {
            id: id
        }, function(data) {
            $('#id').val(data.id);
            $('#name').val(data.name);
            console.log(data)
        })
    })
</script>
@endpush