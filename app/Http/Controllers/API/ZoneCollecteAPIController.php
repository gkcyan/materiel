<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateZoneCollecteAPIRequest;
use App\Http\Requests\API\UpdateZoneCollecteAPIRequest;
use App\Models\ZoneCollecte;
use App\Repositories\ZoneCollecteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ZoneCollecteController
 * @package App\Http\Controllers\API
 */

class ZoneCollecteAPIController extends AppBaseController
{
    /** @var  ZoneCollecteRepository */
    private $zoneCollecteRepository;

    public function __construct(ZoneCollecteRepository $zoneCollecteRepo)
    {
        $this->zoneCollecteRepository = $zoneCollecteRepo;
    }

    /**
     * Display a listing of the ZoneCollecte.
     * GET|HEAD /zoneCollectes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $zoneCollectes = $this->zoneCollecteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $zoneCollectes->toArray(),
            __('messages.retrieved', ['model' => __('models/zoneCollectes.plural')])
        );
    }

    /**
     * Store a newly created ZoneCollecte in storage.
     * POST /zoneCollectes
     *
     * @param CreateZoneCollecteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateZoneCollecteAPIRequest $request)
    {
        $input = $request->all();

        $zoneCollecte = $this->zoneCollecteRepository->create($input);

        return $this->sendResponse(
            $zoneCollecte->toArray(),
            __('messages.saved', ['model' => __('models/zoneCollectes.singular')])
        );
    }

    /**
     * Display the specified ZoneCollecte.
     * GET|HEAD /zoneCollectes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ZoneCollecte $zoneCollecte */
        $zoneCollecte = $this->zoneCollecteRepository->find($id);

        if (empty($zoneCollecte)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/zoneCollectes.singular')])
            );
        }

        return $this->sendResponse(
            $zoneCollecte->toArray(),
            __('messages.retrieved', ['model' => __('models/zoneCollectes.singular')])
        );
    }

    /**
     * Update the specified ZoneCollecte in storage.
     * PUT/PATCH /zoneCollectes/{id}
     *
     * @param int $id
     * @param UpdateZoneCollecteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateZoneCollecteAPIRequest $request)
    {
        $input = $request->all();

        /** @var ZoneCollecte $zoneCollecte */
        $zoneCollecte = $this->zoneCollecteRepository->find($id);

        if (empty($zoneCollecte)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/zoneCollectes.singular')])
            );
        }

        $zoneCollecte = $this->zoneCollecteRepository->update($input, $id);

        return $this->sendResponse(
            $zoneCollecte->toArray(),
            __('messages.updated', ['model' => __('models/zoneCollectes.singular')])
        );
    }

    /**
     * Remove the specified ZoneCollecte from storage.
     * DELETE /zoneCollectes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ZoneCollecte $zoneCollecte */
        $zoneCollecte = $this->zoneCollecteRepository->find($id);

        if (empty($zoneCollecte)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/zoneCollectes.singular')])
            );
        }

        $zoneCollecte->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/zoneCollectes.singular')])
        );
    }
}
