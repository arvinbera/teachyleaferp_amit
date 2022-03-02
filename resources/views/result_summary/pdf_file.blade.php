<div class="content px-3">
    <div class="card" style="font: 'Garamond';">

        <p style="font-size: 24px; text-transform: uppercase; font-weight: bold; text-align: center;">teachyLeaf</p>

        <div class="card-body">
            <div class="row" style="border: 1px solid #ccc; padding: 20px; position: relative;">

                <div class="form-group" style="position: absolute; right: 30px; top: 30px;">
                    <img src="./images/logo.png" style="height: 100px; width: 100px; padding: 10px; border: 1px solid #ccc;" />
                </div>

                <div class="col-sm-12" style="font: 'Courier New';">
                    {!! Form::label('exam_type', 'Exam Type:') !!}
                    <span style="color: blue;">{{ $result[0]['exam_type']['name'] }}</span>
                    <p style="margin-top: 0; padding-top: 0;">______________________________</p>
                </div>

                <div class="col-sm-12">
                    {!! Form::label('session', 'Session:') !!}
                    <span style="color: blue;">{{ $result[0]['session']['name'] }}</span>
                </div>
                <br>

                <div class="col-sm-12">
                    {!! Form::label('class', 'Class:') !!}
                    <span style="color: blue;">{{ $result[0]['class']['name'] }}</span>
                </div>
                <br>
                <br>

                <div class="col-sm-12">
                    <table style="width: 100%; border: 1px dashed #ccc;">
                        <tr style="border-bottom: 1px dashed #ccc; margin: 5px">
                            <th align="left" style="border-bottom: 1px dashed #ccc; margin: 5px">Sl.</th>
                            <th align="left" style="border-bottom: 1px dashed #ccc; margin: 5px">Student Name</th>
                            <th align="left" style="border-bottom: 1px dashed #ccc; margin: 5px">Id No</th>
                            <th align="left" style="border-bottom: 1px dashed #ccc; margin: 5px">Grade</th>
                            <th align="left" style="border-bottom: 1px dashed #ccc; margin: 5px">Grade Point</th>
                            <th align="left" style="border-bottom: 1px dashed #ccc; margin: 5px">Remarks</th>
                        </tr>
                        @foreach($result as $key => $result)

                        @php
                        $marks = App\Models\Marks::where('session_id', $result->session_id)->where('class_id', $result->class_id)->where('exam_type_id', $result->exam_type_id)->where('student_id', $result->student_id)->get();
                        $total_full_marks = 0;
                        $total_marks = 0;
                        $total_point = 0;
                        foreach($marks as $mark) {
                        $student_marks = $mark->marks;
                        $grades = App\Models\Grades::where([['start_marks', '<=', (int)$student_marks], ['end_marks', '>=' , (int)$student_marks]])->first();
                            $grade_name = $grades->grade_name;
                            $grade_point = number_format((float)$grades->grade_point, 2);
                            $total_point = (float)$total_point + (float)$grade_point;
                            $total_full_marks = (float)$total_full_marks + (float)$mark['subject_assigning']['full_marks'];
                            $total_marks = (float)$total_marks + (float)$mark['marks'];
                            $total_subjects = App\Models\Marks::where('session_id', $mark->session_id)->where('class_id', $mark->class_id)->where('exam_type_id', $mark->exam_type_id)->where('student_id', $mark->student_id)->get()->count();
                            }
                            @endphp

                            <tr style="border-bottom: 1px dashed #ccc; margin: 5px">
                                <td style="border-bottom: 1px dashed #ccc; margin: 5px">{{ $key+1 }}</td>
                                <td style="border-bottom: 1px dashed #ccc; margin: 5px">{{ $result['student']['name'] }}</td>
                                <td style="border-bottom: 1px dashed #ccc; margin: 5px">{{ $result['student']['id_no'] }}</td>
                                <td style="border-bottom: 1px dashed #ccc; margin: 5px">{{ $grade_name }}</td>
                                <td style="border-bottom: 1px dashed #ccc; margin: 5px">{{ $grade_point }}</td>
                                <td style="border-bottom: 1px dashed #ccc; margin: 5px">{{ $grades->remarks }}</td>
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
</div>