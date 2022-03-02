<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGradesRequest;
use App\Http\Requests\UpdateGradesRequest;
use App\Repositories\GradesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Grades;
use Illuminate\Http\Request;
use Flash;
use Response;

class GradesController extends AppBaseController
{
    /** @var  GradesRepository */
    private $gradesRepository;

    public function __construct(GradesRepository $gradesRepo)
    {
        $this->gradesRepository = $gradesRepo;
    }

    /**
     * Display a listing of the Grades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $grades = $this->gradesRepository->all();

        return view('grades.index')
            ->with('grades', $grades);
    }

    /**
     * Show the form for creating a new Grades.
     *
     * @return Response
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created Grades in storage.
     *
     * @param CreateGradesRequest $request
     *
     * @return Response
     */
    public function store(CreateGradesRequest $request)
    {
        $input = $request->all();

        $grades = $this->gradesRepository->create($input);

        Flash::success('Grades saved successfully.');

        return redirect(route('grades.index'));
    }

    /**
     * Display the specified Grades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grades = $this->gradesRepository->find($id);

        if (empty($grades)) {
            Flash::error('Grades not found');

            return redirect(route('grades.index'));
        }

        return view('grades.show')->with('grades', $grades);
    }

    /**
     * Show the form for editing the specified Grades.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $grades = $this->gradesRepository->find($id);

    //     if (empty($grades)) {
    //         Flash::error('Grades not found');

    //         return redirect(route('grades.index'));
    //     }

    //     return view('grades.edit')->with('grades', $grades);
    // }
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(Grades::find($request->id));
        }
    }

    /**
     * Update the specified Grades in storage.
     *
     * @param int $id
     * @param UpdateGradesRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateGradesRequest $request)
    // {
    //     $grades = $this->gradesRepository->find($id);

    //     if (empty($grades)) {
    //         Flash::error('Grades not found');

    //         return redirect(route('grades.index'));
    //     }

    //     $grades = $this->gradesRepository->update($request->all(), $id);

    //     Flash::success('Grades updated successfully.');

    //     return redirect(route('grades.index'));
    // }
    public function update(Request $request)
    {
        $grades = array(
            'id' => $request->id,
            'grade_name' => $request->grade_name,
            'grade_point' => $request->grade_point,
            'start_marks' => $request->start_marks,
            'end_marks' => $request->end_marks,
            'start_point' => $request->start_point,
            'end_point' => $request->end_point,
            'remarks' => $request->remarks,
        );

        Grades::FindOrFail($request->id)->update($grades);

        if (empty($grades)) {
            Flash::error('Grade not found');
        }

        Flash::success('Grade updated successfully.');

        return redirect(route('grades.index'));
    }

    /**
     * Remove the specified Grades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grades = $this->gradesRepository->find($id);

        if (empty($grades)) {
            Flash::error('Grades not found');

            return redirect(route('grades.index'));
        }

        $this->gradesRepository->delete($id);

        Flash::success('Grades deleted successfully.');

        return redirect(route('grades.index'));
    }
}
