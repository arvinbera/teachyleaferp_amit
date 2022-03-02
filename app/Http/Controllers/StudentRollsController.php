<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRollsRequest;
use App\Http\Requests\UpdateStudentRollsRequest;
use App\Repositories\StudentRollsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Classes;
use App\Models\Sessions;
use App\Models\StudentAssignings;
use Illuminate\Http\Request;
use Flash;
use Response;

class StudentRollsController extends AppBaseController
{
    /** @var  StudentRollsRepository */
    private $studentRollsRepository;

    public function __construct(StudentRollsRepository $studentRollsRepo)
    {
        $this->studentRollsRepository = $studentRollsRepo;
    }

    /**
     * Display a listing of the StudentRolls.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();

        return view('student_rolls.index', $data);
    }

    public function studentRolls_filter(Request $request)
    {
        $studentRolls = StudentAssignings::with(['student'])->where('session_id', $request->session_id)->where('class_id', $request->class_id)->get();
        return response()->json($studentRolls);
    }

    /**
     * Show the form for creating a new StudentRolls.
     *
     * @return Response
     */
    public function create()
    {
        return view('student_rolls.create');
    }

    /**
     * Store a newly created StudentRolls in storage.
     *
     * @param CreateStudentRollsRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentRollsRequest $request)
    {
        $input = $request->all();

        $studentRolls = $this->studentRollsRepository->create($input);

        Flash::success('Student Rolls saved successfully.');

        return redirect(route('studentRolls.index'));
    }

    public function studentRolls_store(Request $request)
    {
        $session_id = $request->session_id;
        $class_id = $request->class_id;
        if ($request->student_id != null) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                StudentAssignings::where('session_id', $session_id)->where('class_id', $class_id)->where('student_id', $request->student_id[$i])->update(['roll_no' => $request->roll_no[$i]]);
            }
        } else {
            Flash::error('No Student Found.');
            return redirect()->back();
        }

        Flash::success('Student Rolls saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified StudentRolls.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $studentRolls = $this->studentRollsRepository->find($id);

        if (empty($studentRolls)) {
            Flash::error('Student Rolls not found');

            return redirect(route('studentRolls.index'));
        }

        return view('student_rolls.show')->with('studentRolls', $studentRolls);
    }

    /**
     * Show the form for editing the specified StudentRolls.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $studentRolls = $this->studentRollsRepository->find($id);

        if (empty($studentRolls)) {
            Flash::error('Student Rolls not found');

            return redirect(route('studentRolls.index'));
        }

        return view('student_rolls.edit')->with('studentRolls', $studentRolls);
    }

    /**
     * Update the specified StudentRolls in storage.
     *
     * @param int $id
     * @param UpdateStudentRollsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentRollsRequest $request)
    {
        $studentRolls = $this->studentRollsRepository->find($id);

        if (empty($studentRolls)) {
            Flash::error('Student Rolls not found');

            return redirect(route('studentRolls.index'));
        }

        $studentRolls = $this->studentRollsRepository->update($request->all(), $id);

        Flash::success('Student Rolls updated successfully.');

        return redirect(route('studentRolls.index'));
    }

    /**
     * Remove the specified StudentRolls from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studentRolls = $this->studentRollsRepository->find($id);

        if (empty($studentRolls)) {
            Flash::error('Student Rolls not found');

            return redirect(route('studentRolls.index'));
        }

        $this->studentRollsRepository->delete($id);

        Flash::success('Student Rolls deleted successfully.');

        return redirect(route('studentRolls.index'));
    }
}
