<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBasculeDataAPIRequest;
use App\Http\Requests\API\UpdateBasculeDataAPIRequest;
use App\Models\BasculeData;
use App\Repositories\BasculeDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BasculeDataController
 * @package App\Http\Controllers\API
 */

class BasculeDataAPIController extends AppBaseController
{
    /** @var  BasculeDataRepository */
    private $basculeDataRepository;

    public function __construct(BasculeDataRepository $basculeDataRepo)
    {
        $this->basculeDataRepository = $basculeDataRepo;
    }

    /**
     * Display a listing of the BasculeData.
     * GET|HEAD /basculeDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $basculeDatas = $this->basculeDataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $basculeDatas->toArray(),
            __('messages.retrieved', ['model' => __('models/basculeDatas.plural')])
        );
    }

    /**
     * Store a newly created BasculeData in storage.
     * POST /basculeDatas
     *
     * @param CreateBasculeDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBasculeDataAPIRequest $request)
    {
        $input = $request->all();

        $basculeData = $this->basculeDataRepository->create($input);

        return $this->sendResponse(
            $basculeData->toArray(),
            __('messages.saved', ['model' => __('models/basculeDatas.singular')])
        );
    }

    /**
     * Display the specified BasculeData.
     * GET|HEAD /basculeDatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BasculeData $basculeData */
        $basculeData = $this->basculeDataRepository->find($id);

        if (empty($basculeData)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/basculeDatas.singular')])
            );
        }

        return $this->sendResponse(
            $basculeData->toArray(),
            __('messages.retrieved', ['model' => __('models/basculeDatas.singular')])
        );
    }

    /**
     * Update the specified BasculeData in storage.
     * PUT/PATCH /basculeDatas/{id}
     *
     * @param int $id
     * @param UpdateBasculeDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBasculeDataAPIRequest $request)
    {
        $input = $request->all();

        /** @var BasculeData $basculeData */
        $basculeData = $this->basculeDataRepository->find($id);

        if (empty($basculeData)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/basculeDatas.singular')])
            );
        }

        $basculeData = $this->basculeDataRepository->update($input, $id);

        return $this->sendResponse(
            $basculeData->toArray(),
            __('messages.updated', ['model' => __('models/basculeDatas.singular')])
        );
    }

    /**
     * Remove the specified BasculeData from storage.
     * DELETE /basculeDatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BasculeData $basculeData */
        $basculeData = $this->basculeDataRepository->find($id);

        if (empty($basculeData)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/basculeDatas.singular')])
            );
        }

        $basculeData->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/basculeDatas.singular')])
        );
    }
}
