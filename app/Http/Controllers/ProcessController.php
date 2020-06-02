<?php

namespace App\Http\Controllers;

use App\DataTables\ProcessDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProcessRequest;
use App\Http\Requests\UpdateProcessRequest;
use App\Repositories\ProcessRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProcessController extends AppBaseController
{
    /** @var  ProcessRepository */
    private $processRepository;

    public function __construct(ProcessRepository $processRepo)
    {
        $this->processRepository = $processRepo;
    }

    /**
     * Display a listing of the Process.
     *
     * @param ProcessDataTable $processDataTable
     * @return Response
     */
    public function index(ProcessDataTable $processDataTable)
    {
        return $processDataTable->render('processes.index');
    }

    /**
     * Show the form for creating a new Process.
     *
     * @return Response
     */
    public function create()
    {
        return view('processes.create');
    }

    /**
     * Store a newly created Process in storage.
     *
     * @param CreateProcessRequest $request
     *
     * @return Response
     */
    public function store(CreateProcessRequest $request)
    {
        $input = $request->all();

        $process = $this->processRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/processes.singular')]));

        return redirect(route('processes.index'));
    }

    /**
     * Display the specified Process.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $process = $this->processRepository->find($id);

        if (empty($process)) {
            Flash::error(__('models/processes.singular').' '.__('messages.not_found'));

            return redirect(route('processes.index'));
        }

        return view('processes.show')->with('process', $process);
    }

    /**
     * Show the form for editing the specified Process.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $process = $this->processRepository->find($id);

        if (empty($process)) {
            Flash::error(__('messages.not_found', ['model' => __('models/processes.singular')]));

            return redirect(route('processes.index'));
        }

        return view('processes.edit')->with('process', $process);
    }

    /**
     * Update the specified Process in storage.
     *
     * @param  int              $id
     * @param UpdateProcessRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProcessRequest $request)
    {
        $process = $this->processRepository->find($id);

        if (empty($process)) {
            Flash::error(__('messages.not_found', ['model' => __('models/processes.singular')]));

            return redirect(route('processes.index'));
        }

        $process = $this->processRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/processes.singular')]));

        return redirect(route('processes.index'));
    }

    /**
     * Remove the specified Process from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $process = $this->processRepository->find($id);

        if (empty($process)) {
            Flash::error(__('messages.not_found', ['model' => __('models/processes.singular')]));

            return redirect(route('processes.index'));
        }

        $this->processRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/processes.singular')]));

        return redirect(route('processes.index'));
    }
}
