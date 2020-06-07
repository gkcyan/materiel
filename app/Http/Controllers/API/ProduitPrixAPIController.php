<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProduitPrixAPIRequest;
use App\Http\Requests\API\UpdateProduitPrixAPIRequest;
use App\Models\ProduitPrix;
use App\Repositories\ProduitPrixRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProduitPrixController
 * @package App\Http\Controllers\API
 */

class ProduitPrixAPIController extends AppBaseController
{
    /** @var  ProduitPrixRepository */
    private $produitPrixRepository;

    public function __construct(ProduitPrixRepository $produitPrixRepo)
    {
        $this->produitPrixRepository = $produitPrixRepo;
    }

    /**
     * Display a listing of the ProduitPrix.
     * GET|HEAD /produitPrixes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $produitPrixes = $this->produitPrixRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $produitPrixes->toArray(),
            __('messages.retrieved', ['model' => __('models/produitPrixes.plural')])
        );
    }

    /**
     * Store a newly created ProduitPrix in storage.
     * POST /produitPrixes
     *
     * @param CreateProduitPrixAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProduitPrixAPIRequest $request)
    {
        $input = $request->all();

        $produitPrix = $this->produitPrixRepository->create($input);

        return $this->sendResponse(
            $produitPrix->toArray(),
            __('messages.saved', ['model' => __('models/produitPrixes.singular')])
        );
    }

    /**
     * Display the specified ProduitPrix.
     * GET|HEAD /produitPrixes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProduitPrix $produitPrix */
        $produitPrix = $this->produitPrixRepository->find($id);

        if (empty($produitPrix)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/produitPrixes.singular')])
            );
        }

        return $this->sendResponse(
            $produitPrix->toArray(),
            __('messages.retrieved', ['model' => __('models/produitPrixes.singular')])
        );
    }

    /**
     * Update the specified ProduitPrix in storage.
     * PUT/PATCH /produitPrixes/{id}
     *
     * @param int $id
     * @param UpdateProduitPrixAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduitPrixAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProduitPrix $produitPrix */
        $produitPrix = $this->produitPrixRepository->find($id);

        if (empty($produitPrix)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/produitPrixes.singular')])
            );
        }

        $produitPrix = $this->produitPrixRepository->update($input, $id);

        return $this->sendResponse(
            $produitPrix->toArray(),
            __('messages.updated', ['model' => __('models/produitPrixes.singular')])
        );
    }

    /**
     * Remove the specified ProduitPrix from storage.
     * DELETE /produitPrixes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProduitPrix $produitPrix */
        $produitPrix = $this->produitPrixRepository->find($id);

        if (empty($produitPrix)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/produitPrixes.singular')])
            );
        }

        $produitPrix->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/produitPrixes.singular')])
        );
    }
}
