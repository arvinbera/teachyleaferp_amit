<div class="card-body">
    <div class="card-body" style="border: 1px solid #ccc; border-radius: 10px;">

        <table class="table table-sm table-borderless">
            <thead>
                <tr>
                    <th colspan="4" style="text-align: center;">
                        <h1 style="text-transform: uppercase;">Holy Child School</h1>
                        <p style="font-weight: normal;">Jewdhara, Kalna, Purba Bardhaman</p>
                    </th>
                </tr>
            </thead>
            <!-- <img src="/images/logo.png" height="100px" width="100px" style="position: absolute; top: 30px; left: 100px;" /> -->
            @php
            $student_assigning = App\Models\StudentAssignings::where('session_id', $marks[0]['session_id'])->where('class_id', $marks[0]['class_id'])->first()
            @endphp
            <tbody>
                <tr>
                    <td colspan="4"><b>NAME: </b>{{ $marks[0]['student']['name'] }}</td>
                </tr>
                <tr>
                    <td><b>STUDENT ID: </b>{{ $marks[0]['id_no'] }}</td>
                    <td><b>CLASS: </b>{{ $marks[0]['class']['name'] }}</td>
                    <td><b>SECTION: </b>{{ isset($marks[0]['section']['name']) ? $marks[0]['section']['name'] : '' }}</td>
                    <td><b>ROLL NO: </b>{{ $student_assigning['roll_no'] }}</td>
                </tr>
                <tr>
                    <td colspan="1"><b>HOUSE: </b></td>
                    <td colspan="2"><b>SCHOLASTIC YEAR: </b></td>
                </tr>
            </tbody>
        </table>

        <br>
        <p style="text-align: center; text-decoration: underline;">ACADEMIC ACHIEVEMENT</p>

        <div class="row">


            <table class="table table-sm table-bordered col-4">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Subjects Details</th>
                    </tr>

                    @foreach($marks as $key => $mark)
                    <tr>
                        <td>{{ $mark['subject_assigning']['subject']['name'] }}</td>
                    </tr>
                    @endforeach

                    <tr></tr>
                    <tr>
                        <th>Total</th>
                    </tr>

                </tbody>
            </table>
            <table class="table table-sm table-bordered col-4">
                <thead>
                    <tr>
                        <th colspan="4" style="text-align: center;">
                            <?php
                            if (isset($marks['0']['exam_type']['name'])) {
                                echo $marks['0']['exam_type']['name'];
                            } else {
                                echo '';
                            }
                            ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center; font-weight: bold;">Full Marks</td>
                        <td style="text-align: center; font-weight: bold;">Marks</td>
                        <td style="text-align: center; font-weight: bold;">Grade Point</td>
                        <td style="text-align: center; font-weight: bold;">Grade</td>
                    </tr>

                    @php
                    $total_full_marks = 0;
                    $total_marks = 0;
                    $total_point = 0;
                    @endphp

                    @foreach($marks as $key => $mark)
                    <tr>
                        <td style="text-align: center;">{{ $mark['subject_assigning']['full_marks'] }}</td>
                        <td style="text-align: center;">{{ $mark['marks'] }}</td>

                        @php
                        $grades = App\Models\Grades::where([['start_marks', '<=', (int)$mark['marks']], ['end_marks', '>=' , (int)$mark['marks']]])->first();
                            $grade_name = $grades->grade_name;
                            $grade_point = number_format((float)$grades->grade_point, 2);
                            $total_point = (float)$total_point + (float)$grade_point;

                            $total_full_marks = (float)$total_full_marks + (float)$mark['subject_assigning']['full_marks'];
                            $total_marks = (float)$total_marks + (float)$mark['marks'];

                            $total_subjects = App\Models\Marks::where('session_id', $mark->session_id)->where('class_id', $mark->class_id)->where('exam_type_id', $mark->exam_type_id)->where('student_id', $mark->student_id)->get()->count();
                            @endphp

                            <td style="text-align: center;">{{ $grade_point }}</td>
                            <td style="text-align: center;">{{ $grade_name }}</td>
                    </tr>
                    @endforeach

                    <tr></tr>
                    <tr>
                        <td style="text-align: center; font-weight: bold; padding-left: 4.8px;">{{ $total_full_marks}}</td>
                        <td style="text-align: center; font-weight: bold;">{{ $total_marks}}</td>
                        <td style="text-align: center; font-weight: bold;">CGPA: {{ $cgpa = number_format((float) ($total_point / $total_subjects), 2)}}</td>
                        <td style="text-align: center; font-weight: bold;">
                            @php
                            $avg_grade = App\Models\Grades::where([['start_point', '<=', (int)$cgpa - 0.1], ['end_point', '>=' , (int)$cgpa - 0.1]])->first();
                                echo $avg_grade = $avg_grade->grade_name;
                                @endphp
                        </td>
                    </tr>

                </tbody>
            </table>
            <table class="table table-sm table-bordered col-4">
                <thead>
                    <tr>
                        <th colspan="4" style="text-align: center;">
                            <?php
                            if (isset($marks2['0']['exam_type']['name'])) {
                                echo $marks2['0']['exam_type']['name'];
                            } else {
                                echo '';
                            }
                            ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: center; font-weight: bold;">Full Marks</td>
                        <td style="text-align: center; font-weight: bold;">Marks</td>
                        <td style="text-align: center; font-weight: bold;">Grade Point</td>
                        <td style="text-align: center; font-weight: bold;">Grade</td>
                    </tr>

                    @php
                    $total_full_marks = 0;
                    $total_marks = 0;
                    $total_point = 0;
                    @endphp

                    @foreach($marks2 as $key => $mark)
                    <tr>
                        <td style="text-align: center;">{{ $mark['subject_assigning']['full_marks'] }}</td>
                        <td style="text-align: center;">{{ $mark['marks'] }}</td>

                        @php
                        $grades = App\Models\Grades::where([['start_marks', '<=', (int)$mark['marks']], ['end_marks', '>=' , (int)$mark['marks']]])->first();
                            $grade_name = $grades->grade_name;
                            $grade_point = number_format((float)$grades->grade_point, 2);
                            $total_point = (float)$total_point + (float)$grade_point;

                            $total_full_marks = (float)$total_full_marks + (float)$mark['subject_assigning']['full_marks'];
                            $total_marks = (float)$total_marks + (float)$mark['marks'];

                            $total_subjects = App\Models\Marks::where('session_id', $mark->session_id)->where('class_id', $mark->class_id)->where('exam_type_id', $mark->exam_type_id)->where('student_id', $mark->student_id)->get()->count();
                            @endphp

                            <td style="text-align: center;">{{ $grade_point }}</td>
                            <td style="text-align: center;">{{ $grade_name }}</td>
                    </tr>
                    @endforeach

                    <tr></tr>
                    <tr>
                        <td style="text-align: center; font-weight: bold; padding-left: 4.8px;">{{ $total_full_marks}}</td>
                        <td style="text-align: center; font-weight: bold;">{{ $total_marks}}</td>
                        <td style="text-align: center; font-weight: bold;">CGPA: {{ $cgpa = number_format((float) ($total_point / $total_subjects), 2)}}</td>
                        <td style="text-align: center; font-weight: bold;">
                            @php
                            $avg_grade = App\Models\Grades::where([['start_point', '<=', (int)$cgpa - 0.1], ['end_point', '>=' , (int)$cgpa - 0.1]])->first();
                                echo $avg_grade = $avg_grade->grade_name;
                                @endphp
                        </td>
                    </tr>

                </tbody>
            </table>


        </div>

        <br><br>
        <div class="row">
            <div class="col-sm-4">
                <hr style="border: 1px solid; width: 60%; margin-bottom: -1px;" />
                <div class="text-center">Guardian's Signature</div>
            </div>
            <div class="col-sm-4">
                <hr style="border: 1px solid; width: 60%; margin-bottom: -1px;" />
                <div class="text-center">Teacher's Signature</div>
            </div>
            <div class="col-sm-4">
                <hr style="border: 1px solid; width: 60%; margin-bottom: -1px;" />
                <div class="text-center">Principal's Signature</div>
            </div>
        </div>

    </div>
</div>