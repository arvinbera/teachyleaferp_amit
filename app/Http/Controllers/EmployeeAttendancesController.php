<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeAttendancesRequest;
use App\Http\Requests\UpdateEmployeeAttendancesRequest;
use App\Repositories\EmployeeAttendancesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\EmployeeAttendances;
use App\Models\Users;
use Illuminate\Http\Request;
use Flash;
use Response;

class EmployeeAttendancesController extends AppBaseController
{
    /** @var  EmployeeAttendancesRepository */
    private $employeeAttendancesRepository;

    public function __construct(EmployeeAttendancesRepository $employeeAttendancesRepo)
    {
        $this->employeeAttendancesRepository = $employeeAttendancesRepo;
    }

    /**
     * Display a listing of the EmployeeAttendances.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $employeeAttendances = $this->employeeAttendancesRepository->all();
        $data['employeeAttendances'] = EmployeeAttendances::select('date')->groupBy('date')->orderBy('id', 'desc')->get();

        return view('employee_attendances.index', $data);
        // ->with('employeeAttendances', $employeeAttendances);
    }

    /**
     * Show the form for creating a new EmployeeAttendances.
     *
     * @return Response
     */
    public function create()
    {
        $data['employees'] = Users::where('user_type', 'employees')->get();
        return view('employee_attendances.create', $data);
    }

    /**
     * Store a newly created EmployeeAttendances in storage.
     *
     * @param CreateEmployeeAttendancesRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        EmployeeAttendances::where('date', date('Y-m-d', strtotime($request->date)))->delete();

        $countEmployees = count($request->employee_id);
        for ($i = 0; $i < $countEmployees; $i++) {
            $attendance_status = 'attendance_status' . $i;
            $attendance = new EmployeeAttendances;
            $attendance->date = date('Y-m-d', strtotime($request->date));
            $attendance->employee_id = $request->employee_id[$i];
            $attendance->attendance_status = $request->$attendance_status;
            $attendance->save();
        }

        Flash::success('Employee Attendances saved successfully.');

        return redirect(route('employeeAttendances.index'));
    }

    /**
     * Display the specified EmployeeAttendances.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $employeeAttendances = $this->employeeAttendancesRepository->find($id);

    //     if (empty($employeeAttendances)) {
    //         Flash::error('Employee Attendances not found');

    //         return redirect(route('employeeAttendances.index'));
    //     }

    //     return view('employee_attendances.show')->with('employeeAttendances', $employeeAttendances);
    // }
    public function employee_attendances_show($date)
    {
        $data['employeeAttendances'] = EmployeeAttendances::where('date', $date)->get();
        $data['employees'] = Users::where('user_type', 'employees')->get();

        return view('employee_attendances.show', $data);
    }

    /**
     * Show the form for editing the specified EmployeeAttendances.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $employeeAttendances = $this->employeeAttendancesRepository->find($id);

    //     if (empty($employeeAttendances)) {
    //         Flash::error('Employee Attendances not found');

    //         return redirect(route('employeeAttendances.index'));
    //     }

    //     return view('employee_attendances.edit')->with('employeeAttendances', $employeeAttendances);
    // }
    public function employee_attendances_edit($date)
    {
        $data['employeeAttendances'] = EmployeeAttendances::where('date', $date)->get();
        $data['employees'] = Users::where('user_type', 'employees')->get();

        return view('employee_attendances.edit', $data);
    }

    /**
     * Update the specified EmployeeAttendances in storage.
     *
     * @param int $id
     * @param UpdateEmployeeAttendancesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeAttendancesRequest $request)
    {
        $employeeAttendances = $this->employeeAttendancesRepository->find($id);

        if (empty($employeeAttendances)) {
            Flash::error('Employee Attendances not found');

            return redirect(route('employeeAttendances.index'));
        }

        $employeeAttendances = $this->employeeAttendancesRepository->update($request->all(), $id);

        Flash::success('Employee Attendances updated successfully.');

        return redirect(route('employeeAttendances.index'));
    }

    /**
     * Remove the specified EmployeeAttendances from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employeeAttendances = $this->employeeAttendancesRepository->find($id);

        if (empty($employeeAttendances)) {
            Flash::error('Employee Attendances not found');

            return redirect(route('employeeAttendances.index'));
        }

        $this->employeeAttendancesRepository->delete($id);

        Flash::success('Employee Attendances deleted successfully.');

        return redirect(route('employeeAttendances.index'));
    }
}
