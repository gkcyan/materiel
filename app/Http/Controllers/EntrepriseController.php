<?php

namespace App\Http\Controllers;

use App\DataTables\entrepriseDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateentrepriseRequest;
use App\Http\Requests\UpdateentrepriseRequest;
use App\Repositories\entrepriseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\entreprise;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Response;

class entrepriseController extends AppBaseController
{
    /** @var  entrepriseRepository */
    private $entrepriseRepository;

    public function __construct(entrepriseRepository $entrepriseRepo)
    {
        $this->entrepriseRepository = $entrepriseRepo;
    }

    /**
     * Display a listing of the entreprise.
     *
     * @param entrepriseDataTable $entrepriseDataTable
     * @return Response
     */
    public function index(entrepriseDataTable $entrepriseDataTable)
    {
        return $entrepriseDataTable->render('entreprises.index');
    }

    /**
     * Show the form for creating a new entreprise.
     *
     * @return Response
     */
    public function create()
    {
        return view('entreprises.create');
    }

    /**
     * Store a newly created entreprise in storage.
     *
     * @param CreateentrepriseRequest $request
     *
     *
     * @return Response
     */
    public function store(CreateentrepriseRequest $request)
    {

       // $input = $request->all([]);
            
        if($request->libelle)
        {
           foreach($request->libelle as $element)
           {
               $entreprise = $this->entrepriseRepository->create(['libelle'=>$element['libelle']]);
 
           }
        }

        
        Flash::success(__('messages.saved', ['model' => __('models/entreprises.singular')]));
        return redirect(route('entreprises.index'));
    }

    /**
     * Display the specified entreprise.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error(__('models/entreprises.singular').' '.__('messages.not_found'));

            return redirect(route('entreprises.index'));
        }

        return view('entreprises.show')->with('entreprise', $entreprise);
    }

    /**
     * Show the form for editing the specified entreprise.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entreprises.singular')]));

            return redirect(route('entreprises.index'));
        }

        return view('entreprises.edit')->with('entreprise', $entreprise);
    }

    /**
     * Update the specified entreprise in storage.
     *
     * @param  int              $id
     * @param UpdateentrepriseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateentrepriseRequest $request)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entreprises.singular')]));

            return redirect(route('entreprises.index'));
        }

        $entreprise = $this->entrepriseRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/entreprises.singular')]));

        return redirect(route('entreprises.index'));
    }

    /**
     * Remove the specified entreprise from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entreprises.singular')]));

            return redirect(route('entreprises.index'));
        }

        $this->entrepriseRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/entreprises.singular')]));

        return redirect(route('entreprises.index'));
    }
}
