<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStationAPIRequest;
use App\Http\Requests\API\UpdateStationAPIRequest;
use App\Models\Station;
use App\Repositories\StationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class StationController
 * @package App\Http\Controllers\API
 */

class StationAPIController extends AppBaseController
{
    /** @var  StationRepository */
    private $stationRepository;

    public function __construct(StationRepository $stationRepo)
    {
        $this->stationRepository = $stationRepo;
    }

    /**
     * Display a listing of the Station.
     * GET|HEAD /stations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $stations = $this->stationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $stations->toArray(),
            __('messages.retrieved', ['model' => __('models/stations.plural')])
        );
    }

    /**
     * Store a newly created Station in storage.
     * POST /stations
     *
     * @param CreateStationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStationAPIRequest $request)
    {
        $input = $request->all();

        $station = $this->stationRepository->create($input);

        return $this->sendResponse(
            $station->toArray(),
            __('messages.saved', ['model' => __('models/stations.singular')])
        );
    }

    /**
     * Display the specified Station.
     * GET|HEAD /stations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Station $station */
        $station = $this->stationRepository->find($id);

        if (empty($station)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/stations.singular')])
            );
        }

        return $this->sendResponse(
            $station->toArray(),
            __('messages.retrieved', ['model' => __('models/stations.singular')])
        );
    }

    /**
     * Update the specified Station in storage.
     * PUT/PATCH /stations/{id}
     *
     * @param int $id
     * @param UpdateStationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Station $station */
        $station = $this->stationRepository->find($id);

        if (empty($station)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/stations.singular')])
            );
        }

        $station = $this->stationRepository->update($input, $id);

        return $this->sendResponse(
            $station->toArray(),
            __('messages.updated', ['model' => __('models/stations.singular')])
        );
    }

    /**
     * Remove the specified Station from storage.
     * DELETE /stations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Station $station */
        $station = $this->stationRepository->find($id);

        if (empty($station)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/stations.singular')])
            );
        }

        $station->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/stations.singular')])
        );
    }
}
