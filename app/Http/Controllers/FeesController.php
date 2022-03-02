<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeesRequest;
use App\Http\Requests\UpdateFeesRequest;
use App\Repositories\FeesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Classes;
use App\Models\Fees;
use App\Models\FeesAmounts;
use App\Models\FeesCategories;
use App\Models\Sessions;
use App\Models\StudentAssignings;
use Illuminate\Http\Request;
use Flash;
use Response;

class FeesController extends AppBaseController
{
    /** @var  FeesRepository */
    private $feesRepository;

    public function __construct(FeesRepository $feesRepo)
    {
        $this->feesRepository = $feesRepo;
    }

    /**
     * Display a listing of the Fees.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $fees = $this->feesRepository->all();

        // return view('fees.index')
        //     ->with('fees', $fees);
        $data['fees'] = Fees::with(['student', 'session', 'class', 'fees_category'])->get();

        return view('fees.index', $data);
    }

    public function feesAddOrEdit()
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();
        $data['fees_categories'] = FeesCategories::all();

        return view('fees.add_or_edit', $data);
    }

    public function feesStore(Request $request)
    {
        // dd($request)->toArray();
        $date = date('Y-m', strtotime($request->date));
        Fees::where('student_id', $request->student_id)->where('fees_category_id', $request->fees_category_id)->where('session_id', $request->session_id)->where('class_id', $request->class_id)->where('date', $date)->delete();
        $check_payment = $request->check_payment;
        if ($check_payment != null) {
            for ($i = 0; $i < count($check_payment); $i++) {
                $fees = new Fees();
                $fees->student_id = $request->student_id[$check_payment[$i]];
                $fees->fees_category_id = $request->fees_category_id;
                $fees->session_id = $request->session_id;
                $fees->class_id = $request->class_id;
                $fees->date = $request->date;
                $fees->amount = $request->amount[$check_payment[$i]];
                $fees->save();
            }
        }
        if (!empty(@$fees) || empty($request->check_payment)) {
            Flash::success('Fees saved successfully.');
            return redirect(route('fees.index'));
        } else {
            Flash::error('Fees not saved.');
            return redirect()->back();
        }
    }

    public function filter(Request $request)
    {
        $session_id = $request->session_id;
        $class_id = $request->class_id;
        $fees_category_id = $request->fees_category_id;
        $date = date('Y-m', strtotime($request->date));

        $students = StudentAssignings::with(['feewaive'])->where('session_id', $session_id)->where('class_id', $class_id)->get();

        $html['thsource'] = '<th>Sl.</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Id No</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Actual Fees</th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Final Fees</th>';
        $html['thsource'] .= '<th>Payment Status</th>';

        foreach ($students as $key => $value) {
            $fees = FeesAmounts::where('fees_category_id', $fees_category_id)->where('class_id', $value->class_id)->get()->first();
            $fees_found = Fees::where('student_id', $value->student_id)->where('fees_category_id', $fees_category_id)->where('session_id', $value->session_id)->where('class_id', $value->class_id)->where('date', $value->date)->get()->first();
            if ($fees_found != null) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            $color = 'success';
            $html[$key]['tdsource'] = '<td>' . $key . '</td>';
            $html[$key]['tdsource'] .= '<input type="hidden" name="session_id" value="' . $value->session_id . '">';
            $html[$key]['tdsource'] .= '<input type="hidden" name="class_id" value="' . $value->class_id . '">';
            $html[$key]['tdsource'] .= '<input type="hidden" name="fees_category_id" value="' . $fees_category_id . '">';
            $html[$key]['tdsource'] .= '<input type="hidden" name="date" value="' . $date . '">';
            $html[$key]['tdsource'] .= '<input type="hidden" name="student_id[]" value="' . $value->student_id . '">';
            $html[$key]['tdsource'] .= '<td>' . $value['student']['name'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['student']['id_no'] . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value->roll_no . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $fees->amount . '</td>';
            $html[$key]['tdsource'] .= '<td>' . $value['feewaive']['discount'] . '</td>';

            $actual_fees = $fees->amount;
            $discount = $value['feewaive']['discount'];
            $final_fees = (int)$actual_fees - (int)($discount / 100 * $actual_fees);

            $html[$key]['tdsource'] .= '<td>' . '<input type="text" name="amount[]" value=' . $final_fees . ' class="form-control" readonly>' . '</td>';
            $html[$key]['tdsource'] .= '<td>' . '<input type="checkbox" name="check_payment[]" value="' . $key . '" ' . $checked . ' class="form-control" readonly style="transform: scale(0.8); margin-right: 20px;">' . '</td>';
        }
        return response()->json(@$html);
    }

    /**
     * Show the form for creating a new Fees.
     *
     * @return Response
     */
    public function create()
    {
        return view('fees.create');
    }

    /**
     * Store a newly created Fees in storage.
     *
     * @param CreateFeesRequest $request
     *
     * @return Response
     */
    public function store(CreateFeesRequest $request)
    {
        $input = $request->all();

        $fees = $this->feesRepository->create($input);

        Flash::success('Fees saved successfully.');

        return redirect(route('fees.index'));
    }

    /**
     * Display the specified Fees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fees = $this->feesRepository->find($id);

        if (empty($fees)) {
            Flash::error('Fees not found');

            return redirect(route('fees.index'));
        }

        return view('fees.show')->with('fees', $fees);
    }

    /**
     * Show the form for editing the specified Fees.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fees = $this->feesRepository->find($id);

        if (empty($fees)) {
            Flash::error('Fees not found');

            return redirect(route('fees.index'));
        }

        return view('fees.edit')->with('fees', $fees);
    }

    /**
     * Update the specified Fees in storage.
     *
     * @param int $id
     * @param UpdateFeesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFeesRequest $request)
    {
        $fees = $this->feesRepository->find($id);

        if (empty($fees)) {
            Flash::error('Fees not found');

            return redirect(route('fees.index'));
        }

        $fees = $this->feesRepository->update($request->all(), $id);

        Flash::success('Fees updated successfully.');

        return redirect(route('fees.index'));
    }

    /**
     * Remove the specified Fees from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fees = $this->feesRepository->find($id);

        if (empty($fees)) {
            Flash::error('Fees not found');

            return redirect(route('fees.index'));
        }

        $this->feesRepository->delete($id);

        Flash::success('Fees deleted successfully.');

        return redirect(route('fees.index'));
    }
}
