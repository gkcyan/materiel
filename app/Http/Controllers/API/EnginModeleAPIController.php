<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEnginModeleAPIRequest;
use App\Http\Requests\API\UpdateEnginModeleAPIRequest;
use App\Models\EnginModele;
use App\Repositories\EnginModeleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EnginModeleController
 * @package App\Http\Controllers\API
 */

class EnginModeleAPIController extends AppBaseController
{
    /** @var  EnginModeleRepository */
    private $enginModeleRepository;

    public function __construct(EnginModeleRepository $enginModeleRepo)
    {
        $this->enginModeleRepository = $enginModeleRepo;
    }

    /**
     * Display a listing of the EnginModele.
     * GET|HEAD /enginModeles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $enginModeles = $this->enginModeleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $enginModeles->toArray(),
            __('messages.retrieved', ['model' => __('models/enginModeles.plural')])
        );
    }

    /**
     * Store a newly created EnginModele in storage.
     * POST /enginModeles
     *
     * @param CreateEnginModeleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginModeleAPIRequest $request)
    {
        $input = $request->all();

        $enginModele = $this->enginModeleRepository->create($input);

        return $this->sendResponse(
            $enginModele->toArray(),
            __('messages.saved', ['model' => __('models/enginModeles.singular')])
        );
    }

    /**
     * Display the specified EnginModele.
     * GET|HEAD /enginModeles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EnginModele $enginModele */
        $enginModele = $this->enginModeleRepository->find($id);

        if (empty($enginModele)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginModeles.singular')])
            );
        }

        return $this->sendResponse(
            $enginModele->toArray(),
            __('messages.retrieved', ['model' => __('models/enginModeles.singular')])
        );
    }

    /**
     * Update the specified EnginModele in storage.
     * PUT/PATCH /enginModeles/{id}
     *
     * @param int $id
     * @param UpdateEnginModeleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginModeleAPIRequest $request)
    {
        $input = $request->all();

        /** @var EnginModele $enginModele */
        $enginModele = $this->enginModeleRepository->find($id);

        if (empty($enginModele)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginModeles.singular')])
            );
        }

        $enginModele = $this->enginModeleRepository->update($input, $id);

        return $this->sendResponse(
            $enginModele->toArray(),
            __('messages.updated', ['model' => __('models/enginModeles.singular')])
        );
    }

    /**
     * Remove the specified EnginModele from storage.
     * DELETE /enginModeles/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EnginModele $enginModele */
        $enginModele = $this->enginModeleRepository->find($id);

        if (empty($enginModele)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginModeles.singular')])
            );
        }

        $enginModele->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/enginModeles.singular')])
        );
    }
}
