<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePetrolierAPIRequest;
use App\Http\Requests\API\UpdatePetrolierAPIRequest;
use App\Models\Petrolier;
use App\Repositories\PetrolierRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PetrolierController
 * @package App\Http\Controllers\API
 */

class PetrolierAPIController extends AppBaseController
{
    /** @var  PetrolierRepository */
    private $petrolierRepository;

    public function __construct(PetrolierRepository $petrolierRepo)
    {
        $this->petrolierRepository = $petrolierRepo;
    }

    /**
     * Display a listing of the Petrolier.
     * GET|HEAD /petroliers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $petroliers = $this->petrolierRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $petroliers->toArray(),
            __('messages.retrieved', ['model' => __('models/petroliers.plural')])
        );
    }

    /**
     * Store a newly created Petrolier in storage.
     * POST /petroliers
     *
     * @param CreatePetrolierAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePetrolierAPIRequest $request)
    {
        $input = $request->all();

        $petrolier = $this->petrolierRepository->create($input);

        return $this->sendResponse(
            $petrolier->toArray(),
            __('messages.saved', ['model' => __('models/petroliers.singular')])
        );
    }

    /**
     * Display the specified Petrolier.
     * GET|HEAD /petroliers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Petrolier $petrolier */
        $petrolier = $this->petrolierRepository->find($id);

        if (empty($petrolier)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/petroliers.singular')])
            );
        }

        return $this->sendResponse(
            $petrolier->toArray(),
            __('messages.retrieved', ['model' => __('models/petroliers.singular')])
        );
    }

    /**
     * Update the specified Petrolier in storage.
     * PUT/PATCH /petroliers/{id}
     *
     * @param int $id
     * @param UpdatePetrolierAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePetrolierAPIRequest $request)
    {
        $input = $request->all();

        /** @var Petrolier $petrolier */
        $petrolier = $this->petrolierRepository->find($id);

        if (empty($petrolier)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/petroliers.singular')])
            );
        }

        $petrolier = $this->petrolierRepository->update($input, $id);

        return $this->sendResponse(
            $petrolier->toArray(),
            __('messages.updated', ['model' => __('models/petroliers.singular')])
        );
    }

    /**
     * Remove the specified Petrolier from storage.
     * DELETE /petroliers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Petrolier $petrolier */
        $petrolier = $this->petrolierRepository->find($id);

        if (empty($petrolier)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/petroliers.singular')])
            );
        }

        $petrolier->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/petroliers.singular')])
        );
    }
}
