<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSessionsRequest;
use App\Http\Requests\UpdateSessionsRequest;
use App\Repositories\SessionsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Sessions;
use Illuminate\Http\Request;
use Flash;
use Response;

class SessionsController extends AppBaseController
{
    /** @var  SessionsRepository */
    private $sessionsRepository;

    public function __construct(SessionsRepository $sessionsRepo)
    {
        $this->sessionsRepository = $sessionsRepo;
    }

    /**
     * Display a listing of the Sessions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sessions = $this->sessionsRepository->all();

        return view('sessions.index')
            ->with('sessions', $sessions);
    }

    /**
     * Show the form for creating a new Sessions.
     *
     * @return Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created Sessions in storage.
     *
     * @param CreateSessionsRequest $request
     *
     * @return Response
     */
    public function store(CreateSessionsRequest $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:sessions,name'
        // ]);

        $input = $request->all();

        $sessions = $this->sessionsRepository->create($input);

        Flash::success('Sessions saved successfully.');

        return redirect(route('sessions.index'));
    }

    /**
     * Display the specified Sessions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions)) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        return view('sessions.show')->with('sessions', $sessions);
    }

    /**
     * Show the form for editing the specified Sessions.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $sessions = $this->sessionsRepository->find($id);

    //     if (empty($sessions)) {
    //         Flash::error('Sessions not found');

    //         return redirect(route('sessions.index'));
    //     }

    //     return view('sessions.edit')->with('sessions', $sessions);
    // }
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(Sessions::find($request->id));
        }
    }

    /**
     * Update the specified Sessions in storage.
     *
     * @param int $id
     * @param UpdateSessionsRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateSessionsRequest $request)
    // {
    //     $sessions = $this->sessionsRepository->find($id);

    //     if (empty($sessions)) {
    //         Flash::error('Sessions not found');

    //         return redirect(route('sessions.index'));
    //     }

    //     $sessions = $this->sessionsRepository->update($request->all(), $id);

    //     Flash::success('Sessions updated successfully.');

    //     return redirect(route('sessions.index'));
    // }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sessions,name'
        ]);

        $sessions = array(
            'id' => $request->id,
            'name' => $request->name,
        );

        Sessions::FindOrFail($request->id)->update($sessions);

        if (empty($sessions)) {
            Flash::error('Session not found');
        }

        Flash::success('Session updated successfully.');

        return redirect(route('sessions.index'));
    }

    /**
     * Remove the specified Sessions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sessions = $this->sessionsRepository->find($id);

        if (empty($sessions)) {
            Flash::error('Sessions not found');

            return redirect(route('sessions.index'));
        }

        $this->sessionsRepository->delete($id);

        Flash::success('Sessions deleted successfully.');

        return redirect(route('sessions.index'));
    }
}
