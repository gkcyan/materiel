<?php

namespace App\Http\Controllers;

use App\DataTables\TypeFournisseurDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTypeFournisseurRequest;
use App\Http\Requests\UpdateTypeFournisseurRequest;
use App\Repositories\TypeFournisseurRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TypeFournisseurController extends AppBaseController
{
    /** @var  TypeFournisseurRepository */
    private $typeFournisseurRepository;

    public function __construct(TypeFournisseurRepository $typeFournisseurRepo)
    {
        $this->typeFournisseurRepository = $typeFournisseurRepo;
    }

    /**
     * Display a listing of the TypeFournisseur.
     *
     * @param TypeFournisseurDataTable $typeFournisseurDataTable
     * @return Response
     */
    public function index(TypeFournisseurDataTable $typeFournisseurDataTable)
    {
        return $typeFournisseurDataTable->render('type_fournisseurs.index');
    }

    /**
     * Show the form for creating a new TypeFournisseur.
     *
     * @return Response
     */
    public function create()
    {
        return view('type_fournisseurs.create');
    }

    /**
     * Store a newly created TypeFournisseur in storage.
     *
     * @param CreateTypeFournisseurRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeFournisseurRequest $request)
    {
        $input = $request->all();

        $typeFournisseur = $this->typeFournisseurRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/type_fournisseurs.singular')]));

        return redirect(route('typeFournisseurs.index'));
    }

    /**
     * Display the specified TypeFournisseur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeFournisseur = $this->typeFournisseurRepository->find($id);

        if (empty($typeFournisseur)) {
            Flash::error(__('models/type_fournisseurs.singular').' '.__('messages.not_found'));

            return redirect(route('typeFournisseurs.index'));
        }

        return view('type_fournisseurs.show')->with('typeFournisseur', $typeFournisseur);
    }

    /**
     * Show the form for editing the specified TypeFournisseur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeFournisseur = $this->typeFournisseurRepository->find($id);

        if (empty($typeFournisseur)) {
            Flash::error(__('messages.not_found', ['model' => __('models/type_fournisseurs.singular')]));

            return redirect(route('typeFournisseurs.index'));
        }

        return view('type_fournisseurs.edit')->with('typeFournisseur', $typeFournisseur);
    }

    /**
     * Update the specified TypeFournisseur in storage.
     *
     * @param  int              $id
     * @param UpdateTypeFournisseurRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeFournisseurRequest $request)
    {
        $typeFournisseur = $this->typeFournisseurRepository->find($id);

        if (empty($typeFournisseur)) {
            Flash::error(__('messages.not_found', ['model' => __('models/type_fournisseurs.singular')]));

            return redirect(route('typeFournisseurs.index'));
        }

        $typeFournisseur = $this->typeFournisseurRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/type_fournisseurs.singular')]));

        return redirect(route('typeFournisseurs.index'));
    }

    /**
     * Remove the specified TypeFournisseur from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeFournisseur = $this->typeFournisseurRepository->find($id);

        if (empty($typeFournisseur)) {
            Flash::error(__('messages.not_found', ['model' => __('models/type_fournisseurs.singular')]));

            return redirect(route('typeFournisseurs.index'));
        }

        $this->typeFournisseurRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/type_fournisseurs.singular')]));

        return redirect(route('typeFournisseurs.index'));
    }
}
