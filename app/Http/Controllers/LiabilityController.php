<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLiabilityRequest;
use App\Http\Requests\UpdateLiabilityRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Liability;
use Illuminate\Http\Request;
use Flash;
use Response;

class LiabilityController extends AppBaseController
{
    /**
     * Display a listing of the Liability.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Liability $liabilities */
        $liabilities = Liability::all();

        return view('liabilities.index')
            ->with('liabilities', $liabilities);
    }

    /**
     * Show the form for creating a new Liability.
     *
     * @return Response
     */
    public function create()
    {
        return view('liabilities.create');
    }

    /**
     * Store a newly created Liability in storage.
     *
     * @param CreateLiabilityRequest $request
     *
     * @return Response
     */
    public function store(CreateLiabilityRequest $request)
    {
        $input = $request->all();

        /** @var Liability $liability */
        $liability = Liability::create($input);

        Flash::success('Liability saved successfully.');

        return redirect(route('liabilities.index'));
    }

    /**
     * Display the specified Liability.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Liability $liability */
        $liability = Liability::find($id);

        if (empty($liability)) {
            Flash::error('Liability not found');

            return redirect(route('liabilities.index'));
        }

        return view('liabilities.show')->with('liability', $liability);
    }

    /**
     * Show the form for editing the specified Liability.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Liability $liability */
        $liability = Liability::find($id);

        if (empty($liability)) {
            Flash::error('Liability not found');

            return redirect(route('liabilities.index'));
        }

        return view('liabilities.edit')->with('liability', $liability);
    }

    /**
     * Update the specified Liability in storage.
     *
     * @param int $id
     * @param UpdateLiabilityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLiabilityRequest $request)
    {
        /** @var Liability $liability */
        $liability = Liability::find($id);

        if (empty($liability)) {
            Flash::error('Liability not found');

            return redirect(route('liabilities.index'));
        }

        $liability->fill($request->all());
        $liability->save();

        Flash::success('Liability updated successfully.');

        return redirect(route('liabilities.index'));
    }

    /**
     * Remove the specified Liability from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Liability $liability */
        $liability = Liability::find($id);

        if (empty($liability)) {
            Flash::error('Liability not found');

            return redirect(route('liabilities.index'));
        }

        $liability->delete();

        Flash::success('Liability deleted successfully.');

        return redirect(route('liabilities.index'));
    }
}
