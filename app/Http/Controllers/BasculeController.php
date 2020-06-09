<?php

namespace App\Http\Controllers;

use App\DataTables\BasculeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBasculeRequest;
use App\Http\Requests\UpdateBasculeRequest;
use App\Repositories\BasculeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BasculeController extends AppBaseController
{
    /** @var  BasculeRepository */
    private $basculeRepository;

    public function __construct(BasculeRepository $basculeRepo)
    {
        $this->basculeRepository = $basculeRepo;
    }

    /**
     * Display a listing of the Bascule.
     *
     * @param BasculeDataTable $basculeDataTable
     * @return Response
     */
    public function index(BasculeDataTable $basculeDataTable)
    {
        return $basculeDataTable->render('bascules.index');
    }

    /**
     * Show the form for creating a new Bascule.
     *
     * @return Response
     */
    public function create()
    {
        return view('bascules.create');
    }

    /**
     * Store a newly created Bascule in storage.
     *
     * @param CreateBasculeRequest $request
     *
     * @return Response
     */
    public function store(CreateBasculeRequest $request)
    {
        $input = $request->all();

        $bascule = $this->basculeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/bascules.singular')]));

        return redirect(route('bascules.index'));
    }

    /**
     * Display the specified Bascule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bascule = $this->basculeRepository->find($id);

        if (empty($bascule)) {
            Flash::error(__('models/bascules.singular').' '.__('messages.not_found'));

            return redirect(route('bascules.index'));
        }

        return view('bascules.show')->with('bascule', $bascule);
    }

    /**
     * Show the form for editing the specified Bascule.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bascule = $this->basculeRepository->find($id);

        if (empty($bascule)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bascules.singular')]));

            return redirect(route('bascules.index'));
        }

        return view('bascules.edit')->with('bascule', $bascule);
    }

    /**
     * Update the specified Bascule in storage.
     *
     * @param  int              $id
     * @param UpdateBasculeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBasculeRequest $request)
    {
        $bascule = $this->basculeRepository->find($id);

        if (empty($bascule)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bascules.singular')]));

            return redirect(route('bascules.index'));
        }

        $bascule = $this->basculeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/bascules.singular')]));

        return redirect(route('bascules.index'));
    }

    /**
     * Remove the specified Bascule from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bascule = $this->basculeRepository->find($id);

        if (empty($bascule)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bascules.singular')]));

            return redirect(route('bascules.index'));
        }

        $this->basculeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/bascules.singular')]));

        return redirect(route('bascules.index'));
    }
}
