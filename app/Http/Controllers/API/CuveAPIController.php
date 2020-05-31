<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCuveAPIRequest;
use App\Http\Requests\API\UpdateCuveAPIRequest;
use App\Models\Cuve;
use App\Repositories\CuveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CuveController
 * @package App\Http\Controllers\API
 */

class CuveAPIController extends AppBaseController
{
    /** @var  CuveRepository */
    private $cuveRepository;

    public function __construct(CuveRepository $cuveRepo)
    {
        $this->cuveRepository = $cuveRepo;
    }

    /**
     * Display a listing of the Cuve.
     * GET|HEAD /cuves
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cuves = $this->cuveRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $cuves->toArray(),
            __('messages.retrieved', ['model' => __('models/cuves.plural')])
        );
    }

    /**
     * Store a newly created Cuve in storage.
     * POST /cuves
     *
     * @param CreateCuveAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCuveAPIRequest $request)
    {
        $input = $request->all();

        $cuve = $this->cuveRepository->create($input);

        return $this->sendResponse(
            $cuve->toArray(),
            __('messages.saved', ['model' => __('models/cuves.singular')])
        );
    }

    /**
     * Display the specified Cuve.
     * GET|HEAD /cuves/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cuve $cuve */
        $cuve = $this->cuveRepository->find($id);

        if (empty($cuve)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/cuves.singular')])
            );
        }

        return $this->sendResponse(
            $cuve->toArray(),
            __('messages.retrieved', ['model' => __('models/cuves.singular')])
        );
    }

    /**
     * Update the specified Cuve in storage.
     * PUT/PATCH /cuves/{id}
     *
     * @param int $id
     * @param UpdateCuveAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCuveAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cuve $cuve */
        $cuve = $this->cuveRepository->find($id);

        if (empty($cuve)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/cuves.singular')])
            );
        }

        $cuve = $this->cuveRepository->update($input, $id);

        return $this->sendResponse(
            $cuve->toArray(),
            __('messages.updated', ['model' => __('models/cuves.singular')])
        );
    }

    /**
     * Remove the specified Cuve from storage.
     * DELETE /cuves/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cuve $cuve */
        $cuve = $this->cuveRepository->find($id);

        if (empty($cuve)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/cuves.singular')])
            );
        }

        $cuve->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/cuves.singular')])
        );
    }
}
