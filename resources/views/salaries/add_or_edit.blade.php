@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Salaries | Add / Edit</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">

                <div class="card-body">
                    <div class="row">

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
                            <a class="btn btn-primary" name="search" id="search" style="margin-top: 32px;">Search</a>
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div id="document_result"></div>
                    <script type="text/javascript" src="/js/handlebars.min-v4.7.7.js"></script>
                    <script id="document_template" type="text/x-handlebars-template">
                        <form method="POST" action="{{route('salaryStore')}}">
                        @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        @{{{thsource}}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @{{#each this}}
                                    <tr>
                                        @{{{tdsource}}}
                                    </tr>
                                    @{{/each}}
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-success" style="margin-top: 32px;">Save Salary Disbursement &nbsp;&nbsp; <i class="fas fa-save"></i></button>
                        </script>
                </div>
                </form>
            </div>

            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('page_scripts')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script type="text/javascript" src="/js/notify.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var date = $('#date').val()
        $('.notifyjs-corner').html('')

        if (date == '') {
            $.notify('Date requiered...', {
                globalPosition: 'top-right',
                className: 'error'
            })
            return false
        }

        $.ajax({
            url: "{{route('salary_filter')}}",
            type: 'GET',
            data: {
                'date': date,
            },
            beforeSend: function() {

            },
            success: function(data) {
                var source = $('#document_template').html()
                var template = Handlebars.compile(source)
                var html = template(data)
                $('#document_result').html(html)
                $('[data-toggle="tooltip"]').tooltip()
            },
        })
    })
</script>
@endpush