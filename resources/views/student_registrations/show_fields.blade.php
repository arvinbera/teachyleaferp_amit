<div class="content px-3">
    <div class="card" style="font: 'Garamond';">

        <p style="font-size: 28px; text-transform: uppercase; font-weight: bold; text-align: center;">teachyLeaf</p>

        <div class="card-body">
            <div class="row" style="border: 1px solid #ccc; padding: 20px; position: relative;">

                <div class="form-group" style="position: absolute; right: 30px; top: 30px;">
                    <img src="./images/profile_photos/{{$studentRegistrations['student']['profile_photo']}}" style="height: 120px; width: 100px; padding: 10px; border: 1px solid #ccc;" />
                </div>

                <!-- Id No Field -->
                <div class="col-sm-12" style="font: 'Courier New';">
                    {!! Form::label('id_no', 'ID:') !!}
                    <span style="color: blue;">{{ $studentRegistrations['student']['id_no'] }}</span>
                    <p style="margin-top: 0; padding-top: 0;">______________________________</p>
                </div>

                <!-- Name Field -->
                <div class="col-sm-12">
                    {!! Form::label('name', 'Name:') !!}
                    <span style="color: blue;">{{ $studentRegistrations['student']['name'] }}</span>
                </div>
                <br>

                <div class="row">
                    <!-- Email Field -->
                    <div class="col-sm-6">
                        {!! Form::label('email', 'Email:') !!}
                        <span style="color: blue;">{{ $studentRegistrations['student']['email'] }}</span>
                    </div>
                    <br>

                    <!-- Phone Field -->
                    <div class="col-sm-6">
                        {!! Form::label('phone', 'Phone:') !!}
                        <span style="color: blue;">{{ $studentRegistrations['student']['phone'] }}</span>
                    </div>
                    <br>
                </div>

                <!-- Father Name Field -->
                <div class="col-sm-12">
                    {!! Form::label('father_name', "Father's Name:") !!}
                    <span style="color: blue;">{{ $studentRegistrations['student']['father_name'] }}</span>
                </div>
                <br>

                <!-- Father Phone Field -->
                <div class="col-sm-12">
                    {!! Form::label('father_phone', "Father's Phone:") !!}
                    <span style="color: blue;">{{ $studentRegistrations['student']['father_phone'] }}</span>
                </div>
                <br>

                <!-- Mother Name Field -->
                <div class="col-sm-12">
                    {!! Form::label('mother_name', "Mother's Name:") !!}
                    <span style="color: blue;">{{ $studentRegistrations['student']['mother_name'] }}</span>
                </div>
                <br>

                <!-- Address Current Field -->
                <div class="col-sm-12">
                    {!! Form::label('address_current', 'Address:') !!}
                    <p style="color: blue;">{{ $studentRegistrations['student']['address_current'] }}</p>
                </div>

                <!-- Religion Field -->
                <div class="col-sm-4">
                    {!! Form::label('religion', 'Religion:') !!}
                    <span style="color: blue;">{{ $studentRegistrations['student']['religion'] }}</span>
                </div>
                <br>

                <!-- Dob Field -->
                <div class="col-sm-4">
                    {!! Form::label('dob', 'Date of Birth:') !!}
                    <span style="color: blue;">{{ $studentRegistrations['student']['dob'] }}</span>
                </div>
                <br>

            </div>

            <div style="float: right;">
                <br><br>
                ______________________________
                <br>
                <p>Principal's Signature</p>
            </div>
        </div>
    </div>
</div>