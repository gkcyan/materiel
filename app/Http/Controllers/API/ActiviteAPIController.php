<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateActiviteAPIRequest;
use App\Http\Requests\API\UpdateActiviteAPIRequest;
use App\Models\Activite;
use App\Repositories\ActiviteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ActiviteController
 * @package App\Http\Controllers\API
 */

class ActiviteAPIController extends AppBaseController
{
    /** @var  ActiviteRepository */
    private $activiteRepository;

    public function __construct(ActiviteRepository $activiteRepo)
    {
        $this->activiteRepository = $activiteRepo;
    }

    /**
     * Display a listing of the Activite.
     * GET|HEAD /activites
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $activites = $this->activiteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $activites->toArray(),
            __('messages.retrieved', ['model' => __('models/activites.plural')])
        );
    }

    /**
     * Store a newly created Activite in storage.
     * POST /activites
     *
     * @param CreateActiviteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActiviteAPIRequest $request)
    {
        $input = $request->all();

        $activite = $this->activiteRepository->create($input);

        return $this->sendResponse(
            $activite->toArray(),
            __('messages.saved', ['model' => __('models/activites.singular')])
        );
    }

    /**
     * Display the specified Activite.
     * GET|HEAD /activites/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Activite $activite */
        $activite = $this->activiteRepository->find($id);

        if (empty($activite)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/activites.singular')])
            );
        }

        return $this->sendResponse(
            $activite->toArray(),
            __('messages.retrieved', ['model' => __('models/activites.singular')])
        );
    }

    /**
     * Update the specified Activite in storage.
     * PUT/PATCH /activites/{id}
     *
     * @param int $id
     * @param UpdateActiviteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActiviteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Activite $activite */
        $activite = $this->activiteRepository->find($id);

        if (empty($activite)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/activites.singular')])
            );
        }

        $activite = $this->activiteRepository->update($input, $id);

        return $this->sendResponse(
            $activite->toArray(),
            __('messages.updated', ['model' => __('models/activites.singular')])
        );
    }

    /**
     * Remove the specified Activite from storage.
     * DELETE /activites/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Activite $activite */
        $activite = $this->activiteRepository->find($id);

        if (empty($activite)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/activites.singular')])
            );
        }

        $activite->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/activites.singular')])
        );
    }
}
