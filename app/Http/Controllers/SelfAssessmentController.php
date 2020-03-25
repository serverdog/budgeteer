<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Models\SelfAssessment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateSelfAssessmentRequest;
use App\Http\Requests\UpdateSelfAssessmentRequest;

class SelfAssessmentController extends AppBaseController
{
    /**
     * Display a listing of the SelfAssessment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SelfAssessment $selfAssessments */
        $selfAssessments = SelfAssessment::all();

        return view('self_assessments.index')
            ->with('selfAssessments', $selfAssessments);
    }

    /**
     * Show the form for creating a new SelfAssessment.
     *
     * @return Response
     */
    public function create()
    {
        $years = SelfAssessment::getYears();
        return view('self_assessments.create')->with(compact('years'));
    }

    /**
     * Store a newly created SelfAssessment in storage.
     *
     * @param CreateSelfAssessmentRequest $request
     *
     * @return Response
     */
    public function store(CreateSelfAssessmentRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        
        /** @var SelfAssessment $selfAssessment */
        $selfAssessment = SelfAssessment::create($input);

        Flash::success('Self Assessment saved successfully.');

        return redirect(route('selfAssessments.index'));
    }

    /**
     * Display the specified SelfAssessment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SelfAssessment $selfAssessment */
        $selfAssessment = SelfAssessment::find($id);

        if (empty($selfAssessment)) {
            Flash::error('Self Assessment not found');

            return redirect(route('selfAssessments.index'));
        }

        return view('self_assessments.show')->with('selfAssessment', $selfAssessment);
    }

    /**
     * Show the form for editing the specified SelfAssessment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SelfAssessment $selfAssessment */
        $selfAssessment = SelfAssessment::find($id);

        if (empty($selfAssessment)) {
            Flash::error('Self Assessment not found');

            return redirect(route('selfAssessments.index'));
        }

        return view('self_assessments.edit')->with('selfAssessment', $selfAssessment);
    }

    /**
     * Update the specified SelfAssessment in storage.
     *
     * @param int $id
     * @param UpdateSelfAssessmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSelfAssessmentRequest $request)
    {
        /** @var SelfAssessment $selfAssessment */
        $selfAssessment = SelfAssessment::find($id);

        if (empty($selfAssessment)) {
            Flash::error('Self Assessment not found');

            return redirect(route('selfAssessments.index'));
        }

        $selfAssessment->fill($request->all());
        $selfAssessment->save();

        Flash::success('Self Assessment updated successfully.');

        return redirect(route('selfAssessments.index'));
    }

    /**
     * Remove the specified SelfAssessment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SelfAssessment $selfAssessment */
        $selfAssessment = SelfAssessment::find($id);

        if (empty($selfAssessment)) {
            Flash::error('Self Assessment not found');

            return redirect(route('selfAssessments.index'));
        }

        $selfAssessment->delete();

        Flash::success('Self Assessment deleted successfully.');

        return redirect(route('selfAssessments.index'));
    }
}
