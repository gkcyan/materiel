<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BasculeImport;
use App\DataTables\BasculeDataDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBasculeDataRequest;
use App\Http\Requests\UpdateBasculeDataRequest;
use App\Repositories\BasculeDataRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BasculeDataController extends AppBaseController
{
    /** @var  BasculeDataRepository */
    private $basculeDataRepository;

    public function __construct(BasculeDataRepository $basculeDataRepo)
    {
        $this->basculeDataRepository = $basculeDataRepo;
    }

    /**
     * Display a listing of the BasculeData.
     *
     * @param BasculeDataDataTable $basculeDataDataTable
     * @return Response
     */
    public function index(BasculeDataDataTable $basculeDataDataTable)
    {
        return $basculeDataDataTable->render('bascule_datas.index');
    }

    /**
     * Show the form for creating a new BasculeData.
     *
     * @return Response
     */
    public function create()
    {
        return view('bascule_datas.create');
    }

    /**
     * Store a newly created BasculeData in storage.
     *
     * @param CreateBasculeDataRequest $request
     *
     * @return Response
     */
    public function store(CreateBasculeDataRequest $request)
    {
       // $input = $request->all();

        //$basculeData = $this->basculeDataRepository->create($input);
        Excel::import(new BasculeImport, request()->file('file'));

        Flash::success(__('messages.saved', ['model' => __('models/bascule_datas.singular')]));

        return redirect(route('basculeDatas.index'));
    }

    /**
     * Display the specified BasculeData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $basculeData = $this->basculeDataRepository->find($id);

        if (empty($basculeData)) {
            Flash::error(__('models/basculeDatas.singular').' '.__('messages.not_found'));

            return redirect(route('basculeDatas.index'));
        }

        return view('bascule_datas.show')->with('basculeData', $basculeData);
    }

    /**
     * Show the form for editing the specified BasculeData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $basculeData = $this->basculeDataRepository->find($id);

        if (empty($basculeData)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bascule_datas.singular')]));

            return redirect(route('basculeDatas.index'));
        }

        return view('bascule_datas.edit')->with('basculeData', $basculeData);
    }

    /**
     * Update the specified BasculeData in storage.
     *
     * @param  int              $id
     * @param UpdateBasculeDataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBasculeDataRequest $request)
    {
        $basculeData = $this->basculeDataRepository->find($id);

        if (empty($basculeData)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bascule_datas.singular')]));

            return redirect(route('basculeDatas.index'));
        }

        $basculeData = $this->basculeDataRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/bascule_datas.singular')]));

        return redirect(route('basculeDatas.index'));
    }

    /**
     * Remove the specified BasculeData from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $basculeData = $this->basculeDataRepository->find($id);

        if (empty($basculeData)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bascule_datas.singular')]));

            return redirect(route('basculeDatas.index'));
        }

        $this->basculeDataRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/bascule_datas.singular')]));

        return redirect(route('basculeDatas.index'));
    }
}
