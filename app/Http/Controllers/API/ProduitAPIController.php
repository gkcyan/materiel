<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProduitAPIRequest;
use App\Http\Requests\API\UpdateProduitAPIRequest;
use App\Models\Produit;
use App\Repositories\ProduitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProduitController
 * @package App\Http\Controllers\API
 */

class ProduitAPIController extends AppBaseController
{
    /** @var  ProduitRepository */
    private $produitRepository;

    public function __construct(ProduitRepository $produitRepo)
    {
        $this->produitRepository = $produitRepo;
    }

    /**
     * Display a listing of the Produit.
     * GET|HEAD /produits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $produits = $this->produitRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $produits->toArray(),
            __('messages.retrieved', ['model' => __('models/produits.plural')])
        );
    }

    /**
     * Store a newly created Produit in storage.
     * POST /produits
     *
     * @param CreateProduitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProduitAPIRequest $request)
    {
        $input = $request->all();

        $produit = $this->produitRepository->create($input);

        return $this->sendResponse(
            $produit->toArray(),
            __('messages.saved', ['model' => __('models/produits.singular')])
        );
    }

    /**
     * Display the specified Produit.
     * GET|HEAD /produits/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Produit $produit */
        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/produits.singular')])
            );
        }

        return $this->sendResponse(
            $produit->toArray(),
            __('messages.retrieved', ['model' => __('models/produits.singular')])
        );
    }

    /**
     * Update the specified Produit in storage.
     * PUT/PATCH /produits/{id}
     *
     * @param int $id
     * @param UpdateProduitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduitAPIRequest $request)
    {
        $input = $request->all();

        /** @var Produit $produit */
        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/produits.singular')])
            );
        }

        $produit = $this->produitRepository->update($input, $id);

        return $this->sendResponse(
            $produit->toArray(),
            __('messages.updated', ['model' => __('models/produits.singular')])
        );
    }

    /**
     * Remove the specified Produit from storage.
     * DELETE /produits/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Produit $produit */
        $produit = $this->produitRepository->find($id);

        if (empty($produit)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/produits.singular')])
            );
        }

        $produit->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/produits.singular')])
        );
    }
}
