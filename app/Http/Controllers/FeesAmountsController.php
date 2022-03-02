<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeesAmountsRequest;
use App\Http\Requests\UpdateFeesAmountsRequest;
use App\Repositories\FeesAmountsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\FeesCategories;
use App\Models\Classes;
use App\Models\FeesAmounts;
use Illuminate\Http\Request;
use Flash;
use Response;

class FeesAmountsController extends AppBaseController
{
    /** @var  FeesAmountsRepository */
    private $feesAmountsRepository;

    public function __construct(FeesAmountsRepository $feesAmountsRepo)
    {
        $this->feesAmountsRepository = $feesAmountsRepo;
    }

    /**
     * Display a listing of the FeesAmounts.
     *
     * @param Request $request
     *
     * @return Response
     */
    // public function index(Request $request)
    // {
    //     $feesAmounts = $this->feesAmountsRepository->all();

    //     return view('fees_amounts.index')
    //         ->with('feesAmounts', $feesAmounts);
    // }
    public function index(Request $request)
    {
        $feesAmounts = FeesAmounts::select('fees_category_id')->groupBy('fees_category_id')->get();

        return view('fees_amounts.index')
            ->with('feesAmounts', $feesAmounts);
    }

    /**
     * Show the form for creating a new FeesAmounts.
     *
     * @return Response
     */
    public function create() 
    {
        $data['fees_categories'] = FeesCategories::all();
        $data['classes'] = Classes::all();

        return view('fees_amounts.create', $data);
    }

    /**
     * Store a newly created FeesAmounts in storage.
     *
     * @param CreateFeesAmountsRequest $request
     *
     * @return Response
     */
    // public function store(CreateFeesAmountsRequest $request)
    // {
    //     $input = $request->all();

    //     $feesAmounts = $this->feesAmountsRepository->create($input);

    //     Flash::success('Fees Amounts saved successfully.');

    //     return redirect(route('feesAmounts.index'));
    // }
    public function store(CreateFeesAmountsRequest $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != null) {
            for ($i = 0; $i < $countClass; $i++) {
                $feesAmounts = new FeesAmounts();
                $feesAmounts->fees_category_id = $request->fees_category_id;
                $feesAmounts->class_id = $request->class_id[$i];
                $feesAmounts->amount = $request->amount[$i];
                $feesAmounts->save();
            }
        }

        Flash::success('Fees Amounts saved successfully.');

        return redirect(route('feesAmounts.index'));
    }

    /**
     * Display the specified FeesAmounts.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $feesAmounts = $this->feesAmountsRepository->find($id);

    //     if (empty($feesAmounts)) {
    //         Flash::error('Fees Amounts not found');

    //         return redirect(route('feesAmounts.index'));
    //     }

    //     return view('fees_amounts.show')->with('feesAmounts', $feesAmounts);
    // }
    public function show($fees_category_id)
    {
        $data['feesAmounts'] = FeesAmounts::where('fees_category_id', $fees_category_id)->orderBy('class_id', 'asc')->get();

        if (empty($data)) {
            Flash::error('Fees Amounts not found');

            return redirect(route('feesAmounts.index'));
        }

        return view('fees_amounts.show', $data);
    }

    /**
     * Show the form for editing the specified FeesAmounts.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $feesAmounts = $this->feesAmountsRepository->find($id);

    //     if (empty($feesAmounts)) {
    //         Flash::error('Fees Amounts not found');

    //         return redirect(route('feesAmounts.index'));
    //     }

    //     return view('fees_amounts.edit')->with('feesAmounts', $feesAmounts);
    // }
    public function edit($fees_category_id)
    {
        $data['feesAmounts'] = FeesAmounts::where('fees_category_id', $fees_category_id)->orderBy('class_id', 'asc')->get();
        // dd($data['feesAmounts']->toArray());
        $data['fees_categories'] = FeesCategories::all();
        $data['classes'] = Classes::all();

        if (empty($data)) {
            Flash::error('Fees Amounts not found');

            return redirect(route('feesAmounts.index'));
        }

        return view('fees_amounts.edit', $data);
    }

    /**
     * Update the specified FeesAmounts in storage.
     *
     * @param int $id
     * @param UpdateFeesAmountsRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateFeesAmountsRequest $request)
    // {
    //     $feesAmounts = $this->feesAmountsRepository->find($id);

    //     if (empty($feesAmounts)) {
    //         Flash::error('Fees Amounts not found');

    //         return redirect(route('feesAmounts.index'));
    //     }

    //     $feesAmounts = $this->feesAmountsRepository->update($request->all(), $id);

    //     Flash::success('Fees Amounts updated successfully.');

    //     return redirect(route('feesAmounts.index'));
    // }
    public function update($fees_category_id, UpdateFeesAmountsRequest $request)
    {
        if ($request->class_id == null) {
            Flash::error('Class not found');
            return redirect()->back();
        } else {
            FeesAmounts::where('fees_category_id', $fees_category_id)->delete();
            $countClass = count($request->class_id);
            for ($i = 0; $i < $countClass; $i++) {
                $feesAmounts = new FeesAmounts();
                $feesAmounts->fees_category_id = $request->fees_category_id;
                $feesAmounts->class_id = $request->class_id[$i];
                $feesAmounts->amount = $request->amount[$i];
                $feesAmounts->save();
            }
        }

        Flash::success('Fees Amounts updated successfully.');

        return redirect(route('feesAmounts.index'));
    }

    /**
     * Remove the specified FeesAmounts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $feesAmounts = $this->feesAmountsRepository->find($id);

        if (empty($feesAmounts)) {
            Flash::error('Fees Amounts not found');

            return redirect(route('feesAmounts.index'));
        }

        $this->feesAmountsRepository->delete($id);

        Flash::success('Fees Amounts deleted successfully.');

        return redirect(route('feesAmounts.index'));
    }
}
