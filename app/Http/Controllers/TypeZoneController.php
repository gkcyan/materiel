<?php

namespace App\Http\Controllers;

use App\DataTables\TypeZoneDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTypeZoneRequest;
use App\Http\Requests\UpdateTypeZoneRequest;
use App\Repositories\TypeZoneRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TypeZoneController extends AppBaseController
{
    /** @var  TypeZoneRepository */
    private $typeZoneRepository;

    public function __construct(TypeZoneRepository $typeZoneRepo)
    {
        $this->typeZoneRepository = $typeZoneRepo;
    }

    /**
     * Display a listing of the TypeZone.
     *
     * @param TypeZoneDataTable $typeZoneDataTable
     * @return Response
     */
    public function index(TypeZoneDataTable $typeZoneDataTable)
    {
        return $typeZoneDataTable->render('type_zones.index');
    }

    /**
     * Show the form for creating a new TypeZone.
     *
     * @return Response
     */
    public function create()
    {
        return view('type_zones.create');
    }

    /**
     * Store a newly created TypeZone in storage.
     *
     * @param CreateTypeZoneRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeZoneRequest $request)
    {
        $input = $request->all();

        $typeZone = $this->typeZoneRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/typeZones.singular')]));

        return redirect(route('typeZones.index'));
    }

    /**
     * Display the specified TypeZone.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeZone = $this->typeZoneRepository->find($id);

        if (empty($typeZone)) {
            Flash::error(__('models/typeZones.singular').' '.__('messages.not_found'));

            return redirect(route('typeZones.index'));
        }

        return view('type_zones.show')->with('typeZone', $typeZone);
    }

    /**
     * Show the form for editing the specified TypeZone.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeZone = $this->typeZoneRepository->find($id);

        if (empty($typeZone)) {
            Flash::error(__('messages.not_found', ['model' => __('models/typeZones.singular')]));

            return redirect(route('typeZones.index'));
        }

        return view('type_zones.edit')->with('typeZone', $typeZone);
    }

    /**
     * Update the specified TypeZone in storage.
     *
     * @param  int              $id
     * @param UpdateTypeZoneRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeZoneRequest $request)
    {
        $typeZone = $this->typeZoneRepository->find($id);

        if (empty($typeZone)) {
            Flash::error(__('messages.not_found', ['model' => __('models/typeZones.singular')]));

            return redirect(route('typeZones.index'));
        }

        $typeZone = $this->typeZoneRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/typeZones.singular')]));

        return redirect(route('typeZones.index'));
    }

    /**
     * Remove the specified TypeZone from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeZone = $this->typeZoneRepository->find($id);

        if (empty($typeZone)) {
            Flash::error(__('messages.not_found', ['model' => __('models/typeZones.singular')]));

            return redirect(route('typeZones.index'));
        }

        $this->typeZoneRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/typeZones.singular')]));

        return redirect(route('typeZones.index'));
    }
}
