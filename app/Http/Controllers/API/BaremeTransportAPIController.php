<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBaremeTransportAPIRequest;
use App\Http\Requests\API\UpdateBaremeTransportAPIRequest;
use App\Models\BaremeTransport;
use App\Repositories\BaremeTransportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BaremeTransportController
 * @package App\Http\Controllers\API
 */

class BaremeTransportAPIController extends AppBaseController
{
    /** @var  BaremeTransportRepository */
    private $baremeTransportRepository;

    public function __construct(BaremeTransportRepository $baremeTransportRepo)
    {
        $this->baremeTransportRepository = $baremeTransportRepo;
    }

    /**
     * Display a listing of the BaremeTransport.
     * GET|HEAD /baremeTransports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $baremeTransports = $this->baremeTransportRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $baremeTransports->toArray(),
            __('messages.retrieved', ['model' => __('models/baremeTransports.plural')])
        );
    }

    /**
     * Store a newly created BaremeTransport in storage.
     * POST /baremeTransports
     *
     * @param CreateBaremeTransportAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBaremeTransportAPIRequest $request)
    {
        $input = $request->all();

        $baremeTransport = $this->baremeTransportRepository->create($input);

        return $this->sendResponse(
            $baremeTransport->toArray(),
            __('messages.saved', ['model' => __('models/baremeTransports.singular')])
        );
    }

    /**
     * Display the specified BaremeTransport.
     * GET|HEAD /baremeTransports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BaremeTransport $baremeTransport */
        $baremeTransport = $this->baremeTransportRepository->find($id);

        if (empty($baremeTransport)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/baremeTransports.singular')])
            );
        }

        return $this->sendResponse(
            $baremeTransport->toArray(),
            __('messages.retrieved', ['model' => __('models/baremeTransports.singular')])
        );
    }

    /**
     * Update the specified BaremeTransport in storage.
     * PUT/PATCH /baremeTransports/{id}
     *
     * @param int $id
     * @param UpdateBaremeTransportAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBaremeTransportAPIRequest $request)
    {
        $input = $request->all();

        /** @var BaremeTransport $baremeTransport */
        $baremeTransport = $this->baremeTransportRepository->find($id);

        if (empty($baremeTransport)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/baremeTransports.singular')])
            );
        }

        $baremeTransport = $this->baremeTransportRepository->update($input, $id);

        return $this->sendResponse(
            $baremeTransport->toArray(),
            __('messages.updated', ['model' => __('models/baremeTransports.singular')])
        );
    }

    /**
     * Remove the specified BaremeTransport from storage.
     * DELETE /baremeTransports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BaremeTransport $baremeTransport */
        $baremeTransport = $this->baremeTransportRepository->find($id);

        if (empty($baremeTransport)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/baremeTransports.singular')])
            );
        }

        $baremeTransport->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/baremeTransports.singular')])
        );
    }
}
