<?php

namespace App\Http\Controllers;

use App\DataTables\CategorieDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Repositories\CategorieRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CategorieController extends AppBaseController
{
    /** @var  CategorieRepository */
    private $categorieRepository;

    public function __construct(CategorieRepository $categorieRepo)
    {
        $this->categorieRepository = $categorieRepo;
    }

    /**
     * Display a listing of the Categorie.
     *
     * @param CategorieDataTable $categorieDataTable
     * @return Response
     */
    public function index(CategorieDataTable $categorieDataTable)
    {
        return $categorieDataTable->render('categories.index');
    }

    /**
     * Show the form for creating a new Categorie.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Categorie in storage.
     *
     * @param CreateCategorieRequest $request
     *
     * @return Response
     */
    public function store(CreateCategorieRequest $request)
    {
        $input = $request->all();

        $categorie = $this->categorieRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/categories.singular')]));

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Categorie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error(__('models/categories.singular').' '.__('messages.not_found'));

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('categorie', $categorie);
    }

    /**
     * Show the form for editing the specified Categorie.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('categorie', $categorie);
    }

    /**
     * Update the specified Categorie in storage.
     *
     * @param  int              $id
     * @param UpdateCategorieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategorieRequest $request)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('categories.index'));
        }

        $categorie = $this->categorieRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/categories.singular')]));

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Categorie from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categorie = $this->categorieRepository->find($id);

        if (empty($categorie)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categories.singular')]));

            return redirect(route('categories.index'));
        }

        $this->categorieRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/categories.singular')]));

        return redirect(route('categories.index'));
    }
}
