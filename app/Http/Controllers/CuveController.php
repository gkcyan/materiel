<?php

namespace App\Http\Controllers;

use App\DataTables\CuveDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCuveRequest;
use App\Http\Requests\UpdateCuveRequest;
use App\Repositories\CuveRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CuveController extends AppBaseController
{
    /** @var  CuveRepository */
    private $cuveRepository;

    public function __construct(CuveRepository $cuveRepo)
    {
        $this->cuveRepository = $cuveRepo;
    }

    /**
     * Display a listing of the Cuve.
     *
     * @param CuveDataTable $cuveDataTable
     * @return Response
     */
    public function index(CuveDataTable $cuveDataTable)
    {
        return $cuveDataTable->render('cuves.index');
    }

    /**
     * Show the form for creating a new Cuve.
     *
     * @return Response
     */
    public function create()
    {
        return view('cuves.create');
    }

    /**
     * Store a newly created Cuve in storage.
     *
     * @param CreateCuveRequest $request
     *
     * @return Response
     */
    public function store(CreateCuveRequest $request)
    {
        $input = $request->all();

        $cuve = $this->cuveRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/cuves.singular')]));

        return redirect(route('cuves.index'));
    }

    /**
     * Display the specified Cuve.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cuve = $this->cuveRepository->find($id);

        if (empty($cuve)) {
            Flash::error(__('models/cuves.singular').' '.__('messages.not_found'));

            return redirect(route('cuves.index'));
        }

        return view('cuves.show')->with('cuve', $cuve);
    }

    /**
     * Show the form for editing the specified Cuve.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cuve = $this->cuveRepository->find($id);

        if (empty($cuve)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cuves.singular')]));

            return redirect(route('cuves.index'));
        }

        return view('cuves.edit')->with('cuve', $cuve);
    }

    /**
     * Update the specified Cuve in storage.
     *
     * @param  int              $id
     * @param UpdateCuveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCuveRequest $request)
    {
        $cuve = $this->cuveRepository->find($id);

        if (empty($cuve)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cuves.singular')]));

            return redirect(route('cuves.index'));
        }

        $cuve = $this->cuveRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/cuves.singular')]));

        return redirect(route('cuves.index'));
    }

    /**
     * Remove the specified Cuve from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cuve = $this->cuveRepository->find($id);

        if (empty($cuve)) {
            Flash::error(__('messages.not_found', ['model' => __('models/cuves.singular')]));

            return redirect(route('cuves.index'));
        }

        $this->cuveRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/cuves.singular')]));

        return redirect(route('cuves.index'));
    }
}
