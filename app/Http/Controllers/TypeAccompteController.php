<?php

namespace App\Http\Controllers;

use App\DataTables\TypeAccompteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTypeAccompteRequest;
use App\Http\Requests\UpdateTypeAccompteRequest;
use App\Repositories\TypeAccompteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TypeAccompteController extends AppBaseController
{
    /** @var  TypeAccompteRepository */
    private $typeAccompteRepository;

    public function __construct(TypeAccompteRepository $typeAccompteRepo)
    {
        $this->typeAccompteRepository = $typeAccompteRepo;
    }

    /**
     * Display a listing of the TypeAccompte.
     *
     * @param TypeAccompteDataTable $typeAccompteDataTable
     * @return Response
     */
    public function index(TypeAccompteDataTable $typeAccompteDataTable)
    {
        return $typeAccompteDataTable->render('type_accomptes.index');
    }

    /**
     * Show the form for creating a new TypeAccompte.
     *
     * @return Response
     */
    public function create()
    {
        return view('type_accomptes.create');
    }

    /**
     * Store a newly created TypeAccompte in storage.
     *
     * @param CreateTypeAccompteRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeAccompteRequest $request)
    {
        $input = $request->all();

        $typeAccompte = $this->typeAccompteRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/typeAccomptes.singular')]));

        return redirect(route('typeAccomptes.index'));
    }

    /**
     * Display the specified TypeAccompte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeAccompte = $this->typeAccompteRepository->find($id);

        if (empty($typeAccompte)) {
            Flash::error(__('models/typeAccomptes.singular').' '.__('messages.not_found'));

            return redirect(route('typeAccomptes.index'));
        }

        return view('type_accomptes.show')->with('typeAccompte', $typeAccompte);
    }

    /**
     * Show the form for editing the specified TypeAccompte.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeAccompte = $this->typeAccompteRepository->find($id);

        if (empty($typeAccompte)) {
            Flash::error(__('messages.not_found', ['model' => __('models/typeAccomptes.singular')]));

            return redirect(route('typeAccomptes.index'));
        }

        return view('type_accomptes.edit')->with('typeAccompte', $typeAccompte);
    }

    /**
     * Update the specified TypeAccompte in storage.
     *
     * @param  int              $id
     * @param UpdateTypeAccompteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeAccompteRequest $request)
    {
        $typeAccompte = $this->typeAccompteRepository->find($id);

        if (empty($typeAccompte)) {
            Flash::error(__('messages.not_found', ['model' => __('models/typeAccomptes.singular')]));

            return redirect(route('typeAccomptes.index'));
        }

        $typeAccompte = $this->typeAccompteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/typeAccomptes.singular')]));

        return redirect(route('typeAccomptes.index'));
    }

    /**
     * Remove the specified TypeAccompte from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeAccompte = $this->typeAccompteRepository->find($id);

        if (empty($typeAccompte)) {
            Flash::error(__('messages.not_found', ['model' => __('models/typeAccomptes.singular')]));

            return redirect(route('typeAccomptes.index'));
        }

        $this->typeAccompteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/typeAccomptes.singular')]));

        return redirect(route('typeAccomptes.index'));
    }
}
