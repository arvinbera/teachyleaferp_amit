<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubjectAssigningsRequest;
use App\Http\Requests\UpdateSubjectAssigningsRequest;
use App\Repositories\SubjectAssigningsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\SubjectAssignings;
use App\Models\Classes;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Flash;
use Response;

class SubjectAssigningsController extends AppBaseController
{
    /** @var  SubjectAssigningsRepository */
    private $subjectAssigningsRepository;

    public function __construct(SubjectAssigningsRepository $subjectAssigningsRepo)
    {
        $this->subjectAssigningsRepository = $subjectAssigningsRepo;
    }

    /**
     * Display a listing of the SubjectAssignings.
     *
     * @param Request $request
     *
     * @return Response
     */
    // public function index(Request $request)
    // {
    //     $subjectAssignings = $this->subjectAssigningsRepository->all();

    //     return view('subject_assignings.index')
    //         ->with('subjectAssignings', $subjectAssignings);
    // }
    public function index(Request $request)
    {
        $subjectAssignings = SubjectAssignings::select('class_id')->groupBy('class_id')->get();

        return view('subject_assignings.index')
            ->with('subjectAssignings', $subjectAssignings);
    }

    /**
     * Show the form for creating a new SubjectAssignings.
     *
     * @return Response
     */
    public function create()
    {
        $data['classes'] = Classes::all();
        $data['subjects'] = Subjects::all();

        return view('subject_assignings.create', $data);
    }

    /**
     * Store a newly created SubjectAssignings in storage.
     *
     * @param CreateSubjectAssigningsRequest $request
     *
     * @return Response
     */
    // public function store(CreateSubjectAssigningsRequest $request)
    // {
    //     $input = $request->all();

    //     $subjectAssignings = $this->subjectAssigningsRepository->create($input);

    //     Flash::success('Subject Assignings saved successfully.');

    //     return redirect(route('subjectAssignings.index'));
    // }
    public function store(CreateSubjectAssigningsRequest $request)
    {
        $countSubject = count($request->subject_id);
        if ($countSubject != null) {
            for ($i = 0; $i < $countSubject; $i++) {
                $subjectAssignings = new SubjectAssignings();
                $subjectAssignings->class_id = $request->class_id;
                $subjectAssignings->subject_id = $request->subject_id[$i];
                $subjectAssignings->full_marks = $request->full_marks[$i];
                $subjectAssignings->pass_marks = $request->pass_marks[$i];
                $subjectAssignings->subject_type = $request->subject_type[$i];
                $subjectAssignings->save();
            }
        }

        Flash::success('Subject Assignings saved successfully.');

        return redirect(route('subjectAssignings.index'));
    }

    /**
     * Display the specified SubjectAssignings.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $subjectAssignings = $this->subjectAssigningsRepository->find($id);

    //     if (empty($subjectAssignings)) {
    //         Flash::error('Subject Assignings not found');

    //         return redirect(route('subjectAssignings.index'));
    //     }

    //     return view('subject_assignings.show')->with('subjectAssignings', $subjectAssignings);
    // }
    public function show($class_id)
    {
        $data['subjectAssignings'] = SubjectAssignings::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();

        if (empty($data)) {
            Flash::error('Subject Assignings not found');

            return redirect(route('subjectAssignings.index'));
        }

        return view('subject_assignings.show', $data);
    }

    /**
     * Show the form for editing the specified SubjectAssignings.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $subjectAssignings = $this->subjectAssigningsRepository->find($id);

    //     if (empty($subjectAssignings)) {
    //         Flash::error('Subject Assignings not found');

    //         return redirect(route('subjectAssignings.index'));
    //     }

    //     return view('subject_assignings.edit')->with('subjectAssignings', $subjectAssignings);
    // }
    public function edit($class_id)
    {
        $data['subjectAssignings'] = SubjectAssignings::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        // dd($data['subjectAssignings']->toArray());
        $data['classes'] = Classes::all();
        $data['subjects'] = Subjects::all();

        if (empty($data)) {
            Flash::error('Subject Assignings not found');

            return redirect(route('subjectAssignings.index'));
        }

        return view('subject_assignings.edit', $data);
    }

    /**
     * Update the specified SubjectAssignings in storage.
     *
     * @param int $id
     * @param UpdateSubjectAssigningsRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateSubjectAssigningsRequest $request)
    // {
    //     $subjectAssignings = $this->subjectAssigningsRepository->find($id);

    //     if (empty($subjectAssignings)) {
    //         Flash::error('Subject Assignings not found');

    //         return redirect(route('subjectAssignings.index'));
    //     }

    //     $subjectAssignings = $this->subjectAssigningsRepository->update($request->all(), $id);

    //     Flash::success('Subject Assignings updated successfully.');

    //     return redirect(route('subjectAssignings.index'));
    // }
    public function update($class_id, UpdateSubjectAssigningsRequest $request)
    {
        if ($request->subject_id == null) {
            Flash::error('Subject not found');
            return redirect()->back();
        } else {
            // SubjectAssignings::where('class_id', $class_id)->delete();
            // $countSubject = count($request->subject_id);
            // for ($i = 0; $i < $countSubject; $i++) {
            //     $subjectAssignings = new SubjectAssignings();
            //     $subjectAssignings->class_id = $request->class_id;
            //     $subjectAssignings->subject_id = $request->subject_id[$i];
            //     $subjectAssignings->full_marks = $request->full_marks[$i];
            //     $subjectAssignings->pass_marks = $request->pass_marks[$i];
            //     $subjectAssignings->subject_type = $request->subject_type[$i];
            //     $subjectAssignings->save();
            // }

            SubjectAssignings::whereNotIn('subject_id', $request->subject_id)->where('class_id', $request->class_id)->delete();
            foreach ($request->subject_id as $key => $value) {
                $subjectAssignings_exists = SubjectAssignings::where('subject_id', $request->subject_id[$key])->where('class_id', $request->class_id)->first();
                if ($subjectAssignings_exists) {
                    $subjectAssignings = $subjectAssignings_exists;
                } else {
                    $subjectAssignings = new SubjectAssignings();
                }
                $subjectAssignings->class_id = $request->class_id;
                $subjectAssignings->subject_id = $request->subject_id[$key];
                $subjectAssignings->full_marks = $request->full_marks[$key];
                $subjectAssignings->pass_marks = $request->pass_marks[$key];
                $subjectAssignings->subject_type = $request->subject_type[$key];
                $subjectAssignings->save();
            }
        }

        Flash::success('Subject Assignings updated successfully.');

        return redirect(route('subjectAssignings.index'));
    }

    /**
     * Remove the specified SubjectAssignings from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subjectAssignings = $this->subjectAssigningsRepository->find($id);

        if (empty($subjectAssignings)) {
            Flash::error('Subject Assignings not found');

            return redirect(route('subjectAssignings.index'));
        }

        $this->subjectAssigningsRepository->delete($id);

        Flash::success('Subject Assignings deleted successfully.');

        return redirect(route('subjectAssignings.index'));
    }
}
