<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ExamTypes;
use App\Models\Marks;
use App\Models\Sessions;
use Illuminate\Http\Request;
use PDF;

class ResultSummary extends Controller
{
    public function index()
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();
        $data['exam_types'] = ExamTypes::all();

        return view('result_summary.index', $data);
    }

    public function filter(Request $request)
    {
        $session_id = $request->session_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;

        $result = Marks::where('session_id', $session_id)->where('class_id', $class_id)->first();
        if ($result == true) {
            $data['result'] = Marks::select('session_id', 'class_id', 'exam_type_id', 'student_id')->where('session_id', $session_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->groupBy('session_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();

            $pdf = PDF::loadView('result_summary.pdf_file', $data);
            return $pdf->stream('document.pdf');
        } else {
            Flash::error('Result not found.');
            return redirect()->back();
        }
    }
}
