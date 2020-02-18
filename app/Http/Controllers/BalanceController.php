<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBalanceRequest;
use App\Http\Requests\UpdateBalanceRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Balance;
use Illuminate\Http\Request;
use Flash;
use Response;

class BalanceController extends AppBaseController
{
    /**
     * Display a listing of the Balance.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Balance $balances */
        $balances = Balance::all();

        return view('balances.index')
            ->with('balances', $balances);
    }

    /**
     * Show the form for creating a new Balance.
     *
     * @return Response
     */
    public function create()
    {
        return view('balances.create');
    }

    /**
     * Store a newly created Balance in storage.
     *
     * @param CreateBalanceRequest $request
     *
     * @return Response
     */
    public function store(CreateBalanceRequest $request)
    {
        $input = $request->all();

        /** @var Balance $balance */
        $balance = Balance::create($input);

        Flash::success('Balance saved successfully.');

        return redirect(route('balances.index'));
    }

    /**
     * Display the specified Balance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Balance $balance */
        $balance = Balance::find($id);

        if (empty($balance)) {
            Flash::error('Balance not found');

            return redirect(route('balances.index'));
        }

        return view('balances.show')->with('balance', $balance);
    }

    /**
     * Show the form for editing the specified Balance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Balance $balance */
        $balance = Balance::find($id);

        if (empty($balance)) {
            Flash::error('Balance not found');

            return redirect(route('balances.index'));
        }

        return view('balances.edit')->with('balance', $balance);
    }

    /**
     * Update the specified Balance in storage.
     *
     * @param int $id
     * @param UpdateBalanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBalanceRequest $request)
    {
        /** @var Balance $balance */
        $balance = Balance::find($id);

        if (empty($balance)) {
            Flash::error('Balance not found');

            return redirect(route('balances.index'));
        }

        $balance->fill($request->all());
        $balance->save();

        Flash::success('Balance updated successfully.');

        return redirect(route('balances.index'));
    }

    /**
     * Remove the specified Balance from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Balance $balance */
        $balance = Balance::find($id);

        if (empty($balance)) {
            Flash::error('Balance not found');

            return redirect(route('balances.index'));
        }

        $balance->delete();

        Flash::success('Balance deleted successfully.');

        return redirect(route('balances.index'));
    }
}
