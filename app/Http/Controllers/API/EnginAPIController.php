<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEnginAPIRequest;
use App\Http\Requests\API\UpdateEnginAPIRequest;
use App\Models\Engin;
use App\Repositories\EnginRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EnginController
 * @package App\Http\Controllers\API
 */

class EnginAPIController extends AppBaseController
{
    /** @var  EnginRepository */
    private $enginRepository;

    public function __construct(EnginRepository $enginRepo)
    {
        $this->enginRepository = $enginRepo;
    }

    /**
     * Display a listing of the Engin.
     * GET|HEAD /engins
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $engins = $this->enginRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $engins->toArray(),
            __('messages.retrieved', ['model' => __('models/engins.plural')])
        );
    }

    /**
     * Store a newly created Engin in storage.
     * POST /engins
     *
     * @param CreateEnginAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginAPIRequest $request)
    {
        $input = $request->all();

        $engin = $this->enginRepository->create($input);

        return $this->sendResponse(
            $engin->toArray(),
            __('messages.saved', ['model' => __('models/engins.singular')])
        );
    }

    /**
     * Display the specified Engin.
     * GET|HEAD /engins/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Engin $engin */
        $engin = $this->enginRepository->find($id);

        if (empty($engin)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/engins.singular')])
            );
        }

        return $this->sendResponse(
            $engin->toArray(),
            __('messages.retrieved', ['model' => __('models/engins.singular')])
        );
    }

    /**
     * Update the specified Engin in storage.
     * PUT/PATCH /engins/{id}
     *
     * @param int $id
     * @param UpdateEnginAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginAPIRequest $request)
    {
        $input = $request->all();

        /** @var Engin $engin */
        $engin = $this->enginRepository->find($id);

        if (empty($engin)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/engins.singular')])
            );
        }

        $engin = $this->enginRepository->update($input, $id);

        return $this->sendResponse(
            $engin->toArray(),
            __('messages.updated', ['model' => __('models/engins.singular')])
        );
    }

    /**
     * Remove the specified Engin from storage.
     * DELETE /engins/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Engin $engin */
        $engin = $this->enginRepository->find($id);

        if (empty($engin)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/engins.singular')])
            );
        }

        $engin->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/engins.singular')])
        );
    }
}
