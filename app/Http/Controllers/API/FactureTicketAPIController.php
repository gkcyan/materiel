<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFactureTicketAPIRequest;
use App\Http\Requests\API\UpdateFactureTicketAPIRequest;
use App\Models\FactureTicket;
use App\Repositories\FactureTicketRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FactureTicketController
 * @package App\Http\Controllers\API
 */

class FactureTicketAPIController extends AppBaseController
{
    /** @var  FactureTicketRepository */
    private $factureTicketRepository;

    public function __construct(FactureTicketRepository $factureTicketRepo)
    {
        $this->factureTicketRepository = $factureTicketRepo;
    }

    /**
     * Display a listing of the FactureTicket.
     * GET|HEAD /factureTickets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $factureTickets = $this->factureTicketRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $factureTickets->toArray(),
            __('messages.retrieved', ['model' => __('models/factureTickets.plural')])
        );
    }

    /**
     * Store a newly created FactureTicket in storage.
     * POST /factureTickets
     *
     * @param CreateFactureTicketAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFactureTicketAPIRequest $request)
    {
        $input = $request->all();

        $factureTicket = $this->factureTicketRepository->create($input);

        return $this->sendResponse(
            $factureTicket->toArray(),
            __('messages.saved', ['model' => __('models/factureTickets.singular')])
        );
    }

    /**
     * Display the specified FactureTicket.
     * GET|HEAD /factureTickets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FactureTicket $factureTicket */
        $factureTicket = $this->factureTicketRepository->find($id);

        if (empty($factureTicket)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/factureTickets.singular')])
            );
        }

        return $this->sendResponse(
            $factureTicket->toArray(),
            __('messages.retrieved', ['model' => __('models/factureTickets.singular')])
        );
    }

    /**
     * Update the specified FactureTicket in storage.
     * PUT/PATCH /factureTickets/{id}
     *
     * @param int $id
     * @param UpdateFactureTicketAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactureTicketAPIRequest $request)
    {
        $input = $request->all();

        /** @var FactureTicket $factureTicket */
        $factureTicket = $this->factureTicketRepository->find($id);

        if (empty($factureTicket)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/factureTickets.singular')])
            );
        }

        $factureTicket = $this->factureTicketRepository->update($input, $id);

        return $this->sendResponse(
            $factureTicket->toArray(),
            __('messages.updated', ['model' => __('models/factureTickets.singular')])
        );
    }

    /**
     * Remove the specified FactureTicket from storage.
     * DELETE /factureTickets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FactureTicket $factureTicket */
        $factureTicket = $this->factureTicketRepository->find($id);

        if (empty($factureTicket)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/factureTickets.singular')])
            );
        }

        $factureTicket->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/factureTickets.singular')])
        );
    }
}
