<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTypeZoneAPIRequest;
use App\Http\Requests\API\UpdateTypeZoneAPIRequest;
use App\Models\TypeZone;
use App\Repositories\TypeZoneRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TypeZoneController
 * @package App\Http\Controllers\API
 */

class TypeZoneAPIController extends AppBaseController
{
    /** @var  TypeZoneRepository */
    private $typeZoneRepository;

    public function __construct(TypeZoneRepository $typeZoneRepo)
    {
        $this->typeZoneRepository = $typeZoneRepo;
    }

    /**
     * Display a listing of the TypeZone.
     * GET|HEAD /typeZones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $typeZones = $this->typeZoneRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $typeZones->toArray(),
            __('messages.retrieved', ['model' => __('models/typeZones.plural')])
        );
    }

    /**
     * Store a newly created TypeZone in storage.
     * POST /typeZones
     *
     * @param CreateTypeZoneAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeZoneAPIRequest $request)
    {
        $input = $request->all();

        $typeZone = $this->typeZoneRepository->create($input);

        return $this->sendResponse(
            $typeZone->toArray(),
            __('messages.saved', ['model' => __('models/typeZones.singular')])
        );
    }

    /**
     * Display the specified TypeZone.
     * GET|HEAD /typeZones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TypeZone $typeZone */
        $typeZone = $this->typeZoneRepository->find($id);

        if (empty($typeZone)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/typeZones.singular')])
            );
        }

        return $this->sendResponse(
            $typeZone->toArray(),
            __('messages.retrieved', ['model' => __('models/typeZones.singular')])
        );
    }

    /**
     * Update the specified TypeZone in storage.
     * PUT/PATCH /typeZones/{id}
     *
     * @param int $id
     * @param UpdateTypeZoneAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeZoneAPIRequest $request)
    {
        $input = $request->all();

        /** @var TypeZone $typeZone */
        $typeZone = $this->typeZoneRepository->find($id);

        if (empty($typeZone)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/typeZones.singular')])
            );
        }

        $typeZone = $this->typeZoneRepository->update($input, $id);

        return $this->sendResponse(
            $typeZone->toArray(),
            __('messages.updated', ['model' => __('models/typeZones.singular')])
        );
    }

    /**
     * Remove the specified TypeZone from storage.
     * DELETE /typeZones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TypeZone $typeZone */
        $typeZone = $this->typeZoneRepository->find($id);

        if (empty($typeZone)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/typeZones.singular')])
            );
        }

        $typeZone->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/typeZones.singular')])
        );
    }
}
