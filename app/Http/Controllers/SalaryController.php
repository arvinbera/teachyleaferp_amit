<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Repositories\SalaryRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\EmployeeAttendances;
use App\Models\Salary;
use Illuminate\Http\Request;
use Flash;
use Response;

class SalaryController extends AppBaseController
{
    /** @var  SalaryRepository */
    private $salaryRepository;

    public function __construct(SalaryRepository $salaryRepo)
    {
        $this->salaryRepository = $salaryRepo;
    }

    /**
     * Display a listing of the Salary.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $salaries = $this->salaryRepository->all();

        // return view('salaries.index')
        //     ->with('salaries', $salaries);

        $data['salaries'] = Salary::with(['employee'])->get();

        return view('salaries.index', $data);
    }

    public function salaryAddOrEdit()
    {
        return view('salaries.add_or_edit');
    }

    public function salaryStore(Request $request)
    {
        // dd($request)->toArray();
        $date = date('Y-m', strtotime($request->date));
        Salary::where('date', $date)->delete();
        $check_payment = $request->check_payment;
        if ($check_payment != null) {
            for ($i = 0; $i < count($check_payment); $i++) {
                $salary = new Salary();
                $salary->employee_id = $request->employee_id[$check_payment[$i]];
                $salary->date = $request->date;
                $salary->amount = $request->amount[$check_payment[$i]];
                $salary->save();
            }
        }
        if (!empty(@$salary) || empty($request->check_payment)) {
            Flash::success('Salaries saved successfully.');
            return redirect(route('salaries.index'));
        } else {
            Flash::error('Salaries not saved.');
            return redirect()->back();
        }
    }

    public function filter(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date . '%'];
        }

        $data = EmployeeAttendances::select('employee_id')->groupBy('employee_id')->with(['employee'])->where($where)->get();

        $html['thsource'] = '<th>Sl.</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Id No</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary (This Month)</th>';
        $html['thsource'] .= '<th>Payment Status</th>';

        foreach ($data as $key => $value) {
            $salary_found = Salary::where('employee_id', $value->employee_id)->where('date', $date)->get()->first();
            if ($salary_found != null) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $total_attendance = EmployeeAttendances::with('employee')->where($where)->where('employee_id', $value->employee_id)->get();
            $absent_count = count($total_attendance->where('attendance_status', 'Absent'));
            $color = 'success';
            $html[$key]['tdsource'] = '<td>' . ($key + 1) . '</td>';
            $html[$key]['tdsource'] .= '<input type="hidden" name="date" value="' . $date . '">';
            $html[$key]['tdsource'] .= '<input type="hidden" name="employee_id[]" value="' . $value->employee_id . '">';
            $html[$key]['tdsource'] .= '<td>' . $value['employee']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['employee']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['employee']['salary'] . '</td>';

            $salary = (float) $value['employee']['salary'];
            $salary_per_day = (float) $salary / 30;
            $final_salary = (float) $salary - ((float) $absent_count * (float) $salary_per_day);
            // $html[$key]['tdsource'] .= '<td>' . $final_salary . '</td>';

            $html[$key]['tdsource'] .= '<td>' . '<input type="text" name="amount[]" value=' . $final_salary . ' class="form-control" readonly>' . '</td>';
            $html[$key]['tdsource'] .= '<td>' . '<input type="checkbox" name="check_payment[]" value="' . $key . '" ' . $checked . ' class="form-control" readonly style="transform: scale(0.8); margin-right: 20px;">' . '</td>';
        }
        return response()->json(@$html);
    }

    /**
     * Show the form for creating a new Salary.
     *
     * @return Response
     */
    public function create()
    {
        return view('salaries.create');
    }

    /**
     * Store a newly created Salary in storage.
     *
     * @param CreateSalaryRequest $request
     *
     * @return Response
     */
    public function store(CreateSalaryRequest $request)
    {
        $input = $request->all();

        $salary = $this->salaryRepository->create($input);

        Flash::success('Salary saved successfully.');

        return redirect(route('salaries.index'));
    }

    /**
     * Display the specified Salary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('salaries.index'));
        }

        return view('salaries.show')->with('salary', $salary);
    }

    /**
     * Show the form for editing the specified Salary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('salaries.index'));
        }

        return view('salaries.edit')->with('salary', $salary);
    }

    /**
     * Update the specified Salary in storage.
     *
     * @param int $id
     * @param UpdateSalaryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalaryRequest $request)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('salaries.index'));
        }

        $salary = $this->salaryRepository->update($request->all(), $id);

        Flash::success('Salary updated successfully.');

        return redirect(route('salaries.index'));
    }

    /**
     * Remove the specified Salary from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salary = $this->salaryRepository->find($id);

        if (empty($salary)) {
            Flash::error('Salary not found');

            return redirect(route('salaries.index'));
        }

        $this->salaryRepository->delete($id);

        Flash::success('Salary deleted successfully.');

        return redirect(route('salaries.index'));
    }
}
