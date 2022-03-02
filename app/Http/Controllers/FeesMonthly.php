<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\FeesAmounts;
use App\Models\Sessions;
use App\Models\StudentAssignings;
use Illuminate\Http\Request;
use PDF;

class FeesMonthly extends Controller
{
    public function index(Request $request)
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();

        return view('student_fees_monthly.index', $data);
    }
    public function filter(Request $request)
    {
        $session_id = $request->session_id;
        $class_id = $request->class_id;
        if ($session_id != '') {
            $where[] = ['session_id', 'like', $session_id . '%'];
        }
        if ($class_id != '') {
            $where[] = ['class_id', 'like', $class_id . '%'];
        }

        $students = StudentAssignings::with(['feewaive'])->where($where)->get();

        $html['thsource'] = '<th>Sl.</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Id No</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Monthly Fees</th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Final Fees</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($students as $key => $value) {
            $fees_monthly = FeesAmounts::where('fees_category_id', 2)->where('class_id', $value->class_id)->get()->first();
            $color = 'success';
            $html[$key]['tdsource'] = '<td>' . $key . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['student']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->roll_no . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $fees_monthly->amount . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['feewaive']['discount'] . '</td>';

            $actual_fees = $fees_monthly->amount;
            $discount = $value['feewaive']['discount'];
            $final_fees = (int)$actual_fees - (int)($discount / 100 * $actual_fees);
            $html[$key]['tdsource'] .= '<td>' . $final_fees . '</td>';

            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-' . $color . '" title="Fees Payment Slip" target="_blank" href=' . route("studentFeePayslip2") . '?class_id=' . $value->class_id . '&student_id=' . $value->student_id . '&month=' . $request->month . '>Fees Payment Slip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    }

    public function payslip(Request $request)
    {
        $student_id = $request->student_id;
        $class_id = $request->class_id;

        $data['student'] = StudentAssignings::with(['student', 'feewaive'])->where('student_id', $student_id)->where('class_id', $class_id)->first();
        $data['month'] = $request->month;

        $pdf = PDF::loadView('student_fees_monthly.payslip', $data);
        return $pdf->stream('document.pdf');
    }
}
