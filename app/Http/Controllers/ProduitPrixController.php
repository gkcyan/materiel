<?php

namespace App\Http\Controllers;

use App\DataTables\ProduitPrixDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProduitPrixRequest;
use App\Http\Requests\UpdateProduitPrixRequest;
use App\Repositories\ProduitPrixRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProduitPrixController extends AppBaseController
{
    /** @var  ProduitPrixRepository */
    private $produitPrixRepository;

    public function __construct(ProduitPrixRepository $produitPrixRepo)
    {
        $this->produitPrixRepository = $produitPrixRepo;
    }

    /**
     * Display a listing of the ProduitPrix.
     *
     * @param ProduitPrixDataTable $produitPrixDataTable
     * @return Response
     */
    public function index(ProduitPrixDataTable $produitPrixDataTable)
    {
        return $produitPrixDataTable->render('produit_prixes.index');
    }

    /**
     * Show the form for creating a new ProduitPrix.
     *
     * @return Response
     */
    public function create()
    {
        return view('produit_prixes.create');
    }

    /**
     * Store a newly created ProduitPrix in storage.
     *
     * @param CreateProduitPrixRequest $request
     *
     * @return Response
     */
    public function store(CreateProduitPrixRequest $request)
    {
        $input = $request->all();

        $produitPrix = $this->produitPrixRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/produitPrixes.singular')]));

        return redirect(route('produitPrixes.index'));
    }

    /**
     * Display the specified ProduitPrix.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produitPrix = $this->produitPrixRepository->find($id);

        if (empty($produitPrix)) {
            Flash::error(__('models/produitPrixes.singular').' '.__('messages.not_found'));

            return redirect(route('produitPrixes.index'));
        }

        return view('produit_prixes.show')->with('produitPrix', $produitPrix);
    }

    /**
     * Show the form for editing the specified ProduitPrix.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produitPrix = $this->produitPrixRepository->find($id);

        if (empty($produitPrix)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitPrixes.singular')]));

            return redirect(route('produitPrixes.index'));
        }

        return view('produit_prixes.edit')->with('produitPrix', $produitPrix);
    }

    /**
     * Update the specified ProduitPrix in storage.
     *
     * @param  int              $id
     * @param UpdateProduitPrixRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduitPrixRequest $request)
    {
        $produitPrix = $this->produitPrixRepository->find($id);

        if (empty($produitPrix)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitPrixes.singular')]));

            return redirect(route('produitPrixes.index'));
        }

        $produitPrix = $this->produitPrixRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/produitPrixes.singular')]));

        return redirect(route('produitPrixes.index'));
    }

    /**
     * Remove the specified ProduitPrix from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produitPrix = $this->produitPrixRepository->find($id);

        if (empty($produitPrix)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitPrixes.singular')]));

            return redirect(route('produitPrixes.index'));
        }

        $this->produitPrixRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/produitPrixes.singular')]));

        return redirect(route('produitPrixes.index'));
    }
}
