<!-- Date Field -->
<div class="form-group col-sm-4">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date','autocomplete' => 'off']) !!}
</div>

@push('page_scripts')
<script type="text/javascript">
    $('#date').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true
    })
</script>
@endpush

<!-- Amount Field -->
<div class="form-group col-sm-4">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-7">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','style' => 'height: 200px;']) !!}
</div>

<div class="form-group col-sm-4">

    <!-- Image Field -->
    <div class="form-group">
        {!! Form::label('image', 'Image:') !!}
        <br>
        @if(isset($otherExpenses->image))
        <img src="/images/other_expenses/{{$otherExpenses['image']}}" class="p-2 border border-secondary" id="show_image" style="height: 200px; width: 160px;" />
        @else
        {!! Html::image('images/logo.png', null, ['class' => 'p-2 border border-secondary', 'id' => 'show_image', 'style' => 'height: 200px; width: 160px;']) !!}
        @endif
        <input type="file" name="image" id="image" accept="image/x-png, image/png, image/jpg, image/jpeg" style="display: none;" />
        <input type="button" name="browse_file" id="browse_file" value="Browse File" class="m-3 btn btn-link border border-primary" />
    </div>

    @push('page_scripts')
    <script type="text/javascript">
        $('#browse_file').on('click', function() {
            $('#image').click()
        })
        $('#image').on('change', function(e) {
            showFile(this, '#show_image')
        })

        function showFile(fileInput, img, showName) {
            if (fileInput.files[0]) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $(img).attr('src', e.target.result)
                }
                reader.readAsDataURL(fileInput.files[0])
            }
            $(showName).text(fileInput.files[0].name)
        }
    </script>
    @endpush

</div>

@push('page_scripts')
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                'date': {
                    required: true,
                },
                'amount': {
                    required: true,
                },
                'description': {
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