<div class="modal fade" id="grades-edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Grade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('grades.update', 'id')}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <div class="row">
                        <!-- Grade Name Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('grade_name', 'Grade Name:') !!}
                            {!! Form::text('grade_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>

                        <!-- Grade Point Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('grade_point', 'Grade Point:') !!}
                            {!! Form::text('grade_point', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>
                    </div>

                    <div class="row">
                        <!-- Start Marks Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_marks', 'Start Marks:') !!}
                            {!! Form::text('start_marks', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>

                        <!-- End Marks Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_marks', 'End Marks:') !!}
                            {!! Form::text('end_marks', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>
                    </div>

                    <div class="row">
                        <!-- Start Point Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_point', 'Start Point:') !!}
                            {!! Form::text('start_point', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>

                        <!-- End Point Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_point', 'End Point:') !!}
                            {!! Form::text('end_point', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>

                    </div>

                    <!-- Remarks Field -->
                    <div class="form-group col-sm-6 p-0">
                        {!! Form::label('remarks', 'Remarks:') !!}
                        {!! Form::text('remarks', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Update Grade', ['class' => 'btn btn-primary']) !!}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>


@push('page_scripts')
<script type="text/javascript">
    $(document).on('click', '#edit', function(event) {
        var id = $(this).data('id');
        $.get("{{route('grades_edit')}}", {
            id: id
        }, function(data) {
            $('#id').val(data.id);
            $('#grade_name').val(data.grade_name);
            $('#grade_point').val(data.grade_point);
            $('#start_marks').val(data.start_marks);
            $('#end_marks').val(data.end_marks);
            $('#start_point').val(data.start_point);
            $('#end_point').val(data.end_point);
            $('#remarks').val(data.remarks);
            console.log(data)
        })
    })

    $('#grades-show-modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var grade_name = button.data('grade_name')
        var grade_point = button.data('grade_point')
        var start_marks = button.data('start_marks')
        var end_marks = button.data('end_marks')
        var start_point = button.data('start_point')
        var end_point = button.data('end_point')
        var remarks = button.data('remarks')

        var modal = $(this)

        modal.find('.modal-title').text('Grade Details')
        modal.find('.modal-body #grade_name').val(grade_name)
        modal.find('.modal-body #grade_point').val(grade_point)
        modal.find('.modal-body #start_marks').val(start_marks)
        modal.find('.modal-body #end_marks').val(end_marks)
        modal.find('.modal-body #start_point').val(start_point)
        modal.find('.modal-body #end_point').val(end_point)
        modal.find('.modal-body #remarks').val(remarks)
    })
</script>
@endpush