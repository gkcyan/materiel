<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVentePetrolierAPIRequest;
use App\Http\Requests\API\UpdateVentePetrolierAPIRequest;
use App\Models\VentePetrolier;
use App\Repositories\VentePetrolierRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VentePetrolierController
 * @package App\Http\Controllers\API
 */

class VentePetrolierAPIController extends AppBaseController
{
    /** @var  VentePetrolierRepository */
    private $ventePetrolierRepository;

    public function __construct(VentePetrolierRepository $ventePetrolierRepo)
    {
        $this->ventePetrolierRepository = $ventePetrolierRepo;
    }

    /**
     * Display a listing of the VentePetrolier.
     * GET|HEAD /ventePetroliers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ventePetroliers = $this->ventePetrolierRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $ventePetroliers->toArray(),
            __('messages.retrieved', ['model' => __('models/ventePetroliers.plural')])
        );
    }

    /**
     * Store a newly created VentePetrolier in storage.
     * POST /ventePetroliers
     *
     * @param CreateVentePetrolierAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVentePetrolierAPIRequest $request)
    {
        $input = $request->all();

        $ventePetrolier = $this->ventePetrolierRepository->create($input);

        return $this->sendResponse(
            $ventePetrolier->toArray(),
            __('messages.saved', ['model' => __('models/ventePetroliers.singular')])
        );
    }

    /**
     * Display the specified VentePetrolier.
     * GET|HEAD /ventePetroliers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VentePetrolier $ventePetrolier */
        $ventePetrolier = $this->ventePetrolierRepository->find($id);

        if (empty($ventePetrolier)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/ventePetroliers.singular')])
            );
        }

        return $this->sendResponse(
            $ventePetrolier->toArray(),
            __('messages.retrieved', ['model' => __('models/ventePetroliers.singular')])
        );
    }

    /**
     * Update the specified VentePetrolier in storage.
     * PUT/PATCH /ventePetroliers/{id}
     *
     * @param int $id
     * @param UpdateVentePetrolierAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVentePetrolierAPIRequest $request)
    {
        $input = $request->all();

        /** @var VentePetrolier $ventePetrolier */
        $ventePetrolier = $this->ventePetrolierRepository->find($id);

        if (empty($ventePetrolier)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/ventePetroliers.singular')])
            );
        }

        $ventePetrolier = $this->ventePetrolierRepository->update($input, $id);

        return $this->sendResponse(
            $ventePetrolier->toArray(),
            __('messages.updated', ['model' => __('models/ventePetroliers.singular')])
        );
    }

    /**
     * Remove the specified VentePetrolier from storage.
     * DELETE /ventePetroliers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VentePetrolier $ventePetrolier */
        $ventePetrolier = $this->ventePetrolierRepository->find($id);

        if (empty($ventePetrolier)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/ventePetroliers.singular')])
            );
        }

        $ventePetrolier->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/ventePetroliers.singular')])
        );
    }
}
