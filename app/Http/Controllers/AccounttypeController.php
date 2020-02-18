<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccounttypeRequest;
use App\Http\Requests\UpdateAccounttypeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Accounttype;
use Illuminate\Http\Request;
use Flash;
use Response;

class AccounttypeController extends AppBaseController
{
    /**
     * Display a listing of the Accounttype.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Accounttype $accounttypes */
        $accounttypes = Accounttype::all();

        return view('accounttypes.index')
            ->with('accounttypes', $accounttypes);
    }

    /**
     * Show the form for creating a new Accounttype.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounttypes.create');
    }

    /**
     * Store a newly created Accounttype in storage.
     *
     * @param CreateAccounttypeRequest $request
     *
     * @return Response
     */
    public function store(CreateAccounttypeRequest $request)
    {
        $input = $request->all();

        /** @var Accounttype $accounttype */
        $accounttype = Accounttype::create($input);

        Flash::success('Accounttype saved successfully.');

        return redirect(route('accounttypes.index'));
    }

    /**
     * Display the specified Accounttype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Accounttype $accounttype */
        $accounttype = Accounttype::find($id);

        if (empty($accounttype)) {
            Flash::error('Accounttype not found');

            return redirect(route('accounttypes.index'));
        }

        return view('accounttypes.show')->with('accounttype', $accounttype);
    }

    /**
     * Show the form for editing the specified Accounttype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Accounttype $accounttype */
        $accounttype = Accounttype::find($id);

        if (empty($accounttype)) {
            Flash::error('Accounttype not found');

            return redirect(route('accounttypes.index'));
        }

        return view('accounttypes.edit')->with('accounttype', $accounttype);
    }

    /**
     * Update the specified Accounttype in storage.
     *
     * @param int $id
     * @param UpdateAccounttypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccounttypeRequest $request)
    {
        /** @var Accounttype $accounttype */
        $accounttype = Accounttype::find($id);

        if (empty($accounttype)) {
            Flash::error('Accounttype not found');

            return redirect(route('accounttypes.index'));
        }

        $accounttype->fill($request->all());
        $accounttype->save();

        Flash::success('Accounttype updated successfully.');

        return redirect(route('accounttypes.index'));
    }

    /**
     * Remove the specified Accounttype from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Accounttype $accounttype */
        $accounttype = Accounttype::find($id);

        if (empty($accounttype)) {
            Flash::error('Accounttype not found');

            return redirect(route('accounttypes.index'));
        }

        $accounttype->delete();

        Flash::success('Accounttype deleted successfully.');

        return redirect(route('accounttypes.index'));
    }
}
