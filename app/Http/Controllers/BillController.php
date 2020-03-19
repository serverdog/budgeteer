<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Bill;
use App\Models\BillItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Http\Controllers\AppBaseController;

class BillController extends AppBaseController
{
    /**
     * Display a listing of the Bill.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Bill $bills */
        $bills = Bill::all();
        $graphData = Bill::where('user_id', Auth::id())
                ->select('dayofmonth', \DB::raw('sum(monthly) as total'))
                ->whereNotNull('monthly')
                ->groupBy('dayofmonth')
                ->get()
                ->pluck('total', 'dayofmonth');


        return view('bills.index')->with(compact('bills', 'graphData'));
    }

    /**
     * Show the form for creating a new Bill.
     *
     * @return Response
     */
    public function create()
    {
        $items = BillItem::orderBy('name')->get();
        $bills = Bill::where('user_id', Auth::id())->orderBy('name')->get();
        return view('bills.create')->with(compact('items', 'bills'));
    }

    /**
     * Store a newly created Bill in storage.
     *
     * @param CreateBillRequest $request
     *
     * @return Response
     */
    public function store(CreateBillRequest $request)
    {
        $rows = $request->except(['_token']);
        $user_id = Auth::id();

        Bill::where('user_id', $user_id)->delete();

        foreach ($rows as $row) {
            $row['user_id'] = $user_id;
            $bill = Bill::create($row);
            $bill->save();
        }

        Flash::success('Bill saved successfully.');

        return redirect(route('bills.index'));
    }

    /**
     * Display the specified Bill.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bill $bill */
        $bill = Bill::find($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        return view('bills.show')->with('bill', $bill);
    }

    /**
     * Show the form for editing the specified Bill.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Bill $bill */
        $bill = Bill::find($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        return view('bills.edit')->with('bill', $bill);
    }

    /**
     * Update the specified Bill in storage.
     *
     * @param int $id
     * @param UpdateBillRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillRequest $request)
    {
        /** @var Bill $bill */
        $bill = Bill::find($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        $bill->fill($request->all());
        $bill->save();

        Flash::success('Bill updated successfully.');

        return redirect(route('bills.index'));
    }

    /**
     * Remove the specified Bill from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bill $bill */
        $bill = Bill::find($id);

        if (empty($bill)) {
            Flash::error('Bill not found');

            return redirect(route('bills.index'));
        }

        $bill->delete();

        Flash::success('Bill deleted successfully.');

        return redirect(route('bills.index'));
    }
}
