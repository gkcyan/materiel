<?php

namespace App\Http\Controllers;

use App\DataTables\VentePetrolierDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateVentePetrolierRequest;
use App\Http\Requests\UpdateVentePetrolierRequest;
use App\Repositories\VentePetrolierRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VentePetrolierController extends AppBaseController
{
    /** @var  VentePetrolierRepository */
    private $ventePetrolierRepository;

    public function __construct(VentePetrolierRepository $ventePetrolierRepo)
    {
        $this->ventePetrolierRepository = $ventePetrolierRepo;
    }

    /**
     * Display a listing of the VentePetrolier.
     *
     * @param VentePetrolierDataTable $ventePetrolierDataTable
     * @return Response
     */
    public function index(VentePetrolierDataTable $ventePetrolierDataTable)
    {
        return $ventePetrolierDataTable->render('vente_petroliers.index');
    }

    /**
     * Show the form for creating a new VentePetrolier.
     *
     * @return Response
     */
    public function create()
    {
        return view('vente_petroliers.create');
    }

    /**
     * Store a newly created VentePetrolier in storage.
     *
     * @param CreateVentePetrolierRequest $request
     *
     * @return Response
     */
    public function store(CreateVentePetrolierRequest $request)
    {
        $input = $request->all();

        $ventePetrolier = $this->ventePetrolierRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ventePetroliers.singular')]));

        return redirect(route('ventePetroliers.index'));
    }

    /**
     * Display the specified VentePetrolier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ventePetrolier = $this->ventePetrolierRepository->find($id);

        if (empty($ventePetrolier)) {
            Flash::error(__('models/ventePetroliers.singular').' '.__('messages.not_found'));

            return redirect(route('ventePetroliers.index'));
        }

        return view('vente_petroliers.show')->with('ventePetrolier', $ventePetrolier);
    }

    /**
     * Show the form for editing the specified VentePetrolier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ventePetrolier = $this->ventePetrolierRepository->find($id);

        if (empty($ventePetrolier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ventePetroliers.singular')]));

            return redirect(route('ventePetroliers.index'));
        }

        return view('vente_petroliers.edit')->with('ventePetrolier', $ventePetrolier);
    }

    /**
     * Update the specified VentePetrolier in storage.
     *
     * @param  int              $id
     * @param UpdateVentePetrolierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVentePetrolierRequest $request)
    {
        $ventePetrolier = $this->ventePetrolierRepository->find($id);

        if (empty($ventePetrolier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ventePetroliers.singular')]));

            return redirect(route('ventePetroliers.index'));
        }

        $ventePetrolier = $this->ventePetrolierRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ventePetroliers.singular')]));

        return redirect(route('ventePetroliers.index'));
    }

    /**
     * Remove the specified VentePetrolier from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ventePetrolier = $this->ventePetrolierRepository->find($id);

        if (empty($ventePetrolier)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ventePetroliers.singular')]));

            return redirect(route('ventePetroliers.index'));
        }

        $this->ventePetrolierRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ventePetroliers.singular')]));

        return redirect(route('ventePetroliers.index'));
    }
}
