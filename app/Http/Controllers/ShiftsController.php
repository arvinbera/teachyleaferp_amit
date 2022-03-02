<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShiftsRequest;
use App\Http\Requests\UpdateShiftsRequest;
use App\Repositories\ShiftsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Shifts;
use Illuminate\Http\Request;
use Flash;
use Response;

class ShiftsController extends AppBaseController
{
    /** @var  ShiftsRepository */
    private $shiftsRepository;

    public function __construct(ShiftsRepository $shiftsRepo)
    {
        $this->shiftsRepository = $shiftsRepo;
    }

    /**
     * Display a listing of the Shifts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shifts = $this->shiftsRepository->all();

        return view('shifts.index')
            ->with('shifts', $shifts);
    }

    /**
     * Show the form for creating a new Shifts.
     *
     * @return Response
     */
    public function create()
    {
        return view('shifts.create');
    }

    /**
     * Store a newly created Shifts in storage.
     *
     * @param CreateShiftsRequest $request
     *
     * @return Response
     */
    public function store(CreateShiftsRequest $request)
    {
        $input = $request->all();

        $shifts = $this->shiftsRepository->create($input);

        Flash::success('Shifts saved successfully.');

        return redirect(route('shifts.index'));
    }

    /**
     * Display the specified Shifts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shifts = $this->shiftsRepository->find($id);

        if (empty($shifts)) {
            Flash::error('Shifts not found');

            return redirect(route('shifts.index'));
        }

        return view('shifts.show')->with('shifts', $shifts);
    }

    /**
     * Show the form for editing the specified Shifts.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $shifts = $this->shiftsRepository->find($id);

    //     if (empty($shifts)) {
    //         Flash::error('Shifts not found');

    //         return redirect(route('shifts.index'));
    //     }

    //     return view('shifts.edit')->with('shifts', $shifts);
    // }
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(Shifts::find($request->id));
        }
    }

    /**
     * Update the specified Shifts in storage.
     *
     * @param int $id
     * @param UpdateShiftsRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateShiftsRequest $request)
    // {
    //     $shifts = $this->shiftsRepository->find($id);

    //     if (empty($shifts)) {
    //         Flash::error('Shifts not found');

    //         return redirect(route('shifts.index'));
    //     }

    //     $shifts = $this->shiftsRepository->update($request->all(), $id);

    //     Flash::success('Shifts updated successfully.');

    //     return redirect(route('shifts.index'));
    // }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:shifts,name'
        ]);

        $shifts = array(
            'id' => $request->id,
            'name' => $request->name,
        );

        Shifts::FindOrFail($request->id)->update($shifts);

        if (empty($shifts)) {
            Flash::error('Shift not found');
        }

        Flash::success('Shift updated successfully.');

        return redirect(route('shifts.index'));
    }

    /**
     * Remove the specified Shifts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shifts = $this->shiftsRepository->find($id);

        if (empty($shifts)) {
            Flash::error('Shifts not found');

            return redirect(route('shifts.index'));
        }

        $this->shiftsRepository->delete($id);

        Flash::success('Shifts deleted successfully.');

        return redirect(route('shifts.index'));
    }
}
