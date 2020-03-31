<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillCategoryRequest;
use App\Http\Requests\UpdateBillCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\BillCategory;
use Illuminate\Http\Request;
use Flash;
use Response;

class BillCategoryController extends AppBaseController
{
    /**
     * Display a listing of the BillCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var BillCategory $billCategories */
        $billCategories = BillCategory::all();

        return view('bill_categories.index')
            ->with('billCategories', $billCategories);
    }

    /**
     * Show the form for creating a new BillCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('bill_categories.create');
    }

    /**
     * Store a newly created BillCategory in storage.
     *
     * @param CreateBillCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateBillCategoryRequest $request)
    {
        $input = $request->all();

        /** @var BillCategory $billCategory */
        $billCategory = BillCategory::create($input);

        Flash::success('Bill Category saved successfully.');

        return redirect(route('billCategories.index'));
    }

    /**
     * Display the specified BillCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BillCategory $billCategory */
        $billCategory = BillCategory::find($id);

        if (empty($billCategory)) {
            Flash::error('Bill Category not found');

            return redirect(route('billCategories.index'));
        }

        return view('bill_categories.show')->with('billCategory', $billCategory);
    }

    /**
     * Show the form for editing the specified BillCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var BillCategory $billCategory */
        $billCategory = BillCategory::find($id);

        if (empty($billCategory)) {
            Flash::error('Bill Category not found');

            return redirect(route('billCategories.index'));
        }

        return view('bill_categories.edit')->with('billCategory', $billCategory);
    }

    /**
     * Update the specified BillCategory in storage.
     *
     * @param int $id
     * @param UpdateBillCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillCategoryRequest $request)
    {
        /** @var BillCategory $billCategory */
        $billCategory = BillCategory::find($id);

        if (empty($billCategory)) {
            Flash::error('Bill Category not found');

            return redirect(route('billCategories.index'));
        }

        $billCategory->fill($request->all());
        $billCategory->save();

        Flash::success('Bill Category updated successfully.');

        return redirect(route('billCategories.index'));
    }

    /**
     * Remove the specified BillCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BillCategory $billCategory */
        $billCategory = BillCategory::find($id);

        if (empty($billCategory)) {
            Flash::error('Bill Category not found');

            return redirect(route('billCategories.index'));
        }

        $billCategory->delete();

        Flash::success('Bill Category deleted successfully.');

        return redirect(route('billCategories.index'));
    }
}
