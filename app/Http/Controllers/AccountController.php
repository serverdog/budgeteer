<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Account;
use App\Models\Currency;
use App\Models\Accounttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends AppBaseController
{
    /**
     * Display a listing of the Account.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Account $accounts */
        $accounts = Account::all();

        return view('accounts.index')
            ->with('accounts', $accounts);
    }

    /**
     * Show the form for creating a new Account.
     *
     * @return Response
     */
    public function create()
    {
        $accounttypes = Accounttype::pluck('name', 'id');
        $currencies = Currency::pluck('name', 'id');
        return view('accounts.create')->with(compact('accounttypes', 'currencies'));
    }

    /**
     * Store a newly created Account in storage.
     *
     * @param CreateAccountRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();

        
        /** @var Account $account */
        $account = Account::create($input);

      
        Flash::success('Account saved successfully.');

        return redirect(route('accounts.index'));
    }


    /**
     * Update the specified Account in storage.
     *
     * @param int $id
     * @param UpdateAccountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountRequest $request)
    {
        /** @var Account $account */
        $account = Account::find($id);

        if (empty($account)) {
            Flash::error('Account not found');

            return redirect(route('accounts.index'));
        }

        $account->fill($request->all());
        $account->save();

        Flash::success('Account updated successfully.');

        return redirect(route('accounts.index'));
    }

    /**
     * Remove the specified Account from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Account $account */
        $account = Account::find($id);

        if (empty($account)) {
            Flash::error('Account not found');

            return redirect(route('accounts.index'));
        }

        $account->delete();

        Flash::success('Account deleted successfully.');

        return redirect(route('accounts.index'));
    }
}
