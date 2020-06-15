<?php

namespace App\Http\Controllers;

use App\DataTables\BaremePenaliteTransportDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBaremePenaliteTransportRequest;
use App\Http\Requests\UpdateBaremePenaliteTransportRequest;
use App\Repositories\BaremePenaliteTransportRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BaremePenaliteTransportController extends AppBaseController
{
    /** @var  BaremePenaliteTransportRepository */
    private $baremePenaliteTransportRepository;

    public function __construct(BaremePenaliteTransportRepository $baremePenaliteTransportRepo)
    {
        $this->baremePenaliteTransportRepository = $baremePenaliteTransportRepo;
    }

    /**
     * Display a listing of the BaremePenaliteTransport.
     *
     * @param BaremePenaliteTransportDataTable $baremePenaliteTransportDataTable
     * @return Response
     */
    public function index(BaremePenaliteTransportDataTable $baremePenaliteTransportDataTable)
    {
        return $baremePenaliteTransportDataTable->render('bareme_penalite_transports.index');
    }

    /**
     * Show the form for creating a new BaremePenaliteTransport.
     *
     * @return Response
     */
    public function create()
    {
        return view('bareme_penalite_transports.create');
    }

    /**
     * Store a newly created BaremePenaliteTransport in storage.
     *
     * @param CreateBaremePenaliteTransportRequest $request
     *
     * @return Response
     */
    public function store(CreateBaremePenaliteTransportRequest $request)
    {
        $input = $request->all();

        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/baremePenaliteTransports.singular')]));

        return redirect(route('baremePenaliteTransports.index'));
    }

    /**
     * Display the specified BaremePenaliteTransport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->find($id);

        if (empty($baremePenaliteTransport)) {
            Flash::error(__('models/baremePenaliteTransports.singular').' '.__('messages.not_found'));

            return redirect(route('baremePenaliteTransports.index'));
        }

        return view('bareme_penalite_transports.show')->with('baremePenaliteTransport', $baremePenaliteTransport);
    }

    /**
     * Show the form for editing the specified BaremePenaliteTransport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->find($id);

        if (empty($baremePenaliteTransport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/baremePenaliteTransports.singular')]));

            return redirect(route('baremePenaliteTransports.index'));
        }

        return view('bareme_penalite_transports.edit')->with('baremePenaliteTransport', $baremePenaliteTransport);
    }

    /**
     * Update the specified BaremePenaliteTransport in storage.
     *
     * @param  int              $id
     * @param UpdateBaremePenaliteTransportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBaremePenaliteTransportRequest $request)
    {
        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->find($id);

        if (empty($baremePenaliteTransport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/baremePenaliteTransports.singular')]));

            return redirect(route('baremePenaliteTransports.index'));
        }

        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/baremePenaliteTransports.singular')]));

        return redirect(route('baremePenaliteTransports.index'));
    }

    /**
     * Remove the specified BaremePenaliteTransport from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $baremePenaliteTransport = $this->baremePenaliteTransportRepository->find($id);

        if (empty($baremePenaliteTransport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/baremePenaliteTransports.singular')]));

            return redirect(route('baremePenaliteTransports.index'));
        }

        $this->baremePenaliteTransportRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/baremePenaliteTransports.singular')]));

        return redirect(route('baremePenaliteTransports.index'));
    }
}
