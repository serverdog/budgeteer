<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Income;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Http\Controllers\AppBaseController;

class IncomeController extends AppBaseController
{
    /**
     * Display a listing of the Income.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Income $incomes */
        $incomes = Income::with('currency')->get();
        
        return view('incomes.index')
            ->with('incomes', $incomes);
    }

    /**
     * Show the form for creating a new Income.
     *
     * @return Response
     */
    public function create()
    {
        $currencies = Currency::pluck('name', 'id');
        return view('incomes.create')->with(compact('currencies'));
    }

    /**
     * Store a newly created Income in storage.
     *
     * @param CreateIncomeRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomeRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        /** @var Income $income */
        $income = Income::create($input);

        Flash::success('Income saved successfully.');

        return redirect(route('incomes.index'));
    }

    /**
     * Display the specified Income.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Income $income */
        $income = Income::find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('incomes.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified Income.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Income $income */
        $income = Income::find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('incomes.edit')->with('income', $income);
    }

    /**
     * Update the specified Income in storage.
     *
     * @param int $id
     * @param UpdateIncomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncomeRequest $request)
    {
        /** @var Income $income */
        $income = Income::find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        $income->fill($request->all());
        $income->save();

        Flash::success('Income updated successfully.');

        return redirect(route('incomes.index'));
    }

    /**
     * Remove the specified Income from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Income $income */
        $income = Income::find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        $income->delete();

        Flash::success('Income deleted successfully.');

        return redirect(route('incomes.index'));
    }
}
