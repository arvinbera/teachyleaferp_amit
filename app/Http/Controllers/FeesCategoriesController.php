<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeesCategoriesRequest;
use App\Http\Requests\UpdateFeesCategoriesRequest;
use App\Repositories\FeesCategoriesRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\FeesCategories;
use Illuminate\Http\Request;
use Flash;
use Response;

class FeesCategoriesController extends AppBaseController
{
    /** @var  FeesCategoriesRepository */
    private $feesCategoriesRepository;

    public function __construct(FeesCategoriesRepository $feesCategoriesRepo)
    {
        $this->feesCategoriesRepository = $feesCategoriesRepo;
    }

    /**
     * Display a listing of the FeesCategories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $feesCategories = $this->feesCategoriesRepository->all();

        return view('fees_categories.index')
            ->with('feesCategories', $feesCategories);
    }

    /**
     * Show the form for creating a new FeesCategories.
     *
     * @return Response
     */
    public function create()
    {
        return view('fees_categories.create');
    }

    /**
     * Store a newly created FeesCategories in storage.
     *
     * @param CreateFeesCategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateFeesCategoriesRequest $request)
    {
        $input = $request->all();

        $feesCategories = $this->feesCategoriesRepository->create($input);

        Flash::success('Fees Categories saved successfully.');

        return redirect(route('feesCategories.index'));
    }

    /**
     * Display the specified FeesCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $feesCategories = $this->feesCategoriesRepository->find($id);

        if (empty($feesCategories)) {
            Flash::error('Fees Categories not found');

            return redirect(route('feesCategories.index'));
        }

        return view('fees_categories.show')->with('feesCategories', $feesCategories);
    }

    /**
     * Show the form for editing the specified FeesCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $feesCategories = $this->feesCategoriesRepository->find($id);

    //     if (empty($feesCategories)) {
    //         Flash::error('Fees Categories not found');

    //         return redirect(route('feesCategories.index'));
    //     }

    //     return view('fees_categories.edit')->with('feesCategories', $feesCategories);
    // }
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            return response(FeesCategories::find($request->id));
        }
    }

    /**
     * Update the specified FeesCategories in storage.
     *
     * @param int $id
     * @param UpdateFeesCategoriesRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateFeesCategoriesRequest $request)
    // {
    //     $feesCategories = $this->feesCategoriesRepository->find($id);

    //     if (empty($feesCategories)) {
    //         Flash::error('Fees Categories not found');

    //         return redirect(route('feesCategories.index'));
    //     }

    //     $feesCategories = $this->feesCategoriesRepository->update($request->all(), $id);

    //     Flash::success('Fees Categories updated successfully.');

    //     return redirect(route('feesCategories.index'));
    // }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:fees_categories,name'
        ]);

        $fees_categories = array(
            'id' => $request->id,
            'name' => $request->name,
        );

        FeesCategories::FindOrFail($request->id)->update($fees_categories);

        if (empty($fees_categories)) {
            Flash::error('Fees Category not found');
        }

        Flash::success('Fees Category updated successfully.');

        return redirect(route('fees_categories.index'));
    }

    /**
     * Remove the specified FeesCategories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $feesCategories = $this->feesCategoriesRepository->find($id);

        if (empty($feesCategories)) {
            Flash::error('Fees Categories not found');

            return redirect(route('feesCategories.index'));
        }

        $this->feesCategoriesRepository->delete($id);

        Flash::success('Fees Categories deleted successfully.');

        return redirect(route('feesCategories.index'));
    }
}
