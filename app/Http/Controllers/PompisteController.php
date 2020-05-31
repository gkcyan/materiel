<?php

namespace App\Http\Controllers;

use App\DataTables\PompisteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePompisteRequest;
use App\Http\Requests\UpdatePompisteRequest;
use App\Repositories\PompisteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PompisteController extends AppBaseController
{
    /** @var  PompisteRepository */
    private $pompisteRepository;

    public function __construct(PompisteRepository $pompisteRepo)
    {
        $this->pompisteRepository = $pompisteRepo;
    }

    /**
     * Display a listing of the Pompiste.
     *
     * @param PompisteDataTable $pompisteDataTable
     * @return Response
     */
    public function index(PompisteDataTable $pompisteDataTable)
    {
        return $pompisteDataTable->render('pompistes.index');
    }

    /**
     * Show the form for creating a new Pompiste.
     *
     * @return Response
     */
    public function create()
    {
        return view('pompistes.create');
    }

    /**
     * Store a newly created Pompiste in storage.
     *
     * @param CreatePompisteRequest $request
     *
     * @return Response
     */
    public function store(CreatePompisteRequest $request)
    {
        $input = $request->all();

        $pompiste = $this->pompisteRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/pompistes.singular')]));

        return redirect(route('pompistes.index'));
    }

    /**
     * Display the specified Pompiste.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pompiste = $this->pompisteRepository->find($id);

        if (empty($pompiste)) {
            Flash::error(__('models/pompistes.singular').' '.__('messages.not_found'));

            return redirect(route('pompistes.index'));
        }

        return view('pompistes.show')->with('pompiste', $pompiste);
    }

    /**
     * Show the form for editing the specified Pompiste.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pompiste = $this->pompisteRepository->find($id);

        if (empty($pompiste)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pompistes.singular')]));

            return redirect(route('pompistes.index'));
        }

        return view('pompistes.edit')->with('pompiste', $pompiste);
    }

    /**
     * Update the specified Pompiste in storage.
     *
     * @param  int              $id
     * @param UpdatePompisteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePompisteRequest $request)
    {
        $pompiste = $this->pompisteRepository->find($id);

        if (empty($pompiste)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pompistes.singular')]));

            return redirect(route('pompistes.index'));
        }

        $pompiste = $this->pompisteRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/pompistes.singular')]));

        return redirect(route('pompistes.index'));
    }

    /**
     * Remove the specified Pompiste from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pompiste = $this->pompisteRepository->find($id);

        if (empty($pompiste)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pompistes.singular')]));

            return redirect(route('pompistes.index'));
        }

        $this->pompisteRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/pompistes.singular')]));

        return redirect(route('pompistes.index'));
    }
}
