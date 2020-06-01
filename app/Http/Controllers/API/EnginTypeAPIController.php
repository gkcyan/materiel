<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEnginTypeAPIRequest;
use App\Http\Requests\API\UpdateEnginTypeAPIRequest;
use App\Models\EnginType;
use App\Repositories\EnginTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EnginTypeController
 * @package App\Http\Controllers\API
 */

class EnginTypeAPIController extends AppBaseController
{
    /** @var  EnginTypeRepository */
    private $enginTypeRepository;

    public function __construct(EnginTypeRepository $enginTypeRepo)
    {
        $this->enginTypeRepository = $enginTypeRepo;
    }

    /**
     * Display a listing of the EnginType.
     * GET|HEAD /enginTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $enginTypes = $this->enginTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $enginTypes->toArray(),
            __('messages.retrieved', ['model' => __('models/enginTypes.plural')])
        );
    }

    /**
     * Store a newly created EnginType in storage.
     * POST /enginTypes
     *
     * @param CreateEnginTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginTypeAPIRequest $request)
    {
        $input = $request->all();

        $enginType = $this->enginTypeRepository->create($input);

        return $this->sendResponse(
            $enginType->toArray(),
            __('messages.saved', ['model' => __('models/enginTypes.singular')])
        );
    }

    /**
     * Display the specified EnginType.
     * GET|HEAD /enginTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EnginType $enginType */
        $enginType = $this->enginTypeRepository->find($id);

        if (empty($enginType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginTypes.singular')])
            );
        }

        return $this->sendResponse(
            $enginType->toArray(),
            __('messages.retrieved', ['model' => __('models/enginTypes.singular')])
        );
    }

    /**
     * Update the specified EnginType in storage.
     * PUT/PATCH /enginTypes/{id}
     *
     * @param int $id
     * @param UpdateEnginTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var EnginType $enginType */
        $enginType = $this->enginTypeRepository->find($id);

        if (empty($enginType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginTypes.singular')])
            );
        }

        $enginType = $this->enginTypeRepository->update($input, $id);

        return $this->sendResponse(
            $enginType->toArray(),
            __('messages.updated', ['model' => __('models/enginTypes.singular')])
        );
    }

    /**
     * Remove the specified EnginType from storage.
     * DELETE /enginTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EnginType $enginType */
        $enginType = $this->enginTypeRepository->find($id);

        if (empty($enginType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginTypes.singular')])
            );
        }

        $enginType->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/enginTypes.singular')])
        );
    }
}
