<div class="modal fade" id="subjects-edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('subjects.update', 'id')}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" />
                <div class="modal-body">
                    <!-- Name Field -->
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        <!-- <input type="text" class="form-control" name="name" id="name" /> -->
                        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Update Subject', ['class' => 'btn btn-primary']) !!}
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
        $.get("{{route('subjects_edit')}}", {
            id: id
        }, function(data) {
            $('#id').val(data.id);
            $('#name').val(data.name);
            console.log(data)
        })
    })

    $('#subjects-show-modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var name = button.data('name')

        var modal = $(this)

        modal.find('.modal-title').text('Subject Details')
        modal.find('.modal-body #name').val(name)
    })
</script>
@endpush