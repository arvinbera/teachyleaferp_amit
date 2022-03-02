<div class="modal fade" id="grades-show-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Grade Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <!-- Grade Name Field -->
                    <div class="col-sm-6">
                        {!! Form::label('grade_name', 'Grade Name:') !!}
                        <input type="text" class="form-control" id="grade_name" style="border: none;">
                    </div>

                    <!-- Grade Point Field -->
                    <div class="col-sm-6">
                        {!! Form::label('grade_point', 'Grade Point:') !!}
                        <input type="text" class="form-control" id="grade_point" style="border: none;">
                    </div>
                </div>

                <div class="row">
                    <!-- Start Marks Field -->
                    <div class="col-sm-6">
                        {!! Form::label('start_marks', 'Start Marks:') !!}
                        <input type="text" class="form-control" id="start_marks" style="border: none;">
                    </div>

                    <!-- End Marks Field -->
                    <div class="col-sm-6">
                        {!! Form::label('end_marks', 'End Marks:') !!}
                        <input type="text" class="form-control" id="end_marks" style="border: none;">
                    </div>
                </div>

                <div class="row">
                    <!-- Start Point Field -->
                    <div class="col-sm-6">
                        {!! Form::label('start_point', 'Start Point:') !!}
                        <input type="text" class="form-control" id="start_point" style="border: none;">
                    </div>

                    <!-- End Point Field -->
                    <div class="col-sm-6">
                        {!! Form::label('end_point', 'End Point:') !!}
                        <input type="text" class="form-control" id="end_point" style="border: none;">
                    </div>
                </div>

                <!-- Remarks Field -->
                <div class="col-sm-6 p-0">
                    {!! Form::label('remarks', 'Remarks:') !!}
                    <input type="text" class="form-control" id="remarks" style="border: none;">
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('page_scripts')
<script type="text/javascript">
    // $('#grades-show-modal').on('show.bs.modal', function(event) {
    // ... ... ...
    // })
</script>
@endpush