<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalaryLogsRequest;
use App\Http\Requests\UpdateSalaryLogsRequest;
use App\Repositories\SalaryLogsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\SalaryLogs;
use App\Models\Users;
use Illuminate\Http\Request;
use Flash;
use Response;

class SalaryLogsController extends AppBaseController
{
    /** @var  SalaryLogsRepository */
    private $salaryLogsRepository;

    public function __construct(SalaryLogsRepository $salaryLogsRepo)
    {
        $this->salaryLogsRepository = $salaryLogsRepo;
    }

    /**
     * Display a listing of the SalaryLogs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $salaryLogs = $this->salaryLogsRepository->all();

        $data['employeeRegistrations'] = Users::with(['designation'])->where('user_type', 'employees')->get();

        return view('salary_logs.index', $data)
            ->with('salaryLogs', $salaryLogs);
    }

    public function salary_increment($id)
    {
        $data['employee'] = Users::find($id);
        return view('salary_logs.salary_increment', $data);
    }

    public function salary_increment_store(Request $request, $id)
    {
        $user = Users::find($id);

        $previous_salary = $user->salary;
        $present_salary = (float) $previous_salary + (float) $request->increment;

        $user->salary = $present_salary;
        $user->save();

        $salary_log = new SalaryLogs();
        $salary_log->employee_id = $id;
        $salary_log->previous_salary = $previous_salary;
        $salary_log->present_salary = $present_salary;
        $salary_log->increment = $request->increment;
        $salary_log->effective_from = date('Y-m-d', strtotime($request->effective_from));
        $salary_log->save();

        Flash::success('Salary Logs saved successfully.');

        return redirect(route('salaryLogs.index'));
    }

    public function salary_log($id)
    {
        $data['employee'] = Users::find($id);
        $data['salary_log'] = SalaryLogs::where('employee_id', $id)->get();
        // dd($data['salary_log']->toArray());

        return view('salary_logs.salary_log', $data);
    }

    /**
     * Show the form for creating a new SalaryLogs.
     *
     * @return Response
     */
    public function create()
    {
        return view('salary_logs.create');
    }

    /**
     * Store a newly created SalaryLogs in storage.
     *
     * @param CreateSalaryLogsRequest $request
     *
     * @return Response
     */
    public function store(CreateSalaryLogsRequest $request)
    {
        $input = $request->all();

        $salaryLogs = $this->salaryLogsRepository->create($input);

        Flash::success('Salary Logs saved successfully.');

        return redirect(route('salaryLogs.index'));
    }

    /**
     * Display the specified SalaryLogs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salaryLogs = $this->salaryLogsRepository->find($id);

        if (empty($salaryLogs)) {
            Flash::error('Salary Logs not found');

            return redirect(route('salaryLogs.index'));
        }

        return view('salary_logs.show')->with('salaryLogs', $salaryLogs);
    }

    /**
     * Show the form for editing the specified SalaryLogs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salaryLogs = $this->salaryLogsRepository->find($id);

        if (empty($salaryLogs)) {
            Flash::error('Salary Logs not found');

            return redirect(route('salaryLogs.index'));
        }

        return view('salary_logs.edit')->with('salaryLogs', $salaryLogs);
    }

    /**
     * Update the specified SalaryLogs in storage.
     *
     * @param int $id
     * @param UpdateSalaryLogsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalaryLogsRequest $request)
    {
        $salaryLogs = $this->salaryLogsRepository->find($id);

        if (empty($salaryLogs)) {
            Flash::error('Salary Logs not found');

            return redirect(route('salaryLogs.index'));
        }

        $salaryLogs = $this->salaryLogsRepository->update($request->all(), $id);

        Flash::success('Salary Logs updated successfully.');

        return redirect(route('salaryLogs.index'));
    }

    /**
     * Remove the specified SalaryLogs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salaryLogs = $this->salaryLogsRepository->find($id);

        if (empty($salaryLogs)) {
            Flash::error('Salary Logs not found');

            return redirect(route('salaryLogs.index'));
        }

        $this->salaryLogsRepository->delete($id);

        Flash::success('Salary Logs deleted successfully.');

        return redirect(route('salaryLogs.index'));
    }
}
