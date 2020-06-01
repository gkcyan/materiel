<?php

namespace App\Http\Controllers;

use App\DataTables\EnginDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEnginRequest;
use App\Http\Requests\UpdateEnginRequest;
use App\Repositories\EnginRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EnginController extends AppBaseController
{
    /** @var  EnginRepository */
    private $enginRepository;

    public function __construct(EnginRepository $enginRepo)
    {
        $this->enginRepository = $enginRepo;
    }

    /**
     * Display a listing of the Engin.
     *
     * @param EnginDataTable $enginDataTable
     * @return Response
     */
    public function index(EnginDataTable $enginDataTable)
    {
        return $enginDataTable->render('engins.index');
    }

    /**
     * Show the form for creating a new Engin.
     *
     * @return Response
     */
    public function create()
    {
        return view('engins.create');
    }

    /**
     * Store a newly created Engin in storage.
     *
     * @param CreateEnginRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginRequest $request)
    {
        $input = $request->all();

        $engin = $this->enginRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/engins.singular')]));

        return redirect(route('engins.index'));
    }

    /**
     * Display the specified Engin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $engin = $this->enginRepository->find($id);

        if (empty($engin)) {
            Flash::error(__('models/engins.singular').' '.__('messages.not_found'));

            return redirect(route('engins.index'));
        }

        return view('engins.show')->with('engin', $engin);
    }

    /**
     * Show the form for editing the specified Engin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $engin = $this->enginRepository->find($id);

        if (empty($engin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/engins.singular')]));

            return redirect(route('engins.index'));
        }

        return view('engins.edit')->with('engin', $engin);
    }

    /**
     * Update the specified Engin in storage.
     *
     * @param  int              $id
     * @param UpdateEnginRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginRequest $request)
    {
        $engin = $this->enginRepository->find($id);

        if (empty($engin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/engins.singular')]));

            return redirect(route('engins.index'));
        }

        $engin = $this->enginRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/engins.singular')]));

        return redirect(route('engins.index'));
    }

    /**
     * Remove the specified Engin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $engin = $this->enginRepository->find($id);

        if (empty($engin)) {
            Flash::error(__('messages.not_found', ['model' => __('models/engins.singular')]));

            return redirect(route('engins.index'));
        }

        $this->enginRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/engins.singular')]));

        return redirect(route('engins.index'));
    }
}
