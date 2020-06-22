<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTypeFournisseurAPIRequest;
use App\Http\Requests\API\UpdateTypeFournisseurAPIRequest;
use App\Models\TypeFournisseur;
use App\Repositories\TypeFournisseurRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TypeFournisseurController
 * @package App\Http\Controllers\API
 */

class TypeFournisseurAPIController extends AppBaseController
{
    /** @var  TypeFournisseurRepository */
    private $typeFournisseurRepository;

    public function __construct(TypeFournisseurRepository $typeFournisseurRepo)
    {
        $this->typeFournisseurRepository = $typeFournisseurRepo;
    }

    /**
     * Display a listing of the TypeFournisseur.
     * GET|HEAD /typeFournisseurs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $typeFournisseurs = $this->typeFournisseurRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $typeFournisseurs->toArray(),
            __('messages.retrieved', ['model' => __('models/typeFournisseurs.plural')])
        );
    }

    /**
     * Store a newly created TypeFournisseur in storage.
     * POST /typeFournisseurs
     *
     * @param CreateTypeFournisseurAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeFournisseurAPIRequest $request)
    {
        $input = $request->all();

        $typeFournisseur = $this->typeFournisseurRepository->create($input);

        return $this->sendResponse(
            $typeFournisseur->toArray(),
            __('messages.saved', ['model' => __('models/typeFournisseurs.singular')])
        );
    }

    /**
     * Display the specified TypeFournisseur.
     * GET|HEAD /typeFournisseurs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TypeFournisseur $typeFournisseur */
        $typeFournisseur = $this->typeFournisseurRepository->find($id);

        if (empty($typeFournisseur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/typeFournisseurs.singular')])
            );
        }

        return $this->sendResponse(
            $typeFournisseur->toArray(),
            __('messages.retrieved', ['model' => __('models/typeFournisseurs.singular')])
        );
    }

    /**
     * Update the specified TypeFournisseur in storage.
     * PUT/PATCH /typeFournisseurs/{id}
     *
     * @param int $id
     * @param UpdateTypeFournisseurAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeFournisseurAPIRequest $request)
    {
        $input = $request->all();

        /** @var TypeFournisseur $typeFournisseur */
        $typeFournisseur = $this->typeFournisseurRepository->find($id);

        if (empty($typeFournisseur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/typeFournisseurs.singular')])
            );
        }

        $typeFournisseur = $this->typeFournisseurRepository->update($input, $id);

        return $this->sendResponse(
            $typeFournisseur->toArray(),
            __('messages.updated', ['model' => __('models/typeFournisseurs.singular')])
        );
    }

    /**
     * Remove the specified TypeFournisseur from storage.
     * DELETE /typeFournisseurs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TypeFournisseur $typeFournisseur */
        $typeFournisseur = $this->typeFournisseurRepository->find($id);

        if (empty($typeFournisseur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/typeFournisseurs.singular')])
            );
        }

        $typeFournisseur->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/typeFournisseurs.singular')])
        );
    }
}
