<?php

namespace App\Http\Controllers;

use App\DataTables\AccompteFactureDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAccompteFactureRequest;
use App\Http\Requests\UpdateAccompteFactureRequest;
use App\Repositories\AccompteFactureRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccompteFactureController extends AppBaseController
{
    /** @var  AccompteFactureRepository */
    private $accompteFactureRepository;

    public function __construct(AccompteFactureRepository $accompteFactureRepo)
    {
        $this->accompteFactureRepository = $accompteFactureRepo;
    }

    /**
     * Display a listing of the AccompteFacture.
     *
     * @param AccompteFactureDataTable $accompteFactureDataTable
     * @return Response
     */
    public function index(AccompteFactureDataTable $accompteFactureDataTable)
    {
        return $accompteFactureDataTable->render('accompte_factures.index');
    }

    /**
     * Show the form for creating a new AccompteFacture.
     *
     * @return Response
     */
    public function create()
    {
        return view('accompte_factures.create');
    }

    /**
     * Store a newly created AccompteFacture in storage.
     *
     * @param CreateAccompteFactureRequest $request
     *
     * @return Response
     */
    public function store(CreateAccompteFactureRequest $request)
    {
        $input = $request->all();

        $accompteFacture = $this->accompteFactureRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accompteFactures.singular')]));

        return redirect(route('accompteFactures.index'));
    }

    /**
     * Display the specified AccompteFacture.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accompteFacture = $this->accompteFactureRepository->find($id);

        if (empty($accompteFacture)) {
            Flash::error(__('models/accompteFactures.singular').' '.__('messages.not_found'));

            return redirect(route('accompteFactures.index'));
        }

        return view('accompte_factures.show')->with('accompteFacture', $accompteFacture);
    }

    /**
     * Show the form for editing the specified AccompteFacture.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accompteFacture = $this->accompteFactureRepository->find($id);

        if (empty($accompteFacture)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accompteFactures.singular')]));

            return redirect(route('accompteFactures.index'));
        }

        return view('accompte_factures.edit')->with('accompteFacture', $accompteFacture);
    }

    /**
     * Update the specified AccompteFacture in storage.
     *
     * @param  int              $id
     * @param UpdateAccompteFactureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccompteFactureRequest $request)
    {
        $accompteFacture = $this->accompteFactureRepository->find($id);

        if (empty($accompteFacture)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accompteFactures.singular')]));

            return redirect(route('accompteFactures.index'));
        }

        $accompteFacture = $this->accompteFactureRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accompteFactures.singular')]));

        return redirect(route('accompteFactures.index'));
    }

    /**
     * Remove the specified AccompteFacture from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accompteFacture = $this->accompteFactureRepository->find($id);

        if (empty($accompteFacture)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accompteFactures.singular')]));

            return redirect(route('accompteFactures.index'));
        }

        $this->accompteFactureRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accompteFactures.singular')]));

        return redirect(route('accompteFactures.index'));
    }
}
