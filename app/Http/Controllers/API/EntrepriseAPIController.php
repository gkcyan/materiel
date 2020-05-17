<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEntrepriseAPIRequest;
use App\Http\Requests\API\UpdateEntrepriseAPIRequest;
use App\Models\Entreprise;
use App\Repositories\EntrepriseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EntrepriseController
 * @package App\Http\Controllers\API
 */

class EntrepriseAPIController extends AppBaseController
{
    /** @var  EntrepriseRepository */
    private $entrepriseRepository;

    public function __construct(EntrepriseRepository $entrepriseRepo)
    {
        $this->entrepriseRepository = $entrepriseRepo;
    }

    /**
     * Display a listing of the Entreprise.
     * GET|HEAD /entreprises
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $entreprises = $this->entrepriseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $entreprises->toArray(),
            __('messages.retrieved', ['model' => __('models/entreprises.plural')])
        );
    }

    /**
     * Store a newly created Entreprise in storage.
     * POST /entreprises
     *
     * @param CreateEntrepriseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEntrepriseAPIRequest $request)
    {
        $input = $request->all();

        $entreprise = $this->entrepriseRepository->create($input);

        return $this->sendResponse(
            $entreprise->toArray(),
            __('messages.saved', ['model' => __('models/entreprises.singular')])
        );
    }

    /**
     * Display the specified Entreprise.
     * GET|HEAD /entreprises/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Entreprise $entreprise */
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/entreprises.singular')])
            );
        }

        return $this->sendResponse(
            $entreprise->toArray(),
            __('messages.retrieved', ['model' => __('models/entreprises.singular')])
        );
    }

    /**
     * Update the specified Entreprise in storage.
     * PUT/PATCH /entreprises/{id}
     *
     * @param int $id
     * @param UpdateEntrepriseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntrepriseAPIRequest $request)
    {
        $input = $request->all();

        /** @var Entreprise $entreprise */
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/entreprises.singular')])
            );
        }

        $entreprise = $this->entrepriseRepository->update($input, $id);

        return $this->sendResponse(
            $entreprise->toArray(),
            __('messages.updated', ['model' => __('models/entreprises.singular')])
        );
    }

    /**
     * Remove the specified Entreprise from storage.
     * DELETE /entreprises/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Entreprise $entreprise */
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/entreprises.singular')])
            );
        }

        $entreprise->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/entreprises.singular')])
        );
    }
}
