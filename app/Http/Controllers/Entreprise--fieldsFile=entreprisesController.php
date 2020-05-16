<?php

namespace App\Http\Controllers;

use App\DataTables\Entreprise--fieldsFile=entreprisesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEntreprise--fieldsFile=entreprisesRequest;
use App\Http\Requests\UpdateEntreprise--fieldsFile=entreprisesRequest;
use App\Repositories\Entreprise--fieldsFile=entreprisesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Entreprise--fieldsFile=entreprisesController extends AppBaseController
{
    /** @var  Entreprise--fieldsFile=entreprisesRepository */
    private $entrepriseFieldsFile=entreprisesRepository;

    public function __construct(Entreprise--fieldsFile=entreprisesRepository $entrepriseFieldsFile=entreprisesRepo)
    {
        $this->entrepriseFieldsFile=entreprisesRepository = $entrepriseFieldsFile=entreprisesRepo;
    }

    /**
     * Display a listing of the Entreprise--fieldsFile=entreprises.
     *
     * @param Entreprise--fieldsFile=entreprisesDataTable $entrepriseFieldsFile=entreprisesDataTable
     * @return Response
     */
    public function index(Entreprise--fieldsFile=entreprisesDataTable $entrepriseFieldsFile=entreprisesDataTable)
    {
        return $entrepriseFieldsFile=entreprisesDataTable->render('entreprise--fields_file=entreprises.index');
    }

    /**
     * Show the form for creating a new Entreprise--fieldsFile=entreprises.
     *
     * @return Response
     */
    public function create()
    {
        return view('entreprise--fields_file=entreprises.create');
    }

    /**
     * Store a newly created Entreprise--fieldsFile=entreprises in storage.
     *
     * @param CreateEntreprise--fieldsFile=entreprisesRequest $request
     *
     * @return Response
     */
    public function store(CreateEntreprise--fieldsFile=entreprisesRequest $request)
    {
        $input = $request->all();

        $entrepriseFieldsFile=entreprises = $this->entrepriseFieldsFile=entreprisesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/entrepriseFieldsFile=entreprises.singular')]));

        return redirect(route('entrepriseFieldsFile=entreprises.index'));
    }

    /**
     * Display the specified Entreprise--fieldsFile=entreprises.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entrepriseFieldsFile=entreprises = $this->entrepriseFieldsFile=entreprisesRepository->find($id);

        if (empty($entrepriseFieldsFile=entreprises)) {
            Flash::error(__('models/entrepriseFieldsFile=entreprises.singular').' '.__('messages.not_found'));

            return redirect(route('entrepriseFieldsFile=entreprises.index'));
        }

        return view('entreprise--fields_file=entreprises.show')->with('entrepriseFieldsFile=entreprises', $entrepriseFieldsFile=entreprises);
    }

    /**
     * Show the form for editing the specified Entreprise--fieldsFile=entreprises.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entrepriseFieldsFile=entreprises = $this->entrepriseFieldsFile=entreprisesRepository->find($id);

        if (empty($entrepriseFieldsFile=entreprises)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entrepriseFieldsFile=entreprises.singular')]));

            return redirect(route('entrepriseFieldsFile=entreprises.index'));
        }

        return view('entreprise--fields_file=entreprises.edit')->with('entrepriseFieldsFile=entreprises', $entrepriseFieldsFile=entreprises);
    }

    /**
     * Update the specified Entreprise--fieldsFile=entreprises in storage.
     *
     * @param  int              $id
     * @param UpdateEntreprise--fieldsFile=entreprisesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntreprise--fieldsFile=entreprisesRequest $request)
    {
        $entrepriseFieldsFile=entreprises = $this->entrepriseFieldsFile=entreprisesRepository->find($id);

        if (empty($entrepriseFieldsFile=entreprises)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entrepriseFieldsFile=entreprises.singular')]));

            return redirect(route('entrepriseFieldsFile=entreprises.index'));
        }

        $entrepriseFieldsFile=entreprises = $this->entrepriseFieldsFile=entreprisesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/entrepriseFieldsFile=entreprises.singular')]));

        return redirect(route('entrepriseFieldsFile=entreprises.index'));
    }

    /**
     * Remove the specified Entreprise--fieldsFile=entreprises from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entrepriseFieldsFile=entreprises = $this->entrepriseFieldsFile=entreprisesRepository->find($id);

        if (empty($entrepriseFieldsFile=entreprises)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entrepriseFieldsFile=entreprises.singular')]));

            return redirect(route('entrepriseFieldsFile=entreprises.index'));
        }

        $this->entrepriseFieldsFile=entreprisesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/entrepriseFieldsFile=entreprises.singular')]));

        return redirect(route('entrepriseFieldsFile=entreprises.index'));
    }
}
