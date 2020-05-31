<?php

namespace App\Http\Controllers;

use App\DataTables\PetrolierDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePetrolierRequest;
use App\Http\Requests\UpdatePetrolierRequest;
use App\Repositories\PetrolierRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PetrolierController extends AppBaseController
{
    /** @var  PetrolierRepository */
    private $petrolierRepository;

    public function __construct(PetrolierRepository $petrolierRepo)
    {
        $this->petrolierRepository = $petrolierRepo;
    }

    /**
     * Display a listing of the Petrolier.
     *
     * @param PetrolierDataTable $petrolierDataTable
     * @return Response
     */
    public function index(PetrolierDataTable $petrolierDataTable)
    {
        return $petrolierDataTable->render('petroliers.index');
    }

    /**
     * Show the form for creating a new Petrolier.
     *
     * @return Response
     */
    public function create()
    {
        return view('petroliers.create');
    }

    /**
     * Store a newly created Petrolier in storage.
     *
     * @param CreatePetrolierRequest $request
     *
     * @return Response
     */
    public function store(CreatePetrolierRequest $request)
    {
        $input = $request->all();

        $petrolier = $this->petrolierRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/petroliers.singular')]));

        return redirect(route('petroliers.index'));
    }

    /**
     * Display the specified Petrolier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $petrolier = $this->petrolierRepository->find($id);

        if (empty($petrolier)) {
            Flash::error(__('models/petroliers.singular').' '.__('messages.not_found'));

            return redirect(route('petroliers.index'));
        }

        return view('petroliers.show')->with('petrolier', $petrolier);
    }

    /**
     * Show the form for editing the specified Petrolier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $petrolier = $this->petrolierRepository->find($id);

        if (empty($petrolier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/petroliers.singular')]));

            return redirect(route('petroliers.index'));
        }

        return view('petroliers.edit')->with('petrolier', $petrolier);
    }

    /**
     * Update the specified Petrolier in storage.
     *
     * @param  int              $id
     * @param UpdatePetrolierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePetrolierRequest $request)
    {
        $petrolier = $this->petrolierRepository->find($id);

        if (empty($petrolier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/petroliers.singular')]));

            return redirect(route('petroliers.index'));
        }

        $petrolier = $this->petrolierRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/petroliers.singular')]));

        return redirect(route('petroliers.index'));
    }

    /**
     * Remove the specified Petrolier from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $petrolier = $this->petrolierRepository->find($id);

        if (empty($petrolier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/petroliers.singular')]));

            return redirect(route('petroliers.index'));
        }

        $this->petrolierRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/petroliers.singular')]));

        return redirect(route('petroliers.index'));
    }
}
