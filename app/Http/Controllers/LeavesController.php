<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeavesRequest;
use App\Http\Requests\UpdateLeavesRequest;
use App\Repositories\LeavesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\LeaveCategories;
use App\Models\Leaves;
use App\Models\Users;
use Illuminate\Http\Request;
use Flash;
use Response;

class LeavesController extends AppBaseController
{
    /** @var  LeavesRepository */
    private $leavesRepository;

    public function __construct(LeavesRepository $leavesRepo)
    {
        $this->leavesRepository = $leavesRepo;
    }

    /**
     * Display a listing of the Leaves.
     *
     * @param Request $request
     *
     * @return Response
     */
    // public function index(Request $request)
    // {
    //     $leaves = $this->leavesRepository->all();

    //     return view('leaves.index')
    //         ->with('leaves', $leaves);
    // }
    public function index(Request $request)
    {
        $data['leaves'] = Leaves::orderBy('id', 'desc')->get();

        return view('leaves.index', $data);
    }

    /**
     * Show the form for creating a new Leaves.
     *
     * @return Response
     */
    public function create()
    {
        $data['employees'] = Users::where('user_type', 'employees')->get();
        $data['leave_categories'] = LeaveCategories::all();

        return view('leaves.create', $data);
    }

    /**
     * Store a newly created Leaves in storage.
     *
     * @param CreateLeavesRequest $request
     *
     * @return Response
     */
    // public function store(CreateLeavesRequest $request)
    // {
    //     $input = $request->all();

    //     $leaves = $this->leavesRepository->create($input);

    //     Flash::success('Leaves saved successfully.');

    //     return redirect(route('leaves.index'));
    // }
    public function store(Request $request)
    {
        if ($request->leave_category_id == 0) {
            $leave_category = new LeaveCategories();
            $leave_category->name = $request->name;
            $leave_category->save();
            $leave_category_id = $leave_category->id;
        } else {
            $leave_category_id = $request->leave_category_id;
        }

        $leave = new Leaves();
        $leave->employee_id = $request->employee_id;
        $leave->leave_category_id = $leave_category_id;
        $leave->start_date = date('Y-m-d', strtotime($request->start_date));
        $leave->end_date = date('Y-m-d', strtotime($request->end_date));
        $leave->save();

        Flash::success('Leaves saved successfully.');

        return redirect(route('leaves.index'));
    }

    /**
     * Display the specified Leaves.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        return view('leaves.show')->with('leaves', $leaves);
    }

    /**
     * Show the form for editing the specified Leaves.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data['employees'] = Users::where('user_type', 'employees')->get();
        $data['leave_categories'] = LeaveCategories::all();

        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        return view('leaves.edit', $data)->with('leaves', $leaves);
    }

    /**
     * Update the specified Leaves in storage.
     *
     * @param int $id
     * @param UpdateLeavesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeavesRequest $request)
    {
        if ($request->leave_category_id == 0) {
            $leave_category = new LeaveCategories();
            $leave_category->name = $request->name;
            $leave_category->save();
            $leave_category_id = $leave_category->id;
        } else {
            $leave_category_id = $request->leave_category_id;
        }

        $leave = Leaves::find($id);
        $leave->employee_id = $request->employee_id;
        $leave->leave_category_id = $leave_category_id;
        $leave->start_date = date('Y-m-d', strtotime($request->start_date));
        $leave->end_date = date('Y-m-d', strtotime($request->end_date));
        $leave->save();

        Flash::success('Leaves updated successfully.');

        return redirect(route('leaves.index'));
    }

    /**
     * Remove the specified Leaves from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            Flash::error('Leaves not found');

            return redirect(route('leaves.index'));
        }

        $this->leavesRepository->delete($id);

        Flash::success('Leaves deleted successfully.');

        return redirect(route('leaves.index'));
    }
}
