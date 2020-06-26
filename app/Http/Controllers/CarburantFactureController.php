<?php

namespace App\Http\Controllers;

use App\DataTables\CarburantFactureDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCarburantFactureRequest;
use App\Http\Requests\UpdateCarburantFactureRequest;
use App\Repositories\CarburantFactureRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CarburantFactureController extends AppBaseController
{
    /** @var  CarburantFactureRepository */
    private $carburantFactureRepository;

    public function __construct(CarburantFactureRepository $carburantFactureRepo)
    {
        $this->carburantFactureRepository = $carburantFactureRepo;
    }

    /**
     * Display a listing of the CarburantFacture.
     *
     * @param CarburantFactureDataTable $carburantFactureDataTable
     * @return Response
     */
    public function index(CarburantFactureDataTable $carburantFactureDataTable)
    {
        return $carburantFactureDataTable->render('carburant_factures.index');
    }

    /**
     * Show the form for creating a new CarburantFacture.
     *
     * @return Response
     */
    public function create()
    {
        return view('carburant_factures.create');
    }

    /**
     * Store a newly created CarburantFacture in storage.
     *
     * @param CreateCarburantFactureRequest $request
     *
     * @return Response
     */
    public function store(CreateCarburantFactureRequest $request)
    {
        $input = $request->all();

        $carburantFacture = $this->carburantFactureRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/carburantFactures.singular')]));

        return redirect(route('carburantFactures.index'));
    }

    /**
     * Display the specified CarburantFacture.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carburantFacture = $this->carburantFactureRepository->find($id);

        if (empty($carburantFacture)) {
            Flash::error(__('models/carburantFactures.singular').' '.__('messages.not_found'));

            return redirect(route('carburantFactures.index'));
        }

        return view('carburant_factures.show')->with('carburantFacture', $carburantFacture);
    }

    /**
     * Show the form for editing the specified CarburantFacture.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carburantFacture = $this->carburantFactureRepository->find($id);

        if (empty($carburantFacture)) {
            Flash::error(__('messages.not_found', ['model' => __('models/carburantFactures.singular')]));

            return redirect(route('carburantFactures.index'));
        }

        return view('carburant_factures.edit')->with('carburantFacture', $carburantFacture);
    }

    /**
     * Update the specified CarburantFacture in storage.
     *
     * @param  int              $id
     * @param UpdateCarburantFactureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarburantFactureRequest $request)
    {
        $carburantFacture = $this->carburantFactureRepository->find($id);

        if (empty($carburantFacture)) {
            Flash::error(__('messages.not_found', ['model' => __('models/carburantFactures.singular')]));

            return redirect(route('carburantFactures.index'));
        }

        $carburantFacture = $this->carburantFactureRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/carburantFactures.singular')]));

        return redirect(route('carburantFactures.index'));
    }

    /**
     * Remove the specified CarburantFacture from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carburantFacture = $this->carburantFactureRepository->find($id);

        if (empty($carburantFacture)) {
            Flash::error(__('messages.not_found', ['model' => __('models/carburantFactures.singular')]));

            return redirect(route('carburantFactures.index'));
        }

        $this->carburantFactureRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/carburantFactures.singular')]));

        return redirect(route('carburantFactures.index'));
    }
}
