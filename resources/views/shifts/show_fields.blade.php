<div class="modal fade" id="shifts-show-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Shift Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <!-- Name Field -->
                <div class="col-sm-12">
                    {!! Form::label('name', 'Name:') !!}
                    <input type="text" class="form-control" id="name" style="border: none;">
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
    // $('#shifts-show-modal').on('show.bs.modal', function(event) {
    //     var button = $(event.relatedTarget)
    //     var name = button.data('name')

    //     var modal = $(this)

    //     modal.find('.modal-title').text('Shift Details')
    //     modal.find('.modal-body #name').val(name)
    // })
</script>
@endpush