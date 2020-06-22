<?php

namespace App\Http\Controllers;

use App\DataTables\FournisseurDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFournisseurRequest;
use App\Http\Requests\UpdateFournisseurRequest;
use App\Repositories\FournisseurRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FournisseurController extends AppBaseController
{
    /** @var  FournisseurRepository */
    private $fournisseurRepository;

    public function __construct(FournisseurRepository $fournisseurRepo)
    {
        $this->fournisseurRepository = $fournisseurRepo;
    }

    /**
     * Display a listing of the Fournisseur.
     *
     * @param FournisseurDataTable $fournisseurDataTable
     * @return Response
     */
    public function index(FournisseurDataTable $fournisseurDataTable)
    {
        return $fournisseurDataTable->render('fournisseurs.index');
    }

    /**
     * Show the form for creating a new Fournisseur.
     *
     * @return Response
     */
    public function create()
    {
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created Fournisseur in storage.
     *
     * @param CreateFournisseurRequest $request
     *
     * @return Response
     */
    public function store(CreateFournisseurRequest $request)
    {
        $input = $request->all();

        $fournisseur = $this->fournisseurRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/fournisseurs.singular')]));

        return redirect(route('fournisseurs.index'));
    }

    /**
     * Display the specified Fournisseur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            Flash::error(__('models/fournisseurs.singular').' '.__('messages.not_found'));

            return redirect(route('fournisseurs.index'));
        }

        return view('fournisseurs.show')->with('fournisseur', $fournisseur);
    }

    /**
     * Show the form for editing the specified Fournisseur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fournisseurs.singular')]));

            return redirect(route('fournisseurs.index'));
        }

        return view('fournisseurs.edit')->with('fournisseur', $fournisseur);
    }

    /**
     * Update the specified Fournisseur in storage.
     *
     * @param  int              $id
     * @param UpdateFournisseurRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFournisseurRequest $request)
    {
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fournisseurs.singular')]));

            return redirect(route('fournisseurs.index'));
        }

        $fournisseur = $this->fournisseurRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/fournisseurs.singular')]));

        return redirect(route('fournisseurs.index'));
    }

    /**
     * Remove the specified Fournisseur from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fournisseurs.singular')]));

            return redirect(route('fournisseurs.index'));
        }

        $this->fournisseurRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/fournisseurs.singular')]));

        return redirect(route('fournisseurs.index'));
    }
}
