<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateChauffeurAPIRequest;
use App\Http\Requests\API\UpdateChauffeurAPIRequest;
use App\Models\Chauffeur;
use App\Repositories\ChauffeurRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ChauffeurController
 * @package App\Http\Controllers\API
 */

class ChauffeurAPIController extends AppBaseController
{
    /** @var  ChauffeurRepository */
    private $chauffeurRepository;

    public function __construct(ChauffeurRepository $chauffeurRepo)
    {
        $this->chauffeurRepository = $chauffeurRepo;
    }

    /**
     * Display a listing of the Chauffeur.
     * GET|HEAD /chauffeurs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $chauffeurs = $this->chauffeurRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $chauffeurs->toArray(),
            __('messages.retrieved', ['model' => __('models/chauffeurs.plural')])
        );
    }

    /**
     * Store a newly created Chauffeur in storage.
     * POST /chauffeurs
     *
     * @param CreateChauffeurAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateChauffeurAPIRequest $request)
    {
        $input = $request->all();

        $chauffeur = $this->chauffeurRepository->create($input);

        return $this->sendResponse(
            $chauffeur->toArray(),
            __('messages.saved', ['model' => __('models/chauffeurs.singular')])
        );
    }

    /**
     * Display the specified Chauffeur.
     * GET|HEAD /chauffeurs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Chauffeur $chauffeur */
        $chauffeur = $this->chauffeurRepository->find($id);

        if (empty($chauffeur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/chauffeurs.singular')])
            );
        }

        return $this->sendResponse(
            $chauffeur->toArray(),
            __('messages.retrieved', ['model' => __('models/chauffeurs.singular')])
        );
    }

    /**
     * Update the specified Chauffeur in storage.
     * PUT/PATCH /chauffeurs/{id}
     *
     * @param int $id
     * @param UpdateChauffeurAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChauffeurAPIRequest $request)
    {
        $input = $request->all();

        /** @var Chauffeur $chauffeur */
        $chauffeur = $this->chauffeurRepository->find($id);

        if (empty($chauffeur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/chauffeurs.singular')])
            );
        }

        $chauffeur = $this->chauffeurRepository->update($input, $id);

        return $this->sendResponse(
            $chauffeur->toArray(),
            __('messages.updated', ['model' => __('models/chauffeurs.singular')])
        );
    }

    /**
     * Remove the specified Chauffeur from storage.
     * DELETE /chauffeurs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Chauffeur $chauffeur */
        $chauffeur = $this->chauffeurRepository->find($id);

        if (empty($chauffeur)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/chauffeurs.singular')])
            );
        }

        $chauffeur->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/chauffeurs.singular')])
        );
    }
}
