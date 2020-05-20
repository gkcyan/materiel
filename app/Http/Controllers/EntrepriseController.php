<?php

namespace App\Http\Controllers;

use App\DataTables\EntrepriseDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Repositories\EntrepriseRepository;
//use illuminate\Http\Request;
use Flash;
use App\Http\Controllers\AppBaseController;
//use App\Models\Entreprise;
use Response;

class EntrepriseController extends AppBaseController
{
    /** @var  EntrepriseRepository */
    private $entrepriseRepository;

    public function __construct(EntrepriseRepository $entrepriseRepo)
    {
        $this->entrepriseRepository = $entrepriseRepo;
    }

    /**
     * Display a listing of the Entreprise.
     *
     * @param EntrepriseDataTable $entrepriseDataTable
     * @return Response
     */
    public function index(EntrepriseDataTable $entrepriseDataTable)
    {
        return $entrepriseDataTable->render('entreprises.index');
    }

    /**
     * Show the form for creating a new Entreprise.
     *
     * @return Response
     */
    public function create()
    {
        return view('entreprises.create');
    }

    /**
     * Store a newly created Entreprise in storage.
     *
     * @param CreateEntrepriseRequest $request
     *
     * @return Response
     */
    public function store(CreateEntrepriseRequest $request)
    {
        $input = $request->all();

        $entreprise = $this->entrepriseRepository->create($input);
        
        Flash::success(__('messages.saved', ['model' => __('models/entreprises.singular')]));

        return redirect(route('entreprises.index'));
    }

    /**
     * Display the specified Entreprise.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error(__('models/entreprises.singular').' '.__('messages.not_found'));

            return redirect(route('entreprises.index'));
        }

        return view('entreprises.show')->with('entreprise', $entreprise);
    }

    /**
     * Show the form for editing the specified Entreprise.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entreprises.singular')]));

            return redirect(route('entreprises.index'));
        }

        return view('entreprises.edit')->with('entreprise', $entreprise);
    }

    /**
     * Update the specified Entreprise in storage.
     *
     * @param  int              $id
     * @param UpdateEntrepriseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntrepriseRequest $request)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entreprises.singular')]));

            return redirect(route('entreprises.index'));
        }

        $entreprise = $this->entrepriseRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/entreprises.singular')]));

        return redirect(route('entreprises.index'));
    }

    /**
     * Remove the specified Entreprise from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entreprises.singular')]));

            return redirect(route('entreprises.index'));
        }

        $this->entrepriseRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/entreprises.singular')]));

        return redirect(route('entreprises.index'));
    }
}
