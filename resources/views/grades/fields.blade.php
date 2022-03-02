<div class="modal fade" id="grades-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Grade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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
                {!! Form::submit('Add New Grade', ['class' => 'btn btn-primary']) !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>