<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAgenceAPIRequest;
use App\Http\Requests\API\UpdateAgenceAPIRequest;
use App\Models\Agence;
use App\Repositories\AgenceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AgenceController
 * @package App\Http\Controllers\API
 */

class AgenceAPIController extends AppBaseController
{
    /** @var  AgenceRepository */
    private $agenceRepository;

    public function __construct(AgenceRepository $agenceRepo)
    {
        $this->agenceRepository = $agenceRepo;
    }

    /**
     * Display a listing of the Agence.
     * GET|HEAD /agences
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $agences = $this->agenceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $agences->toArray(),
            __('messages.retrieved', ['model' => __('models/agences.plural')])
        );
    }

    /**
     * Store a newly created Agence in storage.
     * POST /agences
     *
     * @param CreateAgenceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAgenceAPIRequest $request)
    {
        $input = $request->all();

        $agence = $this->agenceRepository->create($input);

        return $this->sendResponse(
            $agence->toArray(),
            __('messages.saved', ['model' => __('models/agences.singular')])
        );
    }

    /**
     * Display the specified Agence.
     * GET|HEAD /agences/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Agence $agence */
        $agence = $this->agenceRepository->find($id);

        if (empty($agence)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/agences.singular')])
            );
        }

        return $this->sendResponse(
            $agence->toArray(),
            __('messages.retrieved', ['model' => __('models/agences.singular')])
        );
    }

    /**
     * Update the specified Agence in storage.
     * PUT/PATCH /agences/{id}
     *
     * @param int $id
     * @param UpdateAgenceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgenceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Agence $agence */
        $agence = $this->agenceRepository->find($id);

        if (empty($agence)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/agences.singular')])
            );
        }

        $agence = $this->agenceRepository->update($input, $id);

        return $this->sendResponse(
            $agence->toArray(),
            __('messages.updated', ['model' => __('models/agences.singular')])
        );
    }

    /**
     * Remove the specified Agence from storage.
     * DELETE /agences/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Agence $agence */
        $agence = $this->agenceRepository->find($id);

        if (empty($agence)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/agences.singular')])
            );
        }

        $agence->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/agences.singular')])
        );
    }
}
