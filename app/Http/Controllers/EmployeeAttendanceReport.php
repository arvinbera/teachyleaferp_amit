<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAttendances;
use App\Models\Users;
use Illuminate\Http\Request;
use PDF;

class EmployeeAttendanceReport extends Controller
{
    public function index()
    {
        $data['employees'] = Users::where('user_type', 'employees')->get();
        return view('employee_attendance_report.index', $data);
    }

    public function filter(Request $request)
    {
        $employee_id = $request->employee_id;
        if ($employee_id != '') {
            $where[] = ['employee_id', $employee_id];
        }
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $attendance = EmployeeAttendances::with(['employee'])->where($where)->first();
        if ($attendance == true) {
            $data['employee'] = EmployeeAttendances::with(['employee'])->where($where)->get();
            $data['absents'] = EmployeeAttendances::with(['employee'])->where($where)->where('attendance_status', 'Absent')->get()->count();
            $data['on_leaves'] = EmployeeAttendances::with(['employee'])->where($where)->where('attendance_status', 'On_Leave')->get()->count();
            $data['month'] = date('M-Y', strtotime($request->date));

            $pdf = PDF::loadView('employee_attendance_report.report', $data);
            return $pdf->stream('document.pdf');
        } else {
            Flash::error('Employee not found.');
            return redirect()->back();
        }
    }
}
