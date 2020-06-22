<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFournisseurAPIRequest;
use App\Http\Requests\API\UpdateFournisseurAPIRequest;
use App\Models\Fournisseur;
use App\Repositories\FournisseurRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FournisseurController
 * @package App\Http\Controllers\API
 */

class FournisseurAPIController extends AppBaseController
{
    /** @var  FournisseurRepository */
    private $fournisseurRepository;

    public function __construct(FournisseurRepository $fournisseurRepo)
    {
        $this->fournisseurRepository = $fournisseurRepo;
    }

    /**
     * Display a listing of the Fournisseur.
     * GET|HEAD /fournisseurs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fournisseurs = $this->fournisseurRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $fournisseurs->toArray(),
            __('messages.retrieved', ['model' => __('models/fournisseurs.plural')])
        );
    }

    /**
     * Store a newly created Fournisseur in storage.
     * POST /fournisseurs
     *
     * @param CreateFournisseurAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFournisseurAPIRequest $request)
    {
        $input = $request->all();

        $fournisseur = $this->fournisseurRepository->create($input);

        return $this->sendResponse(
            $fournisseur->toArray(),
            __('messages.saved', ['model' => __('models/fournisseurs.singular')])
        );
    }

    /**
     * Display the specified Fournisseur.
     * GET|HEAD /fournisseurs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Fournisseur $fournisseur */
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fournisseurs.singular')])
            );
        }

        return $this->sendResponse(
            $fournisseur->toArray(),
            __('messages.retrieved', ['model' => __('models/fournisseurs.singular')])
        );
    }

    /**
     * Update the specified Fournisseur in storage.
     * PUT/PATCH /fournisseurs/{id}
     *
     * @param int $id
     * @param UpdateFournisseurAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFournisseurAPIRequest $request)
    {
        $input = $request->all();

        /** @var Fournisseur $fournisseur */
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fournisseurs.singular')])
            );
        }

        $fournisseur = $this->fournisseurRepository->update($input, $id);

        return $this->sendResponse(
            $fournisseur->toArray(),
            __('messages.updated', ['model' => __('models/fournisseurs.singular')])
        );
    }

    /**
     * Remove the specified Fournisseur from storage.
     * DELETE /fournisseurs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Fournisseur $fournisseur */
        $fournisseur = $this->fournisseurRepository->find($id);

        if (empty($fournisseur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fournisseurs.singular')])
            );
        }

        $fournisseur->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/fournisseurs.singular')])
        );
    }
}
