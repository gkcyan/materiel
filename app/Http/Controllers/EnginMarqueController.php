<?php

namespace App\Http\Controllers;

use App\DataTables\EnginMarqueDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEnginMarqueRequest;
use App\Http\Requests\UpdateEnginMarqueRequest;
use App\Repositories\EnginMarqueRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EnginMarqueController extends AppBaseController
{
    /** @var  EnginMarqueRepository */
    private $enginMarqueRepository;

    public function __construct(EnginMarqueRepository $enginMarqueRepo)
    {
        $this->enginMarqueRepository = $enginMarqueRepo;
    }

    /**
     * Display a listing of the EnginMarque.
     *
     * @param EnginMarqueDataTable $enginMarqueDataTable
     * @return Response
     */
    public function index(EnginMarqueDataTable $enginMarqueDataTable)
    {
        return $enginMarqueDataTable->render('engin_marques.index');
    }

    /**
     * Show the form for creating a new EnginMarque.
     *
     * @return Response
     */
    public function create()
    {
        return view('engin_marques.create');
    }

    /**
     * Store a newly created EnginMarque in storage.
     *
     * @param CreateEnginMarqueRequest $request
     *
     * @return Response
     */
    public function store(CreateEnginMarqueRequest $request)
    {
        $input = $request->all();

        $enginMarque = $this->enginMarqueRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/enginMarques.singular')]));

        return redirect(route('enginMarques.index'));
    }

    /**
     * Display the specified EnginMarque.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $enginMarque = $this->enginMarqueRepository->find($id);

        if (empty($enginMarque)) {
            Flash::error(__('models/enginMarques.singular').' '.__('messages.not_found'));

            return redirect(route('enginMarques.index'));
        }

        return view('engin_marques.show')->with('enginMarque', $enginMarque);
    }

    /**
     * Show the form for editing the specified EnginMarque.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $enginMarque = $this->enginMarqueRepository->find($id);

        if (empty($enginMarque)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginMarques.singular')]));

            return redirect(route('enginMarques.index'));
        }

        return view('engin_marques.edit')->with('enginMarque', $enginMarque);
    }

    /**
     * Update the specified EnginMarque in storage.
     *
     * @param  int              $id
     * @param UpdateEnginMarqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEnginMarqueRequest $request)
    {
        $enginMarque = $this->enginMarqueRepository->find($id);

        if (empty($enginMarque)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginMarques.singular')]));

            return redirect(route('enginMarques.index'));
        }

        $enginMarque = $this->enginMarqueRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/enginMarques.singular')]));

        return redirect(route('enginMarques.index'));
    }

    /**
     * Remove the specified EnginMarque from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $enginMarque = $this->enginMarqueRepository->find($id);

        if (empty($enginMarque)) {
            Flash::error(__('messages.not_found', ['model' => __('models/enginMarques.singular')]));

            return redirect(route('enginMarques.index'));
        }

        $this->enginMarqueRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/enginMarques.singular')]));

        return redirect(route('enginMarques.index'));
    }
}
