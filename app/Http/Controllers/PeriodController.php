<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Period;
use Illuminate\Http\Request;
use Flash;
use Response;

class PeriodController extends AppBaseController
{
    /**
     * Display a listing of the Period.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Period $periods */
        $periods = Period::all();

        return view('periods.index')
            ->with('periods', $periods);
    }

    /**
     * Show the form for creating a new Period.
     *
     * @return Response
     */
    public function create()
    {
        return view('periods.create');
    }

    /**
     * Store a newly created Period in storage.
     *
     * @param CreatePeriodRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodRequest $request)
    {
        $input = $request->all();

        /** @var Period $period */
        $period = Period::create($input);

        Flash::success('Period saved successfully.');

        return redirect(route('periods.index'));
    }

    /**
     * Display the specified Period.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Period $period */
        $period = Period::find($id);

        if (empty($period)) {
            Flash::error('Period not found');

            return redirect(route('periods.index'));
        }

        return view('periods.show')->with('period', $period);
    }

    /**
     * Show the form for editing the specified Period.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Period $period */
        $period = Period::find($id);

        if (empty($period)) {
            Flash::error('Period not found');

            return redirect(route('periods.index'));
        }

        return view('periods.edit')->with('period', $period);
    }

    /**
     * Update the specified Period in storage.
     *
     * @param int $id
     * @param UpdatePeriodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodRequest $request)
    {
        /** @var Period $period */
        $period = Period::find($id);

        if (empty($period)) {
            Flash::error('Period not found');

            return redirect(route('periods.index'));
        }

        $period->fill($request->all());
        $period->save();

        Flash::success('Period updated successfully.');

        return redirect(route('periods.index'));
    }

    /**
     * Remove the specified Period from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Period $period */
        $period = Period::find($id);

        if (empty($period)) {
            Flash::error('Period not found');

            return redirect(route('periods.index'));
        }

        $period->delete();

        Flash::success('Period deleted successfully.');

        return redirect(route('periods.index'));
    }
}
