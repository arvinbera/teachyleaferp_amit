<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRegistrationsRequest;
use App\Http\Requests\UpdateEmployeeRegistrationsRequest;
use App\Repositories\EmployeeRegistrationsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Designations;
use App\Models\SalaryLogs;
use App\Models\Users;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use PDF;

class EmployeeRegistrationsController extends AppBaseController
{
    /** @var  EmployeeRegistrationsRepository */
    private $employeeRegistrationsRepository;

    public function __construct(EmployeeRegistrationsRepository $employeeRegistrationsRepo)
    {
        $this->employeeRegistrationsRepository = $employeeRegistrationsRepo;
    }

    /**
     * Display a listing of the EmployeeRegistrations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $employeeRegistrations = $this->employeeRegistrationsRepository->all();

        // return view('employee_registrations.index')
        //     ->with('employeeRegistrations', $employeeRegistrations);

        $data['employeeRegistrations'] = Users::with(['designation'])->where('user_type', 'employees')->get();

        return view('employee_registrations.index', $data);
    }

    /**
     * Show the form for creating a new EmployeeRegistrations.
     *
     * @return Response
     */
    public function create()
    {
        $data['designations'] = Designations::all();

        return view('employee_registrations.create', $data);
    }

    /**
     * Store a newly created EmployeeRegistrations in storage.
     *
     * @param CreateEmployeeRegistrationsRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRegistrationsRequest $request)
    {
        DB::transaction(function () use ($request) {
            $session = 'e' . date('Y', strtotime($request->joining_date));
            $employee = Users::where('user_type', 'employees')->orderBy('id', 'desc')->first();
            if ($employee == null) {
                $id_no = '/0001';
            } else {
                $employee_id = Users::where('user_type', 'employees')->orderBy('id', 'desc')->first()->id;
                $employee_id = $employee_id + 1;
                if ($employee_id < 10) {
                    $id_no = '/000' . $employee_id;
                } else if ($employee_id < 100) {
                    $id_no = '/00' . $employee_id;
                } else if ($employee_id < 1000) {
                    $id_no = '/0' . $employee_id;
                } else {
                    $id_no = '/' . $employee_id;
                }
            }
            $final_id_no = $session . $id_no;
            $random_number = rand(1000, 9999);

            $users = new Users();
            $users->user_type = 'employees';
            $users->id_no = $final_id_no;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->dob = date('Y-m-d', strtotime($request->dob));
            $users->gender = $request->gender;
            $users->religion = $request->religion;
            $users->father_name = $request->father_name;
            $users->father_phone = $request->father_phone;
            $users->mother_name = $request->mother_name;
            $users->address_current = $request->address_current;
            $users->address_permanent = $request->address_permanent;
            $users->joining_date = $request->joining_date;
            $users->salary = $request->salary;
            $users->designation_id = $request->designation_id;
            $users->status = 1;

            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = md5(rand(1111, 9999)) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/profile_photos'), $image_name);
                $users->profile_photo = $image_name;
            }
            $users->password = bcrypt($random_number);
            $users->generated_password = $random_number;
            $users->save();

            $salary_logs = new SalaryLogs();
            $salary_logs->employee_id = $users->id;
            $salary_logs->present_salary = $request->salary;
            $salary_logs->previous_salary = $request->salary;
            $salary_logs->increment = 0;
            $salary_logs->effective_from = $request->effective_from;
            $salary_logs->save();
        });

        Flash::success('Employee Registrations saved successfully.');

        return redirect(route('employeeRegistrations.index'));
    }

    /**
     * Display the specified EmployeeRegistrations.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $employeeRegistrations = $this->employeeRegistrationsRepository->find($id);

    //     if (empty($employeeRegistrations)) {
    //         Flash::error('Employee Registrations not found');

    //         return redirect(route('employeeRegistrations.index'));
    //     }

    //     return view('employee_registrations.show')->with('employeeRegistrations', $employeeRegistrations);
    // }
    public function show($id)
    {
        $data['employeeRegistrations'] = Users::with(['designation'])->where('id', $id)->first();

        $pdf = PDF::loadView('employee_registrations.show_fields', $data);
        return $pdf->stream('document.pdf');
    }

    /**
     * Show the form for editing the specified EmployeeRegistrations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data['designations'] = Designations::all();

        $employeeRegistrations = $this->employeeRegistrationsRepository->find($id);

        if (empty($employeeRegistrations)) {
            Flash::error('Employee Registrations not found');

            return redirect(route('employeeRegistrations.index'));
        }

        return view('employee_registrations.edit', $data)->with('employeeRegistrations', $employeeRegistrations);
    }

    /**
     * Update the specified EmployeeRegistrations in storage.
     *
     * @param int $id
     * @param UpdateEmployeeRegistrationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRegistrationsRequest $request)
    {
        // $employeeRegistrations = $this->employeeRegistrationsRepository->find($id);

        // if (empty($employeeRegistrations)) {
        //     Flash::error('Employee Registrations not found');

        //     return redirect(route('employeeRegistrations.index'));
        // }

        // $employeeRegistrations = $this->employeeRegistrationsRepository->update($request->all(), $id);

        DB::transaction(function () use ($request, $id) {
            $users = Users::where('id', $id)->first();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->dob = date('Y-m-d', strtotime($request->dob));
            $users->gender = $request->gender;
            $users->religion = $request->religion;
            $users->father_name = $request->father_name;
            $users->father_phone = $request->father_phone;
            $users->mother_name = $request->mother_name;
            $users->address_current = $request->address_current;
            $users->address_permanent = $request->address_permanent;
            $users->designation_id = $request->designation_id;
            if ($request->file('image')) {
                @unlink(public_path('images/profile_photos/' . $users->profile_photo));
                $image = $request->file('image');
                $image_name = md5(rand(1111, 9999)) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/profile_photos'), $image_name);
                $users->profile_photo = $image_name;
            }
            $users->save();
        });

        Flash::success('Employee Registrations updated successfully.');

        return redirect(route('employeeRegistrations.index'));
    }

    /**
     * Remove the specified EmployeeRegistrations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employeeRegistrations = $this->employeeRegistrationsRepository->find($id);

        if (empty($employeeRegistrations)) {
            Flash::error('Employee Registrations not found');

            return redirect(route('employeeRegistrations.index'));
        }

        $this->employeeRegistrationsRepository->delete($id);

        Flash::success('Employee Registrations deleted successfully.');

        return redirect(route('employeeRegistrations.index'));
    }
}
