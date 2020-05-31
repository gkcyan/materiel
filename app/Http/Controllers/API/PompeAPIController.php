<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePompeAPIRequest;
use App\Http\Requests\API\UpdatePompeAPIRequest;
use App\Models\Pompe;
use App\Repositories\PompeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PompeController
 * @package App\Http\Controllers\API
 */

class PompeAPIController extends AppBaseController
{
    /** @var  PompeRepository */
    private $pompeRepository;

    public function __construct(PompeRepository $pompeRepo)
    {
        $this->pompeRepository = $pompeRepo;
    }

    /**
     * Display a listing of the Pompe.
     * GET|HEAD /pompes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pompes = $this->pompeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $pompes->toArray(),
            __('messages.retrieved', ['model' => __('models/pompes.plural')])
        );
    }

    /**
     * Store a newly created Pompe in storage.
     * POST /pompes
     *
     * @param CreatePompeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePompeAPIRequest $request)
    {
        $input = $request->all();

        $pompe = $this->pompeRepository->create($input);

        return $this->sendResponse(
            $pompe->toArray(),
            __('messages.saved', ['model' => __('models/pompes.singular')])
        );
    }

    /**
     * Display the specified Pompe.
     * GET|HEAD /pompes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pompe $pompe */
        $pompe = $this->pompeRepository->find($id);

        if (empty($pompe)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/pompes.singular')])
            );
        }

        return $this->sendResponse(
            $pompe->toArray(),
            __('messages.retrieved', ['model' => __('models/pompes.singular')])
        );
    }

    /**
     * Update the specified Pompe in storage.
     * PUT/PATCH /pompes/{id}
     *
     * @param int $id
     * @param UpdatePompeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePompeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pompe $pompe */
        $pompe = $this->pompeRepository->find($id);

        if (empty($pompe)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/pompes.singular')])
            );
        }

        $pompe = $this->pompeRepository->update($input, $id);

        return $this->sendResponse(
            $pompe->toArray(),
            __('messages.updated', ['model' => __('models/pompes.singular')])
        );
    }

    /**
     * Remove the specified Pompe from storage.
     * DELETE /pompes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pompe $pompe */
        $pompe = $this->pompeRepository->find($id);

        if (empty($pompe)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/pompes.singular')])
            );
        }

        $pompe->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/pompes.singular')])
        );
    }
}
