<div class="content px-3">
    <div class="card" style="font: 'Garamond';">

        <p style="font-size: 24px; text-transform: uppercase; font-weight: bold; text-align: center;">teachyLeaf</p>

        <div class="card-body">
            <div class="row" style="border: 1px solid #ccc; padding: 20px; position: relative;">

                <div class="form-group" style="position: absolute; right: 30px; top: 30px;">
                    <img src="./images/profile_photos/{{$employee[0]['employee']['profile_photo']}}" style="height: 120px; width: 100px; padding: 10px; border: 1px solid #ccc;" />
                </div>

                <!-- Id No Field -->
                <div class="col-sm-12" style="font: 'Courier New';">
                    {!! Form::label('id_no', 'ID:') !!}
                    <span style="color: blue;">{{ $employee[0]['employee']['id_no'] }}</span>
                    <p style="margin-top: 0; padding-top: 0;">______________________________</p>
                </div>

                <!-- Name Field -->
                <div class="col-sm-12">
                    {!! Form::label('name', 'Name:') !!}
                    <span style="color: blue;">{{ $employee[0]['employee']['name'] }}</span>
                </div>
                <br>

                <!-- Month Field -->
                <div class="col-sm-12">
                    {!! Form::label('month', 'Month:') !!}
                    <span style="color: blue;">{{ $month }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('total_absents', 'Total Absents:') !!}
                    <span style="color: blue;">{{ $absents }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('total_on_leaves', 'Total Leaves:') !!}
                    <span style="color: blue;">{{ $on_leaves }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    <table style="width: 100%; border: 1px dashed #ccc;">
                        <tr style="border-bottom: 1px dashed #ccc; margin: 5px">
                            <th align="left" style="border-bottom: 1px dashed #ccc; margin: 5px">Date</th>
                            <th align="left" style="border-bottom: 1px dashed #ccc; margin: 5px">Attendance Status</th>
                        </tr>
                        @foreach($employee as $employee)
                        <tr style="border-bottom: 1px dashed #ccc; margin: 5px">
                            <td style="border-bottom: 1px dashed #ccc; margin: 5px">{{date('d-m-Y', strtotime($employee->date))}}</td>
                            <td style="border-bottom: 1px dashed #ccc; margin: 5px">{{$employee->attendance_status}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <br>

            </div>

            <p style="font-size: 10px; font-style: italic;">Printed on: {{date('d M, Y')}}</p>

            <div style="float: right;">
                <br><br>
                ______________________________
                <br>
                <p>Principal's Signature</p>
            </div>
        </div>
    </div>

    <br style="clear:both;">
    <br>
    <hr style="border: dashed;">
</div>