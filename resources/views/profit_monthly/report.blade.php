<div class="content px-3">
    <div class="card" style="font: 'Garamond';">

        <p style="font-size: 24px; text-transform: uppercase; font-weight: bold; text-align: center;">teachyLeaf</p>

        <div class="card-body">
            <div class="row" style="border: 1px solid #ccc; padding: 20px; position: relative;">

                @php

                $student_fees = App\Models\Fees::whereBetween('date', [$start_date, $end_date])->sum('amount');
                $employee_salary = App\Models\Salary::whereBetween('date', [$start_date, $end_date])->sum('amount');
                $other_expenses = App\Models\OtherExpenses::whereBetween('date', [$s_date, $e_date])->sum('amount');

                $total_expenses = $employee_salary + $other_expenses;
                $profit = $student_fees - $total_expenses;

                @endphp

                <div class="col-sm-12" style="font: 'Courier New';">
                    {!! Form::label('duration', 'Duration:') !!}
                    <span style="color: blue;">{{ date('d-m-Y', strtotime($start_date)) }} to {{ date('d-m-Y', strtotime($end_date)) }}</span>
                    <p style="margin-top: 0; padding-top: 0;">______________________________</p>
                </div>

                <div class="col-sm-12">
                    {!! Form::label('student_fees', 'Student Fees:') !!}
                    <span style="color: blue;">{{ $student_fees }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('employee_salary', 'Employee Salary:') !!}
                    <span style="color: blue;">{{ $employee_salary }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('other_expenses', 'Other Expenses:') !!}
                    <span style="color: blue;">{{ $other_expenses }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('total_expenses', 'Total Expenses:') !!}
                    <span style="color: blue;">{{ $total_expenses }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('profit', 'Profit/Loss:') !!}
                    <span style="color: blue;">{{ $profit }}</span>
                </div>
                <br>

            </div>

            <p style="font-size: 10px; font-style: italic;">Printed on: {{date('d M, Y')}}</p>

            <div style="float: right;">
                <br><br>
                ______________________________
                <br>
                <p>Cashier's Signature</p>
            </div>
        </div>
    </div>

    <br style="clear:both;">
    <br>
    <hr style="border: dashed;">
</div>