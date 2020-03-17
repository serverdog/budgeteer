<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Account;
use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateBalanceRequest;
use App\Http\Requests\UpdateBalanceRequest;

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
        $accounts = Account::where('user_id', Auth::id())->with('Accounttype', 'Accounttype.Category')->orderBy('accounttype_id')->get();
        $balances = Balance::where('user_id', Auth::id())->latest()->pluck('amount', 'account_id');

        return view('balances.create')->with(compact('accounts', 'balances'));
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
        $rows = $request->except(['date','_token']);
        $user_id = Auth::id();
        $accounts = Account::where('user_id', $user_id)->select('id')->get()->pluck('id');
        $date = $request->get('date');

        Balance::where('user_id', $user_id)->update(['latest'=> false]);
        Balance::where('user_id', $user_id)->where('date', $date)->delete();

        foreach ($rows as $row) {
            //check this users owns this account
            if ($accounts->keys()->contains($row['account_id']) && !is_null($row['amount'])) {
                $row['user_id'] = $user_id;
                $row['latest'] = true;
                $row['date'] = $date;
                $balance = Balance::create($row);
                $balance->save();
            }
        }

        Flash::success('Balance saved successfully.');

        return redirect(route('home'));
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
