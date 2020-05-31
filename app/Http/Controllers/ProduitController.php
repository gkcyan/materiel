<?php

namespace App\Http\Controllers;

use App\DataTables\ProduitDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Repositories\ProduitRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ProduitController extends AppBaseController
{
    /** @var  ProduitRepository */
    private $produitRepository;

    public function __construct(ProduitRepository $produitRepo)
    {
        $this->produitRepository = $produitRepo;
    }

    /**
     * Display a listing of the Produit.
     *
     * @param ProduitDataTable $produitDataTable
     * @return Response
     */
    public function index(ProduitDataTable $produitDataTable)
    {
        return $produitDataTable->render('produits.index');
    }

    /**
     * Show the form for creating a new Produit.
     *
     * @return Response
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created Produit in storage.
     *
     * @param CreateProduitRequest $request
     *
     * @return Response
     */
    public function store(CreateProduitRequest $request)
    {
        $input = $request->all();

        $produit = $this->produitRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/produits.singular')]));

        return redirect(route('produits.index'));
    }

    /**
     * Display the specified Produit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error(__('models/produits.singular').' '.__('messages.not_found'));

            return redirect(route('produits.index'));
        }

        return view('produits.show')->with('produit', $produit);
    }

    /**
     * Show the form for editing the specified Produit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produits.singular')]));

            return redirect(route('produits.index'));
        }

        return view('produits.edit')->with('produit', $produit);
    }

    /**
     * Update the specified Produit in storage.
     *
     * @param  int              $id
     * @param UpdateProduitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduitRequest $request)
    {
        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produits.singular')]));

            return redirect(route('produits.index'));
        }

        $produit = $this->produitRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/produits.singular')]));

        return redirect(route('produits.index'));
    }

    /**
     * Remove the specified Produit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produits.singular')]));

            return redirect(route('produits.index'));
        }

        $this->produitRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/produits.singular')]));

        return redirect(route('produits.index'));
    }
}
