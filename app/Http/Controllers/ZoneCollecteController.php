<?php

namespace App\Http\Controllers;

use App\DataTables\ZoneCollecteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateZoneCollecteRequest;
use App\Http\Requests\UpdateZoneCollecteRequest;
use App\Repositories\ZoneCollecteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ZoneCollecteController extends AppBaseController
{
    /** @var  ZoneCollecteRepository */
    private $zoneCollecteRepository;

    public function __construct(ZoneCollecteRepository $zoneCollecteRepo)
    {
        $this->zoneCollecteRepository = $zoneCollecteRepo;
    }

    /**
     * Display a listing of the ZoneCollecte.
     *
     * @param ZoneCollecteDataTable $zoneCollecteDataTable
     * @return Response
     */
    public function index(ZoneCollecteDataTable $zoneCollecteDataTable)
    {
        return $zoneCollecteDataTable->render('zone_collectes.index');
    }

    /**
     * Show the form for creating a new ZoneCollecte.
     *
     * @return Response
     */
    public function create()
    {
        return view('zone_collectes.create');
    }

    /**
     * Store a newly created ZoneCollecte in storage.
     *
     * @param CreateZoneCollecteRequest $request
     *
     * @return Response
     */
    public function store(CreateZoneCollecteRequest $request)
    {
        $input = $request->all();

        $zoneCollecte = $this->zoneCollecteRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/zoneCollectes.singular')]));

        return redirect(route('zoneCollectes.index'));
    }

    /**
     * Display the specified ZoneCollecte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zoneCollecte = $this->zoneCollecteRepository->find($id);

        if (empty($zoneCollecte)) {
            Flash::error(__('models/zoneCollectes.singular').' '.__('messages.not_found'));

            return redirect(route('zoneCollectes.index'));
        }

        return view('zone_collectes.show')->with('zoneCollecte', $zoneCollecte);
    }

    /**
     * Show the form for editing the specified ZoneCollecte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $zoneCollecte = $this->zoneCollecteRepository->find($id);

        if (empty($zoneCollecte)) {
            Flash::error(__('messages.not_found', ['model' => __('models/zoneCollectes.singular')]));

            return redirect(route('zoneCollectes.index'));
        }

        return view('zone_collectes.edit')->with('zoneCollecte', $zoneCollecte);
    }

    /**
     * Update the specified ZoneCollecte in storage.
     *
     * @param  int              $id
     * @param UpdateZoneCollecteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateZoneCollecteRequest $request)
    {
        $zoneCollecte = $this->zoneCollecteRepository->find($id);

        if (empty($zoneCollecte)) {
            Flash::error(__('messages.not_found', ['model' => __('models/zoneCollectes.singular')]));

            return redirect(route('zoneCollectes.index'));
        }

        $zoneCollecte = $this->zoneCollecteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/zoneCollectes.singular')]));

        return redirect(route('zoneCollectes.index'));
    }

    /**
     * Remove the specified ZoneCollecte from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zoneCollecte = $this->zoneCollecteRepository->find($id);

        if (empty($zoneCollecte)) {
            Flash::error(__('messages.not_found', ['model' => __('models/zoneCollectes.singular')]));

            return redirect(route('zoneCollectes.index'));
        }

        $this->zoneCollecteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/zoneCollectes.singular')]));

        return redirect(route('zoneCollectes.index'));
    }
}
