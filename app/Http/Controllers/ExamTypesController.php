<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExamTypesRequest;
use App\Http\Requests\UpdateExamTypesRequest;
use App\Repositories\ExamTypesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\ExamTypes;
use Illuminate\Http\Request;
use Flash;
use Response;

class ExamTypesController extends AppBaseController
{
    /** @var  ExamTypesRepository */
    private $examTypesRepository;

    public function __construct(ExamTypesRepository $examTypesRepo)
    {
        $this->examTypesRepository = $examTypesRepo;
    }

    /**
     * Display a listing of the ExamTypes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $examTypes = $this->examTypesRepository->all();

        return view('exam_types.index')
            ->with('examTypes', $examTypes);
    }

    /**
     * Show the form for creating a new ExamTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('exam_types.create');
    }

    /**
     * Store a newly created ExamTypes in storage.
     *
     * @param CreateExamTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateExamTypesRequest $request)
    {
        $input = $request->all();

        $examTypes = $this->examTypesRepository->create($input);

        Flash::success('Exam Types saved successfully.');

        return redirect(route('examTypes.index'));
    }

    /**
     * Display the specified ExamTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $examTypes = $this->examTypesRepository->find($id);

        if (empty($examTypes)) {
            Flash::error('Exam Types not found');

            return redirect(route('examTypes.index'));
        }

        return view('exam_types.show')->with('examTypes', $examTypes);
    }

    /**
     * Show the form for editing the specified ExamTypes.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $examTypes = $this->examTypesRepository->find($id);

    //     if (empty($examTypes)) {
    //         Flash::error('Exam Types not found');

    //         return redirect(route('examTypes.index'));
    //     }

    //     return view('exam_types.edit')->with('examTypes', $examTypes);
    // }
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(ExamTypes::find($request->id));
        }
    }

    /**
     * Update the specified ExamTypes in storage.
     *
     * @param int $id
     * @param UpdateExamTypesRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateExamTypesRequest $request)
    // {
    //     $examTypes = $this->examTypesRepository->find($id);

    //     if (empty($examTypes)) {
    //         Flash::error('Exam Types not found');

    //         return redirect(route('examTypes.index'));
    //     }

    //     $examTypes = $this->examTypesRepository->update($request->all(), $id);

    //     Flash::success('Exam Types updated successfully.');

    //     return redirect(route('examTypes.index'));
    // }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:exam_types,name'
        ]);

        $exam_types = array(
            'id' => $request->id,
            'name' => $request->name,
        );

        ExamTypes::FindOrFail($request->id)->update($exam_types);

        if (empty($exam_types)) {
            Flash::error('Exam Type not found');
        }

        Flash::success('Exam Type updated successfully.');

        return redirect(route('examTypes.index'));
    }

    /**
     * Remove the specified ExamTypes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $examTypes = $this->examTypesRepository->find($id);

        if (empty($examTypes)) {
            Flash::error('Exam Types not found');

            return redirect(route('examTypes.index'));
        }

        $this->examTypesRepository->delete($id);

        Flash::success('Exam Types deleted successfully.');

        return redirect(route('examTypes.index'));
    }
}
