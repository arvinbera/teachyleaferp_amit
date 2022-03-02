<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMarksRequest;
use App\Http\Requests\UpdateMarksRequest;
use App\Repositories\MarksRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Classes;
use App\Models\ExamTypes;
use App\Models\Marks;
use App\Models\Sessions;
use App\Models\StudentAssignings;
use App\Models\SubjectAssignings;
use Illuminate\Http\Request;
use Flash;
use Response;

class MarksController extends AppBaseController
{
    /** @var  MarksRepository */
    private $marksRepository;

    public function __construct(MarksRepository $marksRepo)
    {
        $this->marksRepository = $marksRepo;
    }

    /**
     * Display a listing of the Marks.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();
        $data['exam_types'] = ExamTypes::all();

        return view('marks.index', $data);
    }

    public function marks_studentSubjects_filter(Request $request)
    {
        $class_id = $request->class_id;
        $data = SubjectAssignings::with(['subject'])->where('class_id', $class_id)->get();
        return response()->json($data);
    }

    public function studentMarks_filter(Request $request)
    {
        $studentMarks = StudentAssignings::with(['student'])->where('session_id', $request->session_id)->where('class_id', $request->class_id)->get();
        return response()->json($studentMarks);
    }

    public function studentMarksTable_filter(Request $request)
    {
        $studentMarks = Marks::with(['student'])->where('session_id', $request->session_id)->where('class_id', $request->class_id)->where('subject_assigning_id', $request->subject_assigning_id)->where('exam_type_id', $request->exam_type_id)->get();
        return response()->json($studentMarks);
    }

    /**
     * Show the form for creating a new Marks.
     *
     * @return Response
     */
    public function create()
    {
        return view('marks.create');
    }

    /**
     * Store a newly created Marks in storage.
     *
     * @param CreateMarksRequest $request
     *
     * @return Response
     */
    public function store(CreateMarksRequest $request)
    {
        $input = $request->all();

        $marks = $this->marksRepository->create($input);

        Flash::success('Marks saved successfully.');

        return redirect(route('marks.index'));
    }

    public function studentMarks_store(Request $request)
    {
        if ($request->student_id != null) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                $marks = new Marks();
                $marks->student_id = $request->student_id[$i];
                $marks->id_no = $request->id_no[$i];
                $marks->session_id = $request->session_id;
                $marks->class_id = $request->class_id;
                $marks->exam_type_id = $request->exam_type_id;
                $marks->subject_assigning_id = $request->subject_assigning_id;
                $marks->marks = $request->marks[$i];
                $marks->save();
            }
        } else {
            Flash::error('No Student Found.');
            return redirect()->back();
        }

        Flash::success('Student Marks saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Marks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marks = $this->marksRepository->find($id);

        if (empty($marks)) {
            Flash::error('Marks not found');

            return redirect(route('marks.index'));
        }

        return view('marks.show')->with('marks', $marks);
    }

    /**
     * Show the form for editing the specified Marks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marks = $this->marksRepository->find($id);

        if (empty($marks)) {
            Flash::error('Marks not found');

            return redirect(route('marks.index'));
        }

        return view('marks.edit')->with('marks', $marks);
    }

    public function studentMarks_edit(Request $request)
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();
        $data['exam_types'] = ExamTypes::all();

        return view('marks.edit', $data);
    }

    /**
     * Update the specified Marks in storage.
     *
     * @param int $id
     * @param UpdateMarksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarksRequest $request)
    {
        $marks = $this->marksRepository->find($id);

        if (empty($marks)) {
            Flash::error('Marks not found');

            return redirect(route('marks.index'));
        }

        $marks = $this->marksRepository->update($request->all(), $id);

        Flash::success('Marks updated successfully.');

        return redirect(route('marks.index'));
    }

    public function studentMarks_update(Request $request)
    {
        Marks::where('session_id', $request->session_id)->where('class_id', $request->class_id)->where('subject_assigning_id', $request->subject_assigning_id)->where('exam_type_id', $request->exam_type_id)->delete();
        if ($request->student_id != null) {
            for ($i = 0; $i < count($request->student_id); $i++) {
                $marks = new Marks();
                $marks->student_id = $request->student_id[$i];
                $marks->id_no = $request->id_no[$i];
                $marks->session_id = $request->session_id;
                $marks->class_id = $request->class_id;
                $marks->exam_type_id = $request->exam_type_id;
                $marks->subject_assigning_id = $request->subject_assigning_id;
                $marks->marks = $request->marks[$i];
                $marks->save();
            }
        } else {
            Flash::error('No Student Found.');
            return redirect()->back();
        }

        Flash::success('Marks updated successfully.');

        return redirect(route('studentMarks_edit'));
    }

    /**
     * Remove the specified Marks from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marks = $this->marksRepository->find($id);

        if (empty($marks)) {
            Flash::error('Marks not found');

            return redirect(route('marks.index'));
        }

        $this->marksRepository->delete($id);

        Flash::success('Marks deleted successfully.');

        return redirect(route('marks.index'));
    }
}
