<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBasculeAPIRequest;
use App\Http\Requests\API\UpdateBasculeAPIRequest;
use App\Models\Bascule;
use App\Repositories\BasculeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BasculeController
 * @package App\Http\Controllers\API
 */

class BasculeAPIController extends AppBaseController
{
    /** @var  BasculeRepository */
    private $basculeRepository;

    public function __construct(BasculeRepository $basculeRepo)
    {
        $this->basculeRepository = $basculeRepo;
    }

    /**
     * Display a listing of the Bascule.
     * GET|HEAD /bascules
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bascules = $this->basculeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $bascules->toArray(),
            __('messages.retrieved', ['model' => __('models/bascules.plural')])
        );
    }

    /**
     * Store a newly created Bascule in storage.
     * POST /bascules
     *
     * @param CreateBasculeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBasculeAPIRequest $request)
    {
        $input = $request->all();

        $bascule = $this->basculeRepository->create($input);

        return $this->sendResponse(
            $bascule->toArray(),
            __('messages.saved', ['model' => __('models/bascules.singular')])
        );
    }

    /**
     * Display the specified Bascule.
     * GET|HEAD /bascules/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bascule $bascule */
        $bascule = $this->basculeRepository->find($id);

        if (empty($bascule)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bascules.singular')])
            );
        }

        return $this->sendResponse(
            $bascule->toArray(),
            __('messages.retrieved', ['model' => __('models/bascules.singular')])
        );
    }

    /**
     * Update the specified Bascule in storage.
     * PUT/PATCH /bascules/{id}
     *
     * @param int $id
     * @param UpdateBasculeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBasculeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bascule $bascule */
        $bascule = $this->basculeRepository->find($id);

        if (empty($bascule)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bascules.singular')])
            );
        }

        $bascule = $this->basculeRepository->update($input, $id);

        return $this->sendResponse(
            $bascule->toArray(),
            __('messages.updated', ['model' => __('models/bascules.singular')])
        );
    }

    /**
     * Remove the specified Bascule from storage.
     * DELETE /bascules/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bascule $bascule */
        $bascule = $this->basculeRepository->find($id);

        if (empty($bascule)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bascules.singular')])
            );
        }

        $bascule->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/bascules.singular')])
        );
    }
}
