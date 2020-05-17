<?php

namespace App\Http\Controllers;

use App\DataTables\AgenceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAgenceRequest;
use App\Http\Requests\UpdateAgenceRequest;
use App\Repositories\AgenceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AgenceController extends AppBaseController
{
    /** @var  AgenceRepository */
    private $agenceRepository;

    public function __construct(AgenceRepository $agenceRepo)
    {
        $this->agenceRepository = $agenceRepo;
    }

    /**
     * Display a listing of the Agence.
     *
     * @param AgenceDataTable $agenceDataTable
     * @return Response
     */
    public function index(AgenceDataTable $agenceDataTable)
    {
        return $agenceDataTable->render('agences.index');
    }

    /**
     * Show the form for creating a new Agence.
     *
     * @return Response
     */
    public function create()
    {
        return view('agences.create');
    }

    /**
     * Store a newly created Agence in storage.
     *
     * @param CreateAgenceRequest $request
     *
     * @return Response
     */
    public function store(CreateAgenceRequest $request)
    {
        $input = $request->all();

        $agence = $this->agenceRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/agences.singular')]));

        return redirect(route('agences.index'));
    }

    /**
     * Display the specified Agence.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agence = $this->agenceRepository->find($id);

        if (empty($agence)) {
            Flash::error(__('models/agences.singular').' '.__('messages.not_found'));

            return redirect(route('agences.index'));
        }

        return view('agences.show')->with('agence', $agence);
    }

    /**
     * Show the form for editing the specified Agence.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agence = $this->agenceRepository->find($id);

        if (empty($agence)) {
            Flash::error(__('messages.not_found', ['model' => __('models/agences.singular')]));

            return redirect(route('agences.index'));
        }

        return view('agences.edit')->with('agence', $agence);
    }

    /**
     * Update the specified Agence in storage.
     *
     * @param  int              $id
     * @param UpdateAgenceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgenceRequest $request)
    {
        $agence = $this->agenceRepository->find($id);

        if (empty($agence)) {
            Flash::error(__('messages.not_found', ['model' => __('models/agences.singular')]));

            return redirect(route('agences.index'));
        }

        $agence = $this->agenceRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/agences.singular')]));

        return redirect(route('agences.index'));
    }

    /**
     * Remove the specified Agence from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agence = $this->agenceRepository->find($id);

        if (empty($agence)) {
            Flash::error(__('messages.not_found', ['model' => __('models/agences.singular')]));

            return redirect(route('agences.index'));
        }

        $this->agenceRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/agences.singular')]));

        return redirect(route('agences.index'));
    }
}
