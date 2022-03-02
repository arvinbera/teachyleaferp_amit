<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOtherExpensesRequest;
use App\Http\Requests\UpdateOtherExpensesRequest;
use App\Repositories\OtherExpensesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\OtherExpenses;
use Illuminate\Http\Request;
use Flash;
use Response;

class OtherExpensesController extends AppBaseController
{
    /** @var  OtherExpensesRepository */
    private $otherExpensesRepository;

    public function __construct(OtherExpensesRepository $otherExpensesRepo)
    {
        $this->otherExpensesRepository = $otherExpensesRepo;
    }

    /**
     * Display a listing of the OtherExpenses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $otherExpenses = $this->otherExpensesRepository->all();

        $data['otherExpenses'] = OtherExpenses::orderBy('id', 'desc')->get();

        return view('other_expenses.index', $data);
        // ->with('otherExpenses', $otherExpenses);
    }

    /**
     * Show the form for creating a new OtherExpenses.
     *
     * @return Response
     */
    public function create()
    {
        return view('other_expenses.create');
    }

    /**
     * Store a newly created OtherExpenses in storage.
     *
     * @param CreateOtherExpensesRequest $request
     *
     * @return Response
     */
    public function store(CreateOtherExpensesRequest $request)
    {
        $other_expenses = new OtherExpenses();
        $other_expenses->date = $request->date;
        $other_expenses->amount = $request->amount;
        $other_expenses->description = $request->description;

        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = md5(rand(1111, 9999)) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/other_expenses'), $image_name);
            $other_expenses->image = $image_name;
        }
        $other_expenses->save();

        Flash::success('Other Expenses saved successfully.');

        return redirect(route('otherExpenses.index'));
    }

    /**
     * Display the specified OtherExpenses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $otherExpenses = $this->otherExpensesRepository->find($id);

        if (empty($otherExpenses)) {
            Flash::error('Other Expenses not found');

            return redirect(route('otherExpenses.index'));
        }

        return view('other_expenses.show')->with('otherExpenses', $otherExpenses);
    }

    /**
     * Show the form for editing the specified OtherExpenses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $otherExpenses = $this->otherExpensesRepository->find($id);

        if (empty($otherExpenses)) {
            Flash::error('Other Expenses not found');

            return redirect(route('otherExpenses.index'));
        }

        return view('other_expenses.edit')->with('otherExpenses', $otherExpenses);
    }

    /**
     * Update the specified OtherExpenses in storage.
     *
     * @param int $id
     * @param UpdateOtherExpensesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOtherExpensesRequest $request)
    {
        $other_expenses = OtherExpenses::find($id);
        $other_expenses->date = $request->date;
        $other_expenses->amount = $request->amount;
        $other_expenses->description = $request->description;

        if ($request->file('image')) {
            @unlink(public_path('images/other_expenses/' . $other_expenses->image));
            $image = $request->file('image');
            $image_name = md5(rand(1111, 9999)) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/other_expenses'), $image_name);
            $other_expenses->image = $image_name;
        }
        $other_expenses->save();

        Flash::success('Other Expenses updated successfully.');

        return redirect(route('otherExpenses.index'));
    }

    /**
     * Remove the specified OtherExpenses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $otherExpenses = $this->otherExpensesRepository->find($id);

        if (empty($otherExpenses)) {
            Flash::error('Other Expenses not found');

            return redirect(route('otherExpenses.index'));
        }

        $this->otherExpensesRepository->delete($id);

        Flash::success('Other Expenses deleted successfully.');

        return redirect(route('otherExpenses.index'));
    }
}
