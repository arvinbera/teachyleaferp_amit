<div class="content px-3">
    <div class="card" style="font: 'Garamond';">

        <p style="font-size: 24px; text-transform: uppercase; font-weight: bold; text-align: center;">teachyLeaf</p>

        <div class="card-body">
            <div class="row" style="border: 1px solid #ccc; padding: 20px; position: relative;">

                @php

                // $date = date('Y-m', strtotime($attendance_group_by_id[0]->date));
                if ($date != '') {
                $where[] = ['date', 'like', $date . '%'];
                }
                $total_attendance = App\Models\EmployeeAttendances::with('employee')->where($where)->where('employee_id', $attendance_group_by_id[0]->employee_id)->get();
                $absent_count = count($total_attendance->where('attendance_status', 'Absent'));

                $salary = (float) $attendance_group_by_id[0]['employee']['salary'];
                $salary_per_day = (float) $salary / 30;
                $final_salary = (float) $salary - ((float) $absent_count * (float) $salary_per_day);

                @endphp

                <div class="form-group" style="position: absolute; right: 30px; top: 30px;">
                    <img src="./images/profile_photos/{{$attendance_group_by_id[0]['employee']['profile_photo']}}" style="height: 120px; width: 100px; padding: 10px; border: 1px solid #ccc;" />
                </div>

                <!-- Id No Field -->
                <div class="col-sm-12" style="font: 'Courier New';">
                    {!! Form::label('id_no', 'ID:') !!}
                    <span style="color: blue;">{{ $attendance_group_by_id[0]['employee']['id_no'] }}</span>
                    <p style="margin-top: 0; padding-top: 0;">______________________________</p>
                </div>

                <!-- Name Field -->
                <div class="col-sm-12">
                    {!! Form::label('name', 'Name:') !!}
                    <span style="color: blue;">{{ $attendance_group_by_id[0]['employee']['name'] }}</span>
                </div>
                <br>

                <!-- Basic Salary Field -->
                <div class="col-sm-12">
                    {!! Form::label('basic_salary', 'Basic Salary:') !!}
                    <span style="color: blue;">{{ $attendance_group_by_id[0]['employee']['salary'] }}</span>
                </div>
                <br>

                <!-- Absent Count Field -->
                <div class="col-sm-12">
                    {!! Form::label('absent_count', 'Absents (in Days):') !!}
                    <span style="color: blue;">{{ $absent_count }}</span>
                </div>
                <br>

                <!-- Month Field -->
                <div class="col-sm-12">
                    {!! Form::label('month', 'Month:') !!}
                    <span style="color: blue;">{{ date('M, Y', strtotime($date)) }}</span>
                </div>
                <br>

                <!-- Salary for this Month Field -->
                <div class="col-sm-12">
                    {!! Form::label('salary_for_this_month', 'Salary for this Month:') !!}
                    <span style="color: blue;">{{ $final_salary }}</span>
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