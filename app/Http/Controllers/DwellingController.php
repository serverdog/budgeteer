<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDwellingRequest;
use App\Http\Requests\UpdateDwellingRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Dwelling;
use Illuminate\Http\Request;
use Flash;
use Response;

class DwellingController extends AppBaseController
{
    /**
     * Display a listing of the Dwelling.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Dwelling $dwellings */
        $dwellings = Dwelling::all();

        return view('dwellings.index')
            ->with('dwellings', $dwellings);
    }

    /**
     * Show the form for creating a new Dwelling.
     *
     * @return Response
     */
    public function create()
    {
        return view('dwellings.create');
    }

    /**
     * Store a newly created Dwelling in storage.
     *
     * @param CreateDwellingRequest $request
     *
     * @return Response
     */
    public function store(CreateDwellingRequest $request)
    {
        $input = $request->all();

        /** @var Dwelling $dwelling */
        $dwelling = Dwelling::create($input);

        Flash::success('Dwelling saved successfully.');

        return redirect(route('dwellings.index'));
    }

    /**
     * Display the specified Dwelling.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dwelling $dwelling */
        $dwelling = Dwelling::find($id);

        if (empty($dwelling)) {
            Flash::error('Dwelling not found');

            return redirect(route('dwellings.index'));
        }

        return view('dwellings.show')->with('dwelling', $dwelling);
    }

    /**
     * Show the form for editing the specified Dwelling.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Dwelling $dwelling */
        $dwelling = Dwelling::find($id);

        if (empty($dwelling)) {
            Flash::error('Dwelling not found');

            return redirect(route('dwellings.index'));
        }

        return view('dwellings.edit')->with('dwelling', $dwelling);
    }

    /**
     * Update the specified Dwelling in storage.
     *
     * @param int $id
     * @param UpdateDwellingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDwellingRequest $request)
    {
        /** @var Dwelling $dwelling */
        $dwelling = Dwelling::find($id);

        if (empty($dwelling)) {
            Flash::error('Dwelling not found');

            return redirect(route('dwellings.index'));
        }

        $dwelling->fill($request->all());
        $dwelling->save();

        Flash::success('Dwelling updated successfully.');

        return redirect(route('dwellings.index'));
    }

    /**
     * Remove the specified Dwelling from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dwelling $dwelling */
        $dwelling = Dwelling::find($id);

        if (empty($dwelling)) {
            Flash::error('Dwelling not found');

            return redirect(route('dwellings.index'));
        }

        $dwelling->delete();

        Flash::success('Dwelling deleted successfully.');

        return redirect(route('dwellings.index'));
    }
}
