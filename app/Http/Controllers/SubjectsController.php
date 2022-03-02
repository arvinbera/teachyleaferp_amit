<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubjectsRequest;
use App\Http\Requests\UpdateSubjectsRequest;
use App\Repositories\SubjectsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Flash;
use Response;

class SubjectsController extends AppBaseController
{
    /** @var  SubjectsRepository */
    private $subjectsRepository;

    public function __construct(SubjectsRepository $subjectsRepo)
    {
        $this->subjectsRepository = $subjectsRepo;
    }

    /**
     * Display a listing of the Subjects.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subjects = $this->subjectsRepository->all();

        return view('subjects.index')
            ->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new Subjects.
     *
     * @return Response
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created Subjects in storage.
     *
     * @param CreateSubjectsRequest $request
     *
     * @return Response
     */
    public function store(CreateSubjectsRequest $request)
    {
        $input = $request->all();

        $subjects = $this->subjectsRepository->create($input);

        Flash::success('Subjects saved successfully.');

        return redirect(route('subjects.index'));
    }

    /**
     * Display the specified Subjects.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subjects = $this->subjectsRepository->find($id);

        if (empty($subjects)) {
            Flash::error('Subjects not found');

            return redirect(route('subjects.index'));
        }

        return view('subjects.show')->with('subjects', $subjects);
    }

    /**
     * Show the form for editing the specified Subjects.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $subjects = $this->subjectsRepository->find($id);

    //     if (empty($subjects)) {
    //         Flash::error('Subjects not found');

    //         return redirect(route('subjects.index'));
    //     }

    //     return view('subjects.edit')->with('subjects', $subjects);
    // }
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(Subjects::find($request->id));
        }
    }

    /**
     * Update the specified Subjects in storage.
     *
     * @param int $id
     * @param UpdateSubjectsRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateSubjectsRequest $request)
    // {
    //     $subjects = $this->subjectsRepository->find($id);

    //     if (empty($subjects)) {
    //         Flash::error('Subjects not found');

    //         return redirect(route('subjects.index'));
    //     }

    //     $subjects = $this->subjectsRepository->update($request->all(), $id);

    //     Flash::success('Subjects updated successfully.');

    //     return redirect(route('subjects.index'));
    // }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:subjects,name'
        ]);

        $subjects = array(
            'id' => $request->id,
            'name' => $request->name,
        );

        Subjects::FindOrFail($request->id)->update($subjects);

        if (empty($subjects)) {
            Flash::error('Subject not found');
        }

        Flash::success('Subject updated successfully.');

        return redirect(route('subjects.index'));
    }

    /**
     * Remove the specified Subjects from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subjects = $this->subjectsRepository->find($id);

        if (empty($subjects)) {
            Flash::error('Subjects not found');

            return redirect(route('subjects.index'));
        }

        $this->subjectsRepository->delete($id);

        Flash::success('Subjects deleted successfully.');

        return redirect(route('subjects.index'));
    }
}
