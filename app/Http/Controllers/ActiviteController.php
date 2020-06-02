<?php

namespace App\Http\Controllers;

use App\DataTables\ActiviteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateActiviteRequest;
use App\Http\Requests\UpdateActiviteRequest;
use App\Repositories\ActiviteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ActiviteController extends AppBaseController
{
    /** @var  ActiviteRepository */
    private $activiteRepository;

    public function __construct(ActiviteRepository $activiteRepo)
    {
        $this->activiteRepository = $activiteRepo;
    }

    /**
     * Display a listing of the Activite.
     *
     * @param ActiviteDataTable $activiteDataTable
     * @return Response
     */
    public function index(ActiviteDataTable $activiteDataTable)
    {
        return $activiteDataTable->render('activites.index');
    }

    /**
     * Show the form for creating a new Activite.
     *
     * @return Response
     */
    public function create()
    {
        return view('activites.create');
    }

    /**
     * Store a newly created Activite in storage.
     *
     * @param CreateActiviteRequest $request
     *
     * @return Response
     */
    public function store(CreateActiviteRequest $request)
    {
        $input = $request->all();

        $activite = $this->activiteRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/activites.singular')]));

        return redirect(route('activites.index'));
    }

    /**
     * Display the specified Activite.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activite = $this->activiteRepository->find($id);

        if (empty($activite)) {
            Flash::error(__('models/activites.singular').' '.__('messages.not_found'));

            return redirect(route('activites.index'));
        }

        return view('activites.show')->with('activite', $activite);
    }

    /**
     * Show the form for editing the specified Activite.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activite = $this->activiteRepository->find($id);

        if (empty($activite)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activites.singular')]));

            return redirect(route('activites.index'));
        }

        return view('activites.edit')->with('activite', $activite);
    }

    /**
     * Update the specified Activite in storage.
     *
     * @param  int              $id
     * @param UpdateActiviteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActiviteRequest $request)
    {
        $activite = $this->activiteRepository->find($id);

        if (empty($activite)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activites.singular')]));

            return redirect(route('activites.index'));
        }

        $activite = $this->activiteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/activites.singular')]));

        return redirect(route('activites.index'));
    }

    /**
     * Remove the specified Activite from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activite = $this->activiteRepository->find($id);

        if (empty($activite)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activites.singular')]));

            return redirect(route('activites.index'));
        }

        $this->activiteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/activites.singular')]));

        return redirect(route('activites.index'));
    }
}
