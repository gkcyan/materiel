<?php

namespace App\Http\Controllers;

use App\DataTables\EnginKilometrageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEnginKilometrageRequest;
use App\Http\Requests\UpdateEnginKilometrageRequest;
use App\Repositories\EnginKilometrageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EnginKilometrageController extends AppBaseController
{
    /** @var  EnginKilometrageRepository */
    private $enginKilometrageRepository;

    public function __construct(EnginKilometrageRepository $enginKilometrageRepo)
    {
        $this->enginKilometrageRepository = $enginKilometrageRepo;
    }

    /**
     * Display a listing of the EnginKilometrage.
     *
     * @param EnginKilometrageDataTable $enginKilometrageDataTable
     * @return Response
     */
    public function index(EnginKilometrageDataTable $enginKilometrageDataTable)
    {
        return $enginKilometrageDataTable->render('engin_kilometrages.index');
    }

    /**
     * Show the form for creating a new EnginKilometrage.
     *
     * @return Response
     */
    public function create()
    {
        return view('engin_kilometrages.create');
    }

    /**
     * Store a newly created EnginKilometrage in storage.
     *
     * @param CreateEnginKilometrageRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginKilometrageRequest $request)
    {
        $input = $request->all();

        $enginKilometrage = $this->enginKilometrageRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/enginKilometrages.singular')]));

        return redirect(route('enginKilometrages.index'));
    }

    /**
     * Display the specified EnginKilometrage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $enginKilometrage = $this->enginKilometrageRepository->find($id);

        if (empty($enginKilometrage)) {
            Flash::error(__('models/enginKilometrages.singular').' '.__('messages.not_found'));

            return redirect(route('enginKilometrages.index'));
        }

        return view('engin_kilometrages.show')->with('enginKilometrage', $enginKilometrage);
    }

    /**
     * Show the form for editing the specified EnginKilometrage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $enginKilometrage = $this->enginKilometrageRepository->find($id);

        if (empty($enginKilometrage)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginKilometrages.singular')]));

            return redirect(route('enginKilometrages.index'));
        }

        return view('engin_kilometrages.edit')->with('enginKilometrage', $enginKilometrage);
    }

    /**
     * Update the specified EnginKilometrage in storage.
     *
     * @param  int              $id
     * @param UpdateEnginKilometrageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginKilometrageRequest $request)
    {
        $enginKilometrage = $this->enginKilometrageRepository->find($id);

        if (empty($enginKilometrage)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginKilometrages.singular')]));

            return redirect(route('enginKilometrages.index'));
        }

        $enginKilometrage = $this->enginKilometrageRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/enginKilometrages.singular')]));

        return redirect(route('enginKilometrages.index'));
    }

    /**
     * Remove the specified EnginKilometrage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $enginKilometrage = $this->enginKilometrageRepository->find($id);

        if (empty($enginKilometrage)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginKilometrages.singular')]));

            return redirect(route('enginKilometrages.index'));
        }

        $this->enginKilometrageRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/enginKilometrages.singular')]));

        return redirect(route('enginKilometrages.index'));
    }
}
