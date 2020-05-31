<?php

namespace App\Http\Controllers;

use App\DataTables\PompeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePompeRequest;
use App\Http\Requests\UpdatePompeRequest;
use App\Repositories\PompeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PompeController extends AppBaseController
{
    /** @var  PompeRepository */
    private $pompeRepository;

    public function __construct(PompeRepository $pompeRepo)
    {
        $this->pompeRepository = $pompeRepo;
    }

    /**
     * Display a listing of the Pompe.
     *
     * @param PompeDataTable $pompeDataTable
     * @return Response
     */
    public function index(PompeDataTable $pompeDataTable)
    {
        return $pompeDataTable->render('pompes.index');
    }

    /**
     * Show the form for creating a new Pompe.
     *
     * @return Response
     */
    public function create()
    {
        return view('pompes.create');
    }

    /**
     * Store a newly created Pompe in storage.
     *
     * @param CreatePompeRequest $request
     *
     * @return Response
     */
    public function store(CreatePompeRequest $request)
    {
        $input = $request->all();

        $pompe = $this->pompeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/pompes.singular')]));

        return redirect(route('pompes.index'));
    }

    /**
     * Display the specified Pompe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pompe = $this->pompeRepository->find($id);

        if (empty($pompe)) {
            Flash::error(__('models/pompes.singular').' '.__('messages.not_found'));

            return redirect(route('pompes.index'));
        }

        return view('pompes.show')->with('pompe', $pompe);
    }

    /**
     * Show the form for editing the specified Pompe.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pompe = $this->pompeRepository->find($id);

        if (empty($pompe)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pompes.singular')]));

            return redirect(route('pompes.index'));
        }

        return view('pompes.edit')->with('pompe', $pompe);
    }

    /**
     * Update the specified Pompe in storage.
     *
     * @param  int              $id
     * @param UpdatePompeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePompeRequest $request)
    {
        $pompe = $this->pompeRepository->find($id);

        if (empty($pompe)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pompes.singular')]));

            return redirect(route('pompes.index'));
        }

        $pompe = $this->pompeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/pompes.singular')]));

        return redirect(route('pompes.index'));
    }

    /**
     * Remove the specified Pompe from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pompe = $this->pompeRepository->find($id);

        if (empty($pompe)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pompes.singular')]));

            return redirect(route('pompes.index'));
        }

        $this->pompeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/pompes.singular')]));

        return redirect(route('pompes.index'));
    }
}
