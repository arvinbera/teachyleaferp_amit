<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\OtherExpenses;
use App\Models\Salary;
use Illuminate\Http\Request;
use PDF;

class ProfitMonthly extends Controller
{
    public function index()
    {
        return view('profit_monthly.index');
    }

    public function calc(Request $request)
    {
        $start_date = date('Y-m', strtotime($request->start_date));
        $end_date = date('Y-m', strtotime($request->end_date));
        $s_date = date('Y-m-d', strtotime($request->start_date));
        $e_date = date('Y-m-d', strtotime($request->end_date));

        $student_fees = Fees::whereBetween('date', [$start_date, $end_date])->sum('amount');
        $employee_salary = Salary::whereBetween('date', [$start_date, $end_date])->sum('amount');
        $other_expenses = OtherExpenses::whereBetween('date', [$s_date, $e_date])->sum('amount');

        $total_expenses = $employee_salary + $other_expenses;
        $profit = $student_fees - $total_expenses;

        $html['thsource'] = '<th>Student Fees</th>';
        $html['thsource'] .= '<th>Employee Salary</th>';
        $html['thsource'] .= '<th>Other Expenses</th>';
        $html['thsource'] .= '<th>Total Expenses</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Action</th>';

        $color = 'success';
        $html['tdsource'] = '<td>' . $student_fees . '</td>';
        $html['tdsource'] .= '<td>' . $employee_salary . '</td>';
        $html['tdsource'] .= '<td>' . $other_expenses . '</td>';
        $html['tdsource'] .= '<td>' . $total_expenses . '</td>';
        $html['tdsource'] .= '<td>' . $profit . '</td>';

        $html['tdsource'] .= '<td>';
        $html['tdsource'] .= '<a class="btn btn-' . $color . '" title="Report" target="_blank" href=' . route("profitMonthly_report") . '?start_date=' . $s_date . '&end_date=' . $e_date  . '><i class="fa fa-file"></i></a>';
        $html['tdsource'] .= '</td>';

        return response()->json(@$html);
    }

    public function report(Request $request)
    {
        $data['start_date'] = date('Y-m', strtotime($request->start_date));
        $data['end_date'] = date('Y-m', strtotime($request->end_date));
        $data['s_date'] = date('Y-m-d', strtotime($request->start_date));
        $data['e_date'] = date('Y-m-d', strtotime($request->end_date));

        $pdf = PDF::loadView('profit_monthly.report', $data);
        return $pdf->stream('document.pdf');
    }
}
