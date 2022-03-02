<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentFeewaiveRequest;
use App\Http\Requests\UpdateStudentFeewaiveRequest;
use App\Repositories\StudentFeewaiveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StudentFeewaiveController extends AppBaseController
{
    /** @var  StudentFeewaiveRepository */
    private $studentFeewaiveRepository;

    public function __construct(StudentFeewaiveRepository $studentFeewaiveRepo)
    {
        $this->studentFeewaiveRepository = $studentFeewaiveRepo;
    }

    /**
     * Display a listing of the StudentFeewaive.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $studentFeewaives = $this->studentFeewaiveRepository->all();

        return view('student_feewaives.index')
            ->with('studentFeewaives', $studentFeewaives);
    }

    /**
     * Show the form for creating a new StudentFeewaive.
     *
     * @return Response
     */
    public function create()
    {
        return view('student_feewaives.create');
    }

    /**
     * Store a newly created StudentFeewaive in storage.
     *
     * @param CreateStudentFeewaiveRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentFeewaiveRequest $request)
    {
        $input = $request->all();

        $studentFeewaive = $this->studentFeewaiveRepository->create($input);

        Flash::success('Student Feewaive saved successfully.');

        return redirect(route('studentFeewaives.index'));
    }

    /**
     * Display the specified StudentFeewaive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $studentFeewaive = $this->studentFeewaiveRepository->find($id);

        if (empty($studentFeewaive)) {
            Flash::error('Student Feewaive not found');

            return redirect(route('studentFeewaives.index'));
        }

        return view('student_feewaives.show')->with('studentFeewaive', $studentFeewaive);
    }

    /**
     * Show the form for editing the specified StudentFeewaive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $studentFeewaive = $this->studentFeewaiveRepository->find($id);

        if (empty($studentFeewaive)) {
            Flash::error('Student Feewaive not found');

            return redirect(route('studentFeewaives.index'));
        }

        return view('student_feewaives.edit')->with('studentFeewaive', $studentFeewaive);
    }

    /**
     * Update the specified StudentFeewaive in storage.
     *
     * @param int $id
     * @param UpdateStudentFeewaiveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentFeewaiveRequest $request)
    {
        $studentFeewaive = $this->studentFeewaiveRepository->find($id);

        if (empty($studentFeewaive)) {
            Flash::error('Student Feewaive not found');

            return redirect(route('studentFeewaives.index'));
        }

        $studentFeewaive = $this->studentFeewaiveRepository->update($request->all(), $id);

        Flash::success('Student Feewaive updated successfully.');

        return redirect(route('studentFeewaives.index'));
    }

    /**
     * Remove the specified StudentFeewaive from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studentFeewaive = $this->studentFeewaiveRepository->find($id);

        if (empty($studentFeewaive)) {
            Flash::error('Student Feewaive not found');

            return redirect(route('studentFeewaives.index'));
        }

        $this->studentFeewaiveRepository->delete($id);

        Flash::success('Student Feewaive deleted successfully.');

        return redirect(route('studentFeewaives.index'));
    }
}
