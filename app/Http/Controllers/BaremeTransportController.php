<?php

namespace App\Http\Controllers;

use App\DataTables\BaremeTransportDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBaremeTransportRequest;
use App\Http\Requests\UpdateBaremeTransportRequest;
use App\Repositories\BaremeTransportRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BaremeTransportController extends AppBaseController
{
    /** @var  BaremeTransportRepository */
    private $baremeTransportRepository;

    public function __construct(BaremeTransportRepository $baremeTransportRepo)
    {
        $this->baremeTransportRepository = $baremeTransportRepo;
    }

    /**
     * Display a listing of the BaremeTransport.
     *
     * @param BaremeTransportDataTable $baremeTransportDataTable
     * @return Response
     */
    public function index(BaremeTransportDataTable $baremeTransportDataTable)
    {
        return $baremeTransportDataTable->render('bareme_transports.index');
    }

    /**
     * Show the form for creating a new BaremeTransport.
     *
     * @return Response
     */
    public function create()
    {
        return view('bareme_transports.create');
    }

    /**
     * Store a newly created BaremeTransport in storage.
     *
     * @param CreateBaremeTransportRequest $request
     *
     * @return Response
     */
    public function store(CreateBaremeTransportRequest $request)
    {
        $input = $request->all();

        $baremeTransport = $this->baremeTransportRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/baremeTransports.singular')]));

        return redirect(route('baremeTransports.index'));
    }

    /**
     * Display the specified BaremeTransport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $baremeTransport = $this->baremeTransportRepository->find($id);

        if (empty($baremeTransport)) {
            Flash::error(__('models/baremeTransports.singular').' '.__('messages.not_found'));

            return redirect(route('baremeTransports.index'));
        }

        return view('bareme_transports.show')->with('baremeTransport', $baremeTransport);
    }

    /**
     * Show the form for editing the specified BaremeTransport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $baremeTransport = $this->baremeTransportRepository->find($id);

        if (empty($baremeTransport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/baremeTransports.singular')]));

            return redirect(route('baremeTransports.index'));
        }

        return view('bareme_transports.edit')->with('baremeTransport', $baremeTransport);
    }

    /**
     * Update the specified BaremeTransport in storage.
     *
     * @param  int              $id
     * @param UpdateBaremeTransportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBaremeTransportRequest $request)
    {
        $baremeTransport = $this->baremeTransportRepository->find($id);

        if (empty($baremeTransport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/baremeTransports.singular')]));

            return redirect(route('baremeTransports.index'));
        }

        $baremeTransport = $this->baremeTransportRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/baremeTransports.singular')]));

        return redirect(route('baremeTransports.index'));
    }

    /**
     * Remove the specified BaremeTransport from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $baremeTransport = $this->baremeTransportRepository->find($id);

        if (empty($baremeTransport)) {
            Flash::error(__('messages.not_found', ['model' => __('models/baremeTransports.singular')]));

            return redirect(route('baremeTransports.index'));
        }

        $this->baremeTransportRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/baremeTransports.singular')]));

        return redirect(route('baremeTransports.index'));
    }
}
