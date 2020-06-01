<?php

namespace App\Http\Controllers;

use App\DataTables\EnginModeleDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEnginModeleRequest;
use App\Http\Requests\UpdateEnginModeleRequest;
use App\Repositories\EnginModeleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EnginModeleController extends AppBaseController
{
    /** @var  EnginModeleRepository */
    private $enginModeleRepository;

    public function __construct(EnginModeleRepository $enginModeleRepo)
    {
        $this->enginModeleRepository = $enginModeleRepo;
    }

    /**
     * Display a listing of the EnginModele.
     *
     * @param EnginModeleDataTable $enginModeleDataTable
     * @return Response
     */
    public function index(EnginModeleDataTable $enginModeleDataTable)
    {
        return $enginModeleDataTable->render('engin_modeles.index');
    }

    /**
     * Show the form for creating a new EnginModele.
     *
     * @return Response
     */
    public function create()
    {
        return view('engin_modeles.create');
    }

    /**
     * Store a newly created EnginModele in storage.
     *
     * @param CreateEnginModeleRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginModeleRequest $request)
    {
        $input = $request->all();

        $enginModele = $this->enginModeleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/enginModeles.singular')]));

        return redirect(route('enginModeles.index'));
    }

    /**
     * Display the specified EnginModele.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $enginModele = $this->enginModeleRepository->find($id);

        if (empty($enginModele)) {
            Flash::error(__('models/enginModeles.singular').' '.__('messages.not_found'));

            return redirect(route('enginModeles.index'));
        }

        return view('engin_modeles.show')->with('enginModele', $enginModele);
    }

    /**
     * Show the form for editing the specified EnginModele.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $enginModele = $this->enginModeleRepository->find($id);

        if (empty($enginModele)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginModeles.singular')]));

            return redirect(route('enginModeles.index'));
        }

        return view('engin_modeles.edit')->with('enginModele', $enginModele);
    }

    /**
     * Update the specified EnginModele in storage.
     *
     * @param  int              $id
     * @param UpdateEnginModeleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginModeleRequest $request)
    {
        $enginModele = $this->enginModeleRepository->find($id);

        if (empty($enginModele)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginModeles.singular')]));

            return redirect(route('enginModeles.index'));
        }

        $enginModele = $this->enginModeleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/enginModeles.singular')]));

        return redirect(route('enginModeles.index'));
    }

    /**
     * Remove the specified EnginModele from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $enginModele = $this->enginModeleRepository->find($id);

        if (empty($enginModele)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginModeles.singular')]));

            return redirect(route('enginModeles.index'));
        }

        $this->enginModeleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/enginModeles.singular')]));

        return redirect(route('enginModeles.index'));
    }
}
