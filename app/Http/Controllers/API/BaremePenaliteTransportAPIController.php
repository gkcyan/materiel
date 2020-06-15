<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBaremePenaliteTransportAPIRequest;
use App\Http\Requests\API\UpdateBaremePenaliteTransportAPIRequest;
use App\Models\BaremePenaliteTransport;
use App\Repositories\BaremePenaliteTransportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BaremePenaliteTransportController
 * @package App\Http\Controllers\API
 */

class BaremePenaliteTransportAPIController extends AppBaseController
{
    /** @var  BaremePenaliteTransportRepository */
    private $baremePenaliteTransportRepository;

    public function __construct(BaremePenaliteTransportRepository $baremePenaliteTransportRepo)
    {
        $this->baremePenaliteTransportRepository = $baremePenaliteTransportRepo;
    }

    /**
     * Display a listing of the BaremePenaliteTransport.
     * GET|HEAD /baremePenaliteTransports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $baremePenaliteTransports = $this->baremePenaliteTransportRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $baremePenaliteTransports->toArray(),
            __('messages.retrieved', ['model' => __('models/baremePenaliteTransports.plural')])
        );
    }

    /**
     * Store a newly created BaremePenaliteTransport in storage.
     * POST /baremePenaliteTransports
     *
     * @param CreateBaremePenaliteTransportAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBaremePenaliteTransportAPIRequest $request)
    {
        $input = $request->all();

        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->create($input);

        return $this->sendResponse(
            $baremePenaliteTransport->toArray(),
            __('messages.saved', ['model' => __('models/baremePenaliteTransports.singular')])
        );
    }

    /**
     * Display the specified BaremePenaliteTransport.
     * GET|HEAD /baremePenaliteTransports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BaremePenaliteTransport $baremePenaliteTransport */
        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->find($id);

        if (empty($baremePenaliteTransport)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/baremePenaliteTransports.singular')])
            );
        }

        return $this->sendResponse(
            $baremePenaliteTransport->toArray(),
            __('messages.retrieved', ['model' => __('models/baremePenaliteTransports.singular')])
        );
    }

    /**
     * Update the specified BaremePenaliteTransport in storage.
     * PUT/PATCH /baremePenaliteTransports/{id}
     *
     * @param int $id
     * @param UpdateBaremePenaliteTransportAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBaremePenaliteTransportAPIRequest $request)
    {
        $input = $request->all();

        /** @var BaremePenaliteTransport $baremePenaliteTransport */
        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->find($id);

        if (empty($baremePenaliteTransport)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/baremePenaliteTransports.singular')])
            );
        }

        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->update($input, $id);

        return $this->sendResponse(
            $baremePenaliteTransport->toArray(),
            __('messages.updated', ['model' => __('models/baremePenaliteTransports.singular')])
        );
    }

    /**
     * Remove the specified BaremePenaliteTransport from storage.
     * DELETE /baremePenaliteTransports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BaremePenaliteTransport $baremePenaliteTransport */
        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->find($id);

        if (empty($baremePenaliteTransport)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/baremePenaliteTransports.singular')])
            );
        }

        $baremePenaliteTransport->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/baremePenaliteTransports.singular')])
        );
    }
}
