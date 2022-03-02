<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDesignationsRequest;
use App\Http\Requests\UpdateDesignationsRequest;
use App\Repositories\DesignationsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Designations;
use Illuminate\Http\Request;
use Flash;
use Response;

class DesignationsController extends AppBaseController
{
    /** @var  DesignationsRepository */
    private $designationsRepository;

    public function __construct(DesignationsRepository $designationsRepo)
    {
        $this->designationsRepository = $designationsRepo;
    }

    /**
     * Display a listing of the Designations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $designations = $this->designationsRepository->all();

        return view('designations.index')
            ->with('designations', $designations);
    }

    /**
     * Show the form for creating a new Designations.
     *
     * @return Response
     */
    public function create()
    {
        return view('designations.create');
    }

    /**
     * Store a newly created Designations in storage.
     *
     * @param CreateDesignationsRequest $request
     *
     * @return Response
     */
    public function store(CreateDesignationsRequest $request)
    {
        $input = $request->all();

        $designations = $this->designationsRepository->create($input);

        Flash::success('Designations saved successfully.');

        return redirect(route('designations.index'));
    }

    /**
     * Display the specified Designations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $designations = $this->designationsRepository->find($id);

        if (empty($designations)) {
            Flash::error('Designations not found');

            return redirect(route('designations.index'));
        }

        return view('designations.show')->with('designations', $designations);
    }

    /**
     * Show the form for editing the specified Designations.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $designations = $this->designationsRepository->find($id);

    //     if (empty($designations)) {
    //         Flash::error('Designations not found');

    //         return redirect(route('designations.index'));
    //     }

    //     return view('designations.edit')->with('designations', $designations);
    // }
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(Designations::find($request->id));
        }
    }

    /**
     * Update the specified Designations in storage.
     *
     * @param int $id
     * @param UpdateDesignationsRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateDesignationsRequest $request)
    // {
    //     $designations = $this->designationsRepository->find($id);

    //     if (empty($designations)) {
    //         Flash::error('Designations not found');

    //         return redirect(route('designations.index'));
    //     }

    //     $designations = $this->designationsRepository->update($request->all(), $id);

    //     Flash::success('Designations updated successfully.');

    //     return redirect(route('designations.index'));
    // }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:designations,name'
        ]);

        $designations = array(
            'id' => $request->id,
            'name' => $request->name,
        );

        Designations::FindOrFail($request->id)->update($designations);

        if (empty($designations)) {
            Flash::error('Designation not found');
        }

        Flash::success('Designation updated successfully.');

        return redirect(route('designations.index'));
    }

    /**
     * Remove the specified Designations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $designations = $this->designationsRepository->find($id);

        if (empty($designations)) {
            Flash::error('Designations not found');

            return redirect(route('designations.index'));
        }

        $this->designationsRepository->delete($id);

        Flash::success('Designations deleted successfully.');

        return redirect(route('designations.index'));
    }
}
