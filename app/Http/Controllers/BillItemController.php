<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillItemRequest;
use App\Http\Requests\UpdateBillItemRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\BillItem;
use Illuminate\Http\Request;
use Flash;
use Response;

class BillItemController extends AppBaseController
{
    /**
     * Display a listing of the BillItem.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var BillItem $billItems */
        $billItems = BillItem::all();

        return view('bill_items.index')
            ->with('billItems', $billItems);
    }

    /**
     * Show the form for creating a new BillItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('bill_items.create');
    }

    /**
     * Store a newly created BillItem in storage.
     *
     * @param CreateBillItemRequest $request
     *
     * @return Response
     */
    public function store(CreateBillItemRequest $request)
    {
        $input = $request->all();

        /** @var BillItem $billItem */
        $billItem = BillItem::create($input);

        Flash::success('Bill Item saved successfully.');

        return redirect(route('billItems.index'));
    }

    /**
     * Display the specified BillItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BillItem $billItem */
        $billItem = BillItem::find($id);

        if (empty($billItem)) {
            Flash::error('Bill Item not found');

            return redirect(route('billItems.index'));
        }

        return view('bill_items.show')->with('billItem', $billItem);
    }

    /**
     * Show the form for editing the specified BillItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var BillItem $billItem */
        $billItem = BillItem::find($id);

        if (empty($billItem)) {
            Flash::error('Bill Item not found');

            return redirect(route('billItems.index'));
        }

        return view('bill_items.edit')->with('billItem', $billItem);
    }

    /**
     * Update the specified BillItem in storage.
     *
     * @param int $id
     * @param UpdateBillItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillItemRequest $request)
    {
        /** @var BillItem $billItem */
        $billItem = BillItem::find($id);

        if (empty($billItem)) {
            Flash::error('Bill Item not found');

            return redirect(route('billItems.index'));
        }

        $billItem->fill($request->all());
        $billItem->save();

        Flash::success('Bill Item updated successfully.');

        return redirect(route('billItems.index'));
    }

    /**
     * Remove the specified BillItem from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BillItem $billItem */
        $billItem = BillItem::find($id);

        if (empty($billItem)) {
            Flash::error('Bill Item not found');

            return redirect(route('billItems.index'));
        }

        $billItem->delete();

        Flash::success('Bill Item deleted successfully.');

        return redirect(route('billItems.index'));
    }
}
