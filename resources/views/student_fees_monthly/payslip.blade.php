<div class="content px-3">
    <div class="card" style="font: 'Garamond';">

        <p style="font-size: 24px; text-transform: uppercase; font-weight: bold; text-align: center;">teachyLeaf</p>

        <div class="card-body">
            <div class="row" style="border: 1px solid #ccc; padding: 20px; position: relative;">

                @php

                $fees_registrations = App\Models\FeesAmounts::where('fees_category_id', 1)->where('class_id', $student->class_id)->first();
                $actual_fees = $fees_registrations->amount;
                $discount = $student['feewaive']['discount'];
                $final_fees = (int)$actual_fees - (int)($discount / 100 * $actual_fees);

                @endphp

                <div class="form-group" style="position: absolute; right: 30px; top: 30px;">
                    <img src="./images/profile_photos/{{$student['student']['profile_photo']}}" style="height: 120px; width: 100px; padding: 10px; border: 1px solid #ccc;" />
                </div>

                <!-- Id No Field -->
                <div class="col-sm-12" style="font: 'Courier New';">
                    {!! Form::label('id_no', 'ID:') !!}
                    <span style="color: blue;">{{ $student['student']['id_no'] }}</span>
                    <p style="margin-top: 0; padding-top: 0;">______________________________</p>
                </div>

                <!-- Name Field -->
                <div class="col-sm-12">
                    {!! Form::label('name', 'Name:') !!}
                    <span style="color: blue;">{{ $student['student']['name'] }}</span>
                </div>
                <br>

                <div class="row">
                    <!-- Email Field -->
                    <div class="col-sm-6">
                        {!! Form::label('roll_no', 'Roll_no:') !!}
                        <span style="color: blue;">{{ $student['student']['roll_no'] }}</span>
                    </div>
                    <br>
                </div>

                <div class="col-sm-12">
                    {!! Form::label('actual_fees', "Actual Fees:") !!}
                    <span style="color: blue;">{{ $actual_fees }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('discount', "Discount:") !!}
                    <span style="color: blue;">{{ $discount }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('final_fees', "Final Fees") !!} for {{$month}}:
                    <span style="color: blue;">{{ $final_fees }}</span>
                </div>

            </div>

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

    <div class="card" style="font: 'Garamond';">

        <p style="font-size: 24px; text-transform: uppercase; font-weight: bold; text-align: center;">teachyLeaf</p>

        <div class="card-body">
            <div class="row" style="border: 1px solid #ccc; padding: 20px; position: relative;">

                @php

                $fees_registrations = App\Models\FeesAmounts::where('fees_category_id', 1)->where('class_id', $student->class_id)->first();
                $actual_fees = $fees_registrations->amount;
                $discount = $student['feewaive']['discount'];
                $final_fees = (int)$actual_fees - (int)($discount / 100 * $actual_fees);

                @endphp

                <div class="form-group" style="position: absolute; right: 30px; top: 30px;">
                    <img src="./images/profile_photos/{{$student['student']['profile_photo']}}" style="height: 120px; width: 100px; padding: 10px; border: 1px solid #ccc;" />
                </div>

                <!-- Id No Field -->
                <div class="col-sm-12" style="font: 'Courier New';">
                    {!! Form::label('id_no', 'ID:') !!}
                    <span style="color: blue;">{{ $student['student']['id_no'] }}</span>
                    <p style="margin-top: 0; padding-top: 0;">______________________________</p>
                </div>

                <!-- Name Field -->
                <div class="col-sm-12">
                    {!! Form::label('name', 'Name:') !!}
                    <span style="color: blue;">{{ $student['student']['name'] }}</span>
                </div>
                <br>

                <div class="row">
                    <!-- Email Field -->
                    <div class="col-sm-6">
                        {!! Form::label('roll_no', 'Roll_no:') !!}
                        <span style="color: blue;">{{ $student['student']['roll_no'] }}</span>
                    </div>
                    <br>
                </div>

                <div class="col-sm-12">
                    {!! Form::label('actual_fees', "Actual Fees:") !!}
                    <span style="color: blue;">{{ $actual_fees }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('discount', "Discount:") !!}
                    <span style="color: blue;">{{ $discount }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('final_fees', "Final Fees") !!} for {{$month}}:
                    <span style="color: blue;">{{ $final_fees }}</span>
                </div>

            </div>

            <div style="float: right;">
                <br><br>
                ______________________________
                <br>
                <p>Cashier's Signature</p>
            </div>
        </div>
    </div>
</div>