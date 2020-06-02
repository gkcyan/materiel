<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEnginKilometrageAPIRequest;
use App\Http\Requests\API\UpdateEnginKilometrageAPIRequest;
use App\Models\EnginKilometrage;
use App\Repositories\EnginKilometrageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EnginKilometrageController
 * @package App\Http\Controllers\API
 */

class EnginKilometrageAPIController extends AppBaseController
{
    /** @var  EnginKilometrageRepository */
    private $enginKilometrageRepository;

    public function __construct(EnginKilometrageRepository $enginKilometrageRepo)
    {
        $this->enginKilometrageRepository = $enginKilometrageRepo;
    }

    /**
     * Display a listing of the EnginKilometrage.
     * GET|HEAD /enginKilometrages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $enginKilometrages = $this->enginKilometrageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $enginKilometrages->toArray(),
            __('messages.retrieved', ['model' => __('models/enginKilometrages.plural')])
        );
    }

    /**
     * Store a newly created EnginKilometrage in storage.
     * POST /enginKilometrages
     *
     * @param CreateEnginKilometrageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginKilometrageAPIRequest $request)
    {
        $input = $request->all();

        $enginKilometrage = $this->enginKilometrageRepository->create($input);

        return $this->sendResponse(
            $enginKilometrage->toArray(),
            __('messages.saved', ['model' => __('models/enginKilometrages.singular')])
        );
    }

    /**
     * Display the specified EnginKilometrage.
     * GET|HEAD /enginKilometrages/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var EnginKilometrage $enginKilometrage */
        $enginKilometrage = $this->enginKilometrageRepository->find($id);

        if (empty($enginKilometrage)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginKilometrages.singular')])
            );
        }

        return $this->sendResponse(
            $enginKilometrage->toArray(),
            __('messages.retrieved', ['model' => __('models/enginKilometrages.singular')])
        );
    }

    /**
     * Update the specified EnginKilometrage in storage.
     * PUT/PATCH /enginKilometrages/{id}
     *
     * @param int $id
     * @param UpdateEnginKilometrageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginKilometrageAPIRequest $request)
    {
        $input = $request->all();

        /** @var EnginKilometrage $enginKilometrage */
        $enginKilometrage = $this->enginKilometrageRepository->find($id);

        if (empty($enginKilometrage)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginKilometrages.singular')])
            );
        }

        $enginKilometrage = $this->enginKilometrageRepository->update($input, $id);

        return $this->sendResponse(
            $enginKilometrage->toArray(),
            __('messages.updated', ['model' => __('models/enginKilometrages.singular')])
        );
    }

    /**
     * Remove the specified EnginKilometrage from storage.
     * DELETE /enginKilometrages/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var EnginKilometrage $enginKilometrage */
        $enginKilometrage = $this->enginKilometrageRepository->find($id);

        if (empty($enginKilometrage)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/enginKilometrages.singular')])
            );
        }

        $enginKilometrage->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/enginKilometrages.singular')])
        );
    }
}
