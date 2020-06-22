<?php

namespace App\Http\Controllers;

use App\DataTables\AccompteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAccompteRequest;
use App\Http\Requests\UpdateAccompteRequest;
use App\Repositories\AccompteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccompteController extends AppBaseController
{
    /** @var  AccompteRepository */
    private $accompteRepository;

    public function __construct(AccompteRepository $accompteRepo)
    {
        $this->accompteRepository = $accompteRepo;
    }

    /**
     * Display a listing of the Accompte.
     *
     * @param AccompteDataTable $accompteDataTable
     * @return Response
     */
    public function index(AccompteDataTable $accompteDataTable)
    {
        return $accompteDataTable->render('accomptes.index');
    }

    /**
     * Show the form for creating a new Accompte.
     *
     * @return Response
     */
    public function create()
    {
        return view('accomptes.create');
    }

    /**
     * Store a newly created Accompte in storage.
     *
     * @param CreateAccompteRequest $request
     *
     * @return Response
     */
    public function store(CreateAccompteRequest $request)
    {
        $input = $request->all();

        $accompte = $this->accompteRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/accomptes.singular')]));

        return redirect(route('accomptes.index'));
    }

    /**
     * Display the specified Accompte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accompte = $this->accompteRepository->find($id);

        if (empty($accompte)) {
            Flash::error(__('models/accomptes.singular').' '.__('messages.not_found'));

            return redirect(route('accomptes.index'));
        }

        return view('accomptes.show')->with('accompte', $accompte);
    }

    /**
     * Show the form for editing the specified Accompte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accompte = $this->accompteRepository->find($id);

        if (empty($accompte)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accomptes.singular')]));

            return redirect(route('accomptes.index'));
        }

        return view('accomptes.edit')->with('accompte', $accompte);
    }

    /**
     * Update the specified Accompte in storage.
     *
     * @param  int              $id
     * @param UpdateAccompteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccompteRequest $request)
    {
        $accompte = $this->accompteRepository->find($id);

        if (empty($accompte)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accomptes.singular')]));

            return redirect(route('accomptes.index'));
        }

        $accompte = $this->accompteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/accomptes.singular')]));

        return redirect(route('accomptes.index'));
    }

    /**
     * Remove the specified Accompte from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accompte = $this->accompteRepository->find($id);

        if (empty($accompte)) {
            Flash::error(__('messages.not_found', ['model' => __('models/accomptes.singular')]));

            return redirect(route('accomptes.index'));
        }

        $this->accompteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/accomptes.singular')]));

        return redirect(route('accomptes.index'));
    }
}
