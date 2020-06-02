<?php

namespace App\Http\Controllers;

use App\DataTables\ChauffeurPermiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateChauffeurPermiRequest;
use App\Http\Requests\UpdateChauffeurPermiRequest;
use App\Repositories\ChauffeurPermiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ChauffeurPermiController extends AppBaseController
{
    /** @var  ChauffeurPermiRepository */
    private $chauffeurPermiRepository;

    public function __construct(ChauffeurPermiRepository $chauffeurPermiRepo)
    {
        $this->chauffeurPermiRepository = $chauffeurPermiRepo;
    }

    /**
     * Display a listing of the ChauffeurPermi.
     *
     * @param ChauffeurPermiDataTable $chauffeurPermiDataTable
     * @return Response
     */
    public function index(ChauffeurPermiDataTable $chauffeurPermiDataTable)
    {
        return $chauffeurPermiDataTable->render('chauffeur_permis.index');
    }

    /**
     * Show the form for creating a new ChauffeurPermi.
     *
     * @return Response
     */
    public function create()
    {
        return view('chauffeur_permis.create');
    }

    /**
     * Store a newly created ChauffeurPermi in storage.
     *
     * @param CreateChauffeurPermiRequest $request
     *
     * @return Response
     */
    public function store(CreateChauffeurPermiRequest $request)
    {
        $input = $request->all();

        $chauffeurPermi = $this->chauffeurPermiRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/chauffeurPermis.singular')]));

        return redirect(route('chauffeurPermis.index'));
    }

    /**
     * Display the specified ChauffeurPermi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chauffeurPermi = $this->chauffeurPermiRepository->find($id);

        if (empty($chauffeurPermi)) {
            Flash::error(__('models/chauffeurPermis.singular').' '.__('messages.not_found'));

            return redirect(route('chauffeurPermis.index'));
        }

        return view('chauffeur_permis.show')->with('chauffeurPermi', $chauffeurPermi);
    }

    /**
     * Show the form for editing the specified ChauffeurPermi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chauffeurPermi = $this->chauffeurPermiRepository->find($id);

        if (empty($chauffeurPermi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chauffeurPermis.singular')]));

            return redirect(route('chauffeurPermis.index'));
        }

        return view('chauffeur_permis.edit')->with('chauffeurPermi', $chauffeurPermi);
    }

    /**
     * Update the specified ChauffeurPermi in storage.
     *
     * @param  int              $id
     * @param UpdateChauffeurPermiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChauffeurPermiRequest $request)
    {
        $chauffeurPermi = $this->chauffeurPermiRepository->find($id);

        if (empty($chauffeurPermi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chauffeurPermis.singular')]));

            return redirect(route('chauffeurPermis.index'));
        }

        $chauffeurPermi = $this->chauffeurPermiRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/chauffeurPermis.singular')]));

        return redirect(route('chauffeurPermis.index'));
    }

    /**
     * Remove the specified ChauffeurPermi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chauffeurPermi = $this->chauffeurPermiRepository->find($id);

        if (empty($chauffeurPermi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/chauffeurPermis.singular')]));

            return redirect(route('chauffeurPermis.index'));
        }

        $this->chauffeurPermiRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/chauffeurPermis.singular')]));

        return redirect(route('chauffeurPermis.index'));
    }
}
