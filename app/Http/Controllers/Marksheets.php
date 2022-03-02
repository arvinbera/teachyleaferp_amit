<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ExamTypes;
use App\Models\Grades;
use App\Models\Marks;
use App\Models\Sessions;
use App\Models\StudentAssignings;
use Illuminate\Http\Request;
use DB;
use Laracasts\Flash\Flash;

class Marksheets extends Controller
{
    public function index()
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();
        $data['exam_types'] = ExamTypes::all();
        $data['marks'] = Marks::all();

        return view('marksheets.index', $data);
    }

    public function marksheet_view(Request $request)
    {
        if ($request->exam_type_id != 'final') {
            $id_no = $request->id_no;
            $session_id = $request->session_id;
            $class_id = $request->class_id;
            $exam_type_id = $request->exam_type_id;

            $count = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->get()->count();

            if ($count != null) {
                $data['marks'] = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->get();
                $data['grades'] = Grades::all();
                return view('marksheets.view', $data);
            } else {
                Flash::error('Student Not Found.');
                return redirect()->back();
            }
        } else {
            $id_no = $request->id_no;
            $session_id = $request->session_id;
            $class_id = $request->class_id;

            $count = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', 1)->get()->count();
            $count2 = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', 2)->get()->count();

            if ($count != null && $count2 != null) {
                $data['marks'] = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', 1)->get();
                $data['marks2'] = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', 2)->get();

                $data['grades'] = Grades::all();
                return view('marksheets.view_final', $data);
            } else {
                Flash::error('Marksheet Generation Error.');
                return redirect()->back();
            }
        }
    }

    public function view_all()
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();
        $data['exam_types'] = ExamTypes::all();
        $data['marks'] = Marks::all();

        return view('marksheets_view_all.index', $data);
    }

    public function filter(Request $request)
    {
        $session_id = $request->session_id;
        $class_id = $request->class_id;
        if ($request->exam_type_id != 'final') {
            $exam_type_id = $request->exam_type_id;
        } else {
            $exam_type_id = 1;
        }
        if ($session_id != '') {
            $where[] = ['session_id', 'like', $session_id . '%'];
        }
        if ($class_id != '') {
            $where[] = ['class_id', 'like', $class_id . '%'];
        }
        if ($exam_type_id != '') {
            $where[] = ['exam_type_id', 'like', $exam_type_id . '%'];
        }

        $marks = Marks::with(['student', 'session', 'class'])->select('student_id')->where($where)->get();
        $marks = $marks->groupBy('student_id');

        $html['thsource'] = '<th>Sl.</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Id No</th>';
        $html['thsource'] .= '<th>Action</th>';

        $i = 1;
        foreach ($marks as $key => $value) {
            $color = 'success';
            $html[$key]['tdsource'] = '<td>' . $i . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value[0]['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value[0]['student']['id_no'] . '</td>';

            if ($request->exam_type_id != 'final') {
                $html[$key]['tdsource'] .= '<td>';
                $html[$key]['tdsource'] .= '<a class="btn btn-' . $color . '" title="View Marksheet" target="_blank" href="' . route("marksheet_filter_view") . '?exam_type_id=' . $exam_type_id . '&session_id=' . $session_id . '&class_id=' . $class_id . '&id_no=' . $value[0]['student']['id_no'] . '">View Marksheet</a>';
                $html[$key]['tdsource'] .= '</td>';
            } else {
                $html[$key]['tdsource'] .= '<td>';
                $html[$key]['tdsource'] .= '<a class="btn btn-' . $color . '" title="View Marksheet" target="_blank" href="' . route("marksheet_filter_view") . '?exam_type_id=' . 'final' . '&session_id=' . $session_id . '&class_id=' . $class_id . '&id_no=' . $value[0]['student']['id_no'] . '">View Marksheet</a>';
                $html[$key]['tdsource'] .= '</td>';
            }

            $i++;
        }
        return response()->json(@$html);
    }

    public function marksheet_filter_view(Request $request)
    {
        if ($request->exam_type_id != 'final') {
            $id_no = $request->id_no;
            $session_id = $request->session_id;
            $class_id = $request->class_id;
            $exam_type_id = $request->exam_type_id;

            $count = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->get()->count();

            if ($count != null) {
                $data['marks'] = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->get();
                $data['grades'] = Grades::all();
                return view('marksheets.view', $data);
            } else {
                Flash::error('Student Not Found.');
                return redirect()->back();
            }
        } else {
            $id_no = $request->id_no;
            $session_id = $request->session_id;
            $class_id = $request->class_id;

            $count = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', 1)->get()->count();
            $count2 = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', 2)->get()->count();

            if ($count != null && $count2 != null) {
                $data['marks'] = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', 1)->get();
                $data['marks2'] = Marks::with(['student', 'session', 'class', 'exam_type', 'subject_assigning'])->where('id_no', $id_no)->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', 2)->get();

                $data['grades'] = Grades::all();
                return view('marksheets.view_final', $data);
            } else {
                Flash::error('Marksheet Generation Error.');
                return redirect()->back();
            }
        }
    }
}
