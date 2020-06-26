<?php

namespace App\Http\Controllers;

use App\DataTables\FactureTicketDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFactureTicketRequest;
use App\Http\Requests\UpdateFactureTicketRequest;
use App\Repositories\FactureTicketRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FactureTicketController extends AppBaseController
{
    /** @var  FactureTicketRepository */
    private $factureTicketRepository;

    public function __construct(FactureTicketRepository $factureTicketRepo)
    {
        $this->factureTicketRepository = $factureTicketRepo;
    }

    /**
     * Display a listing of the FactureTicket.
     *
     * @param FactureTicketDataTable $factureTicketDataTable
     * @return Response
     */
    public function index(FactureTicketDataTable $factureTicketDataTable)
    {
        return $factureTicketDataTable->render('facture_tickets.index');
    }

    /**
     * Show the form for creating a new FactureTicket.
     *
     * @return Response
     */
    public function create()
    {
        return view('facture_tickets.create');
    }

    /**
     * Store a newly created FactureTicket in storage.
     *
     * @param CreateFactureTicketRequest $request
     *
     * @return Response
     */
    public function store(CreateFactureTicketRequest $request)
    {
        $input = $request->all();

        $factureTicket = $this->factureTicketRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/factureTickets.singular')]));

        return redirect(route('factureTickets.index'));
    }

    /**
     * Display the specified FactureTicket.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $factureTicket = $this->factureTicketRepository->find($id);

        if (empty($factureTicket)) {
            Flash::error(__('models/factureTickets.singular').' '.__('messages.not_found'));

            return redirect(route('factureTickets.index'));
        }

        return view('facture_tickets.show')->with('factureTicket', $factureTicket);
    }

    /**
     * Show the form for editing the specified FactureTicket.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $factureTicket = $this->factureTicketRepository->find($id);

        if (empty($factureTicket)) {
            Flash::error(__('messages.not_found', ['model' => __('models/factureTickets.singular')]));

            return redirect(route('factureTickets.index'));
        }

        return view('facture_tickets.edit')->with('factureTicket', $factureTicket);
    }

    /**
     * Update the specified FactureTicket in storage.
     *
     * @param  int              $id
     * @param UpdateFactureTicketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactureTicketRequest $request)
    {
        $factureTicket = $this->factureTicketRepository->find($id);

        if (empty($factureTicket)) {
            Flash::error(__('messages.not_found', ['model' => __('models/factureTickets.singular')]));

            return redirect(route('factureTickets.index'));
        }

        $factureTicket = $this->factureTicketRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/factureTickets.singular')]));

        return redirect(route('factureTickets.index'));
    }

    /**
     * Remove the specified FactureTicket from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $factureTicket = $this->factureTicketRepository->find($id);

        if (empty($factureTicket)) {
            Flash::error(__('messages.not_found', ['model' => __('models/factureTickets.singular')]));

            return redirect(route('factureTickets.index'));
        }

        $this->factureTicketRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/factureTickets.singular')]));

        return redirect(route('factureTickets.index'));
    }
}
