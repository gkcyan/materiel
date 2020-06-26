<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFactureAPIRequest;
use App\Http\Requests\API\UpdateFactureAPIRequest;
use App\Models\Facture;
use App\Repositories\FactureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FactureController
 * @package App\Http\Controllers\API
 */

class FactureAPIController extends AppBaseController
{
    /** @var  FactureRepository */
    private $factureRepository;

    public function __construct(FactureRepository $factureRepo)
    {
        $this->factureRepository = $factureRepo;
    }

    /**
     * Display a listing of the Facture.
     * GET|HEAD /factures
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $factures = $this->factureRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $factures->toArray(),
            __('messages.retrieved', ['model' => __('models/factures.plural')])
        );
    }

    /**
     * Store a newly created Facture in storage.
     * POST /factures
     *
     * @param CreateFactureAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFactureAPIRequest $request)
    {
        $input = $request->all();

        $facture = $this->factureRepository->create($input);

        return $this->sendResponse(
            $facture->toArray(),
            __('messages.saved', ['model' => __('models/factures.singular')])
        );
    }

    /**
     * Display the specified Facture.
     * GET|HEAD /factures/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Facture $facture */
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/factures.singular')])
            );
        }

        return $this->sendResponse(
            $facture->toArray(),
            __('messages.retrieved', ['model' => __('models/factures.singular')])
        );
    }

    /**
     * Update the specified Facture in storage.
     * PUT/PATCH /factures/{id}
     *
     * @param int $id
     * @param UpdateFactureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactureAPIRequest $request)
    {
        $input = $request->all();

        /** @var Facture $facture */
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/factures.singular')])
            );
        }

        $facture = $this->factureRepository->update($input, $id);

        return $this->sendResponse(
            $facture->toArray(),
            __('messages.updated', ['model' => __('models/factures.singular')])
        );
    }

    /**
     * Remove the specified Facture from storage.
     * DELETE /factures/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Facture $facture */
        $facture = $this->factureRepository->find($id);

        if (empty($facture)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/factures.singular')])
            );
        }

        $facture->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/factures.singular')])
        );
    }
}
