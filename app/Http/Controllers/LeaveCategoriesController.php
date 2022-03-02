<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeaveCategoriesRequest;
use App\Http\Requests\UpdateLeaveCategoriesRequest;
use App\Repositories\LeaveCategoriesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\LeaveCategories;
use Illuminate\Http\Request;
use Flash;
use Response;

class LeaveCategoriesController extends AppBaseController
{
    /** @var  LeaveCategoriesRepository */
    private $leaveCategoriesRepository;

    public function __construct(LeaveCategoriesRepository $leaveCategoriesRepo)
    {
        $this->leaveCategoriesRepository = $leaveCategoriesRepo;
    }

    /**
     * Display a listing of the LeaveCategories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $leaveCategories = $this->leaveCategoriesRepository->all();

        return view('leave_categories.index')
            ->with('leaveCategories', $leaveCategories);
    }

    /**
     * Show the form for creating a new LeaveCategories.
     *
     * @return Response
     */
    public function create()
    {
        return view('leave_categories.create');
    }

    /**
     * Store a newly created LeaveCategories in storage.
     *
     * @param CreateLeaveCategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateLeaveCategoriesRequest $request)
    {
        $input = $request->all();

        $leaveCategories = $this->leaveCategoriesRepository->create($input);

        Flash::success('Leave Categories saved successfully.');

        return redirect(route('leaveCategories.index'));
    }

    /**
     * Display the specified LeaveCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leaveCategories = $this->leaveCategoriesRepository->find($id);

        if (empty($leaveCategories)) {
            Flash::error('Leave Categories not found');

            return redirect(route('leaveCategories.index'));
        }

        return view('leave_categories.show')->with('leaveCategories', $leaveCategories);
    }

    /**
     * Show the form for editing the specified LeaveCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $leaveCategories = $this->leaveCategoriesRepository->find($id);

    //     if (empty($leaveCategories)) {
    //         Flash::error('Leave Categories not found');

    //         return redirect(route('leaveCategories.index'));
    //     }

    //     return view('leave_categories.edit')->with('leaveCategories', $leaveCategories);
    // }
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(LeaveCategories::find($request->id));
        }
    }

    /**
     * Update the specified LeaveCategories in storage.
     *
     * @param int $id
     * @param UpdateLeaveCategoriesRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateLeaveCategoriesRequest $request)
    // {
    //     $leaveCategories = $this->leaveCategoriesRepository->find($id);

    //     if (empty($leaveCategories)) {
    //         Flash::error('Leave Categories not found');

    //         return redirect(route('leaveCategories.index'));
    //     }

    //     $leaveCategories = $this->leaveCategoriesRepository->update($request->all(), $id);

    //     Flash::success('Leave Categories updated successfully.');

    //     return redirect(route('leaveCategories.index'));
    // }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:leave_categories,name'
        ]);

        $leave_categories = array(
            'id' => $request->id,
            'name' => $request->name,
        );

        LeaveCategories::FindOrFail($request->id)->update($leave_categories);

        if (empty($leave_categories)) {
            Flash::error('Leave Category not found');
        }

        Flash::success('Leave Category updated successfully.');

        return redirect(route('leaveCategories.index'));
    }

    /**
     * Remove the specified LeaveCategories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leaveCategories = $this->leaveCategoriesRepository->find($id);

        if (empty($leaveCategories)) {
            Flash::error('Leave Categories not found');

            return redirect(route('leaveCategories.index'));
        }

        $this->leaveCategoriesRepository->delete($id);

        Flash::success('Leave Categories deleted successfully.');

        return redirect(route('leaveCategories.index'));
    }
}
