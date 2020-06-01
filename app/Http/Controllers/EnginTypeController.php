<?php

namespace App\Http\Controllers;

use App\DataTables\EnginTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEnginTypeRequest;
use App\Http\Requests\UpdateEnginTypeRequest;
use App\Repositories\EnginTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EnginTypeController extends AppBaseController
{
    /** @var  EnginTypeRepository */
    private $enginTypeRepository;

    public function __construct(EnginTypeRepository $enginTypeRepo)
    {
        $this->enginTypeRepository = $enginTypeRepo;
    }

    /**
     * Display a listing of the EnginType.
     *
     * @param EnginTypeDataTable $enginTypeDataTable
     * @return Response
     */
    public function index(EnginTypeDataTable $enginTypeDataTable)
    {
        return $enginTypeDataTable->render('engin_types.index');
    }

    /**
     * Show the form for creating a new EnginType.
     *
     * @return Response
     */
    public function create()
    {
        return view('engin_types.create');
    }

    /**
     * Store a newly created EnginType in storage.
     *
     * @param CreateEnginTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginTypeRequest $request)
    {
        $input = $request->all();

        $enginType = $this->enginTypeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/enginTypes.singular')]));

        return redirect(route('enginTypes.index'));
    }

    /**
     * Display the specified EnginType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $enginType = $this->enginTypeRepository->find($id);

        if (empty($enginType)) {
            Flash::error(__('models/enginTypes.singular').' '.__('messages.not_found'));

            return redirect(route('enginTypes.index'));
        }

        return view('engin_types.show')->with('enginType', $enginType);
    }

    /**
     * Show the form for editing the specified EnginType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $enginType = $this->enginTypeRepository->find($id);

        if (empty($enginType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginTypes.singular')]));

            return redirect(route('enginTypes.index'));
        }

        return view('engin_types.edit')->with('enginType', $enginType);
    }

    /**
     * Update the specified EnginType in storage.
     *
     * @param  int              $id
     * @param UpdateEnginTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginTypeRequest $request)
    {
        $enginType = $this->enginTypeRepository->find($id);

        if (empty($enginType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginTypes.singular')]));

            return redirect(route('enginTypes.index'));
        }

        $enginType = $this->enginTypeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/enginTypes.singular')]));

        return redirect(route('enginTypes.index'));
    }

    /**
     * Remove the specified EnginType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $enginType = $this->enginTypeRepository->find($id);

        if (empty($enginType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginTypes.singular')]));

            return redirect(route('enginTypes.index'));
        }

        $this->enginTypeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/enginTypes.singular')]));

        return redirect(route('enginTypes.index'));
    }
}
