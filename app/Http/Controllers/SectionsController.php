<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSectionsRequest;
use App\Http\Requests\UpdateSectionsRequest;
use App\Repositories\SectionsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Sections;
use Illuminate\Http\Request;
use Flash;
use Response;

class SectionsController extends AppBaseController
{
    /** @var  SectionsRepository */
    private $sectionsRepository;

    public function __construct(SectionsRepository $sectionsRepo)
    {
        $this->sectionsRepository = $sectionsRepo;
    }

    /**
     * Display a listing of the Sections.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sections = $this->sectionsRepository->all();

        return view('sections.index')
            ->with('sections', $sections);
    }

    /**
     * Show the form for creating a new Sections.
     *
     * @return Response
     */
    public function create()
    {
        return view('sections.create');
    }

    /**
     * Store a newly created Sections in storage.
     *
     * @param CreateSectionsRequest $request
     *
     * @return Response
     */
    public function store(CreateSectionsRequest $request)
    {
        $input = $request->all();

        $sections = $this->sectionsRepository->create($input);

        Flash::success('Sections saved successfully.');

        return redirect(route('sections.index'));
    }

    /**
     * Display the specified Sections.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sections = $this->sectionsRepository->find($id);

        if (empty($sections)) {
            Flash::error('Sections not found');

            return redirect(route('sections.index'));
        }

        return view('sections.show')->with('sections', $sections);
    }

    /**
     * Show the form for editing the specified Sections.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $sections = $this->sectionsRepository->find($id);

    //     if (empty($sections)) {
    //         Flash::error('Sections not found');

    //         return redirect(route('sections.index'));
    //     }

    //     return view('sections.edit')->with('sections', $sections);
    // }
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(Sections::find($request->id));
        }
    }

    /**
     * Update the specified Sections in storage.
     *
     * @param int $id
     * @param UpdateSectionsRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateSectionsRequest $request)
    // {
    //     $sections = $this->sectionsRepository->find($id);

    //     if (empty($sections)) {
    //         Flash::error('Sections not found');

    //         return redirect(route('sections.index'));
    //     }

    //     $sections = $this->sectionsRepository->update($request->all(), $id);

    //     Flash::success('Sections updated successfully.');

    //     return redirect(route('sections.index'));
    // }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sections,name'
        ]);

        $sessions = array(
            'id' => $request->id,
            'name' => $request->name,
        );

        Sections::FindOrFail($request->id)->update($sections);

        if (empty($sessions)) {
            Flash::error('Section not found');
        }

        Flash::success('Section updated successfully.');

        return redirect(route('sections.index'));
    }

    /**
     * Remove the specified Sections from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sections = $this->sectionsRepository->find($id);

        if (empty($sections)) {
            Flash::error('Sections not found');

            return redirect(route('sections.index'));
        }

        $this->sectionsRepository->delete($id);

        Flash::success('Sections deleted successfully.');

        return redirect(route('sections.index'));
    }
}
