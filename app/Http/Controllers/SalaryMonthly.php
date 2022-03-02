<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAttendances;
use Illuminate\Http\Request;
use PDF;

class SalaryMonthly extends Controller
{
    public function index(Request $request)
    {
        return view('salary_monthly.index');
    }

    public function filter(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $data = EmployeeAttendances::select('employee_id')->groupBy('employee_id')->with('employee')->where($where)->get();

        $html['thsource'] = '<th>Sl.</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Id No</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary (This Month)</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($data as $key => $value) {
            $total_attendance = EmployeeAttendances::with('employee')->where($where)->where('employee_id', $value->employee_id)->get();
            $absent_count = count($total_attendance->where('attendance_status', 'Absent'));
            $color = 'success';
            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['employee']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['employee']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['employee']['salary'] . '</td>';

            $salary = (float) $value['employee']['salary'];
            $salary_per_day = (float) $salary / 30;
            $final_salary = (float) $salary - ((float) $absent_count * (float) $salary_per_day);
            $html[$key]['tdsource'] .= '<td>' . $final_salary . '</td>';

            $html[$key]['tdsource'] .= '<td>';
            $html[$key]['tdsource'] .= '<a class="btn btn-' . $color . '" title="Payslip" target="_blank" href=' . route("salaryMonthlyPayslip", $value->employee_id) . '?date=' . $request->date  . '>Payslip</a>';
            $html[$key]['tdsource'] .= '</td>';
        }
        return response()->json(@$html);
    }

    public function payslip(Request $request, $employee_id)
    {
        $id = EmployeeAttendances::where('employee_id', $employee_id)->first();
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $data['date'] = $date;
        $data['attendance_group_by_id'] = EmployeeAttendances::with(['employee'])->where($where)->where('employee_id', $id->employee_id)->get();

        $pdf = PDF::loadView('salary_monthly.payslip', $data);
        return $pdf->stream('document.pdf');
    }
}
