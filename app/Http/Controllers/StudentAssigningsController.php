<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentAssigningsRequest;
use App\Http\Requests\UpdateStudentAssigningsRequest;
use App\Repositories\StudentAssigningsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StudentAssigningsController extends AppBaseController
{
    /** @var  StudentAssigningsRepository */
    private $studentAssigningsRepository;

    public function __construct(StudentAssigningsRepository $studentAssigningsRepo)
    {
        $this->studentAssigningsRepository = $studentAssigningsRepo;
    }

    /**
     * Display a listing of the StudentAssignings.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $studentAssignings = $this->studentAssigningsRepository->all();

        return view('student_assignings.index')
            ->with('studentAssignings', $studentAssignings);
    }

    /**
     * Show the form for creating a new StudentAssignings.
     *
     * @return Response
     */
    public function create()
    {
        return view('student_assignings.create');
    }

    /**
     * Store a newly created StudentAssignings in storage.
     *
     * @param CreateStudentAssigningsRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentAssigningsRequest $request)
    {
        $input = $request->all();

        $studentAssignings = $this->studentAssigningsRepository->create($input);

        Flash::success('Student Assignings saved successfully.');

        return redirect(route('studentAssignings.index'));
    }

    /**
     * Display the specified StudentAssignings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $studentAssignings = $this->studentAssigningsRepository->find($id);

        if (empty($studentAssignings)) {
            Flash::error('Student Assignings not found');

            return redirect(route('studentAssignings.index'));
        }

        return view('student_assignings.show')->with('studentAssignings', $studentAssignings);
    }

    /**
     * Show the form for editing the specified StudentAssignings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $studentAssignings = $this->studentAssigningsRepository->find($id);

        if (empty($studentAssignings)) {
            Flash::error('Student Assignings not found');

            return redirect(route('studentAssignings.index'));
        }

        return view('student_assignings.edit')->with('studentAssignings', $studentAssignings);
    }

    /**
     * Update the specified StudentAssignings in storage.
     *
     * @param int $id
     * @param UpdateStudentAssigningsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentAssigningsRequest $request)
    {
        $studentAssignings = $this->studentAssigningsRepository->find($id);

        if (empty($studentAssignings)) {
            Flash::error('Student Assignings not found');

            return redirect(route('studentAssignings.index'));
        }

        $studentAssignings = $this->studentAssigningsRepository->update($request->all(), $id);

        Flash::success('Student Assignings updated successfully.');

        return redirect(route('studentAssignings.index'));
    }

    /**
     * Remove the specified StudentAssignings from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studentAssignings = $this->studentAssigningsRepository->find($id);

        if (empty($studentAssignings)) {
            Flash::error('Student Assignings not found');

            return redirect(route('studentAssignings.index'));
        }

        $this->studentAssigningsRepository->delete($id);

        Flash::success('Student Assignings deleted successfully.');

        return redirect(route('studentAssignings.index'));
    }
}
